var dzrevapi;
var dzQuery =jQuery;
function dz_rev_slider_1(){
	if(dzQuery("#rev_slider_265_1").revolution == undefined){
	  revslider_showDoubleJqueryError("#rev_slider_265_1");
	}else{
	  dzrevapi = dzQuery("#rev_slider_265_1").show().revolution({
		sliderType:"standard",
		sliderLayout:"fullwidth",
		dottedOverlay:"none",
		delay:9000,
		navigation: {
			keyboardNavigation: "on",
			keyboard_direction: "horizontal",
			mouseScrollNavigation: "off",
			onHoverStop: "off",
			touch: {
				touchenabled: "on",
				swipe_threshold: 75,
				swipe_min_touches: 1,
				swipe_direction: "horizontal",
				drag_block_vertical: false
			},
			arrows: {
				style: "gyges",
				enable: true,
				hide_onmobile: false,
				hide_onleave: false,
				tmp: '',
				left: {
					h_align: "left",
					v_align: "center",
					h_offset: 10,
					v_offset: 0
				},
				right: {
					h_align: "right",
					v_align: "center",
					h_offset: 10,
					v_offset: 0
				}
			},
		},
		visibilityLevels:[1240,1024,778,480],
		gridwidth:1920,
		gridheight:766,
		lazyType:"none",
		shadow:0,
		spinner:"spinner0",
		stopLoop:"off",
		stopAfterLoops:-1,
		stopAtSlide:-1,
		shuffle:"off",
		autoHeight:"off",
		disableProgressBar:"on",
		hideThumbsOnMobile:"off",
		hideSliderAtLimit:0,
		hideCaptionAtLimit:0,
		hideAllCaptionAtLilmit:0,
		debugMode:false,
		fallbacks: {
		  simplifyAll:"off",
		  nextSlideOnWindowFocus:"off",
		  disableFocusListener:false,
		}
	  });
	}
}
function dz_rev_slider_2(){
	if(dzQuery("#rev_slider_1071_1").revolution == undefined){
	revslider_showDoubleJqueryError("#rev_slider_1071_1");
	}else{
	dzrevapi = dzQuery("#rev_slider_1071_1").show().revolution({
		sliderType:"hero",
	jsFileLocation:"revolution/js/",
			sliderLayout:"",
			dottedOverlay:"none",
			delay:20000,
			navigation: {
			},
			responsiveLevels:[1240],
			visibilityLevels:[1240],
			gridwidth:[1240],
			gridheight:[700],
			lazyType:"none",
			parallax: {
				type:"mouse",
				origo:"slidercenter",
				speed:2000,
				levels:[2,3,4,5,6,7,12,16,10,50,46,47,48,49,50,55],
				type:"mouse",
			},
			shadow:0,
			spinner:"off",
			autoHeight:"off",
			fullScreenAutoWidth:"off",
			fullScreenAlignForce:"off",
			fullScreenOffsetContainer: "",
			fullScreenOffset: "60px",
			disableProgressBar:"on",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				disableFocusListener:false,
			}
		});
	// CHANGE THE API REFERENCE, AND THE ELEMENTS YOU WISH TO BLUR / UNBLUR
	// SET START BLUR FACTOR, END BLUR FACTOR AND 

	var api = dzrevapi,
	ElementsToBlur = api.find('.toblur.tp-caption'),
	ElementsToUnBlur = api.find('.tounblur.tp-caption'),
	UnBlurFactor = 2,
	UnBlurStart = 3,
	UnBlurEnd = 0,
	BlurStart = 0,
	BlurEnd = 5,
	BlurFactor = 2,
	blurCall = new Object();


	// SOME CODE FOR BLUR AND UNBLUR ELEMENTS
	// EXTEND THE REVOLUTION SLIDER FUNCTION
	// CHANGE ONLY IF YOU KNOW WHAT YOU DO

	blurCall.inmodule = "parallax";
	blurCall.atposition = "start";
	blurCall.callback = function() { 
	var proc = api.revgetparallaxproc(),
	blur = UnBlurStart+(proc*UnBlurStart*UnBlurFactor)+UnBlurEnd,
	nblur = Math.abs(proc*BlurEnd*BlurFactor)+BlurStart;

	blur = blur<UnBlurEnd?UnBlurEnd:blur;
	nblur = nblur>BlurEnd?BlurEnd:nblur;

	ElementsToUnBlur = jQuery(ElementsToUnBlur.selector);               
	punchgs.TweenLite.set(ElementsToUnBlur,{'-webkit-filter':'blur('+(blur)+'px)', 'filter':'blur('+(blur)+'px)'});		
	punchgs.TweenLite.set(ElementsToBlur,{'-webkit-filter':'blur('+(nblur)+'px)', 'filter':'blur('+(nblur)+'px)'});		
	}

	api.bind("revolution.slide.layeraction",function (e) {
	blurCall.callback();
	});

	api.bind("revolution.slide.onloaded",function (e) {
	dzrevapi.revaddcallback(blurCall);
	});				
	}
}