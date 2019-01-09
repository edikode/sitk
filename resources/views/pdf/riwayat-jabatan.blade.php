<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>CETAK PDF</title>
        <style type="text/css">

            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 1cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0.5cm;
                left: 2.1cm;
                right: 1.1cm;
                height: 3cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }

             /*design table 1*/
             .table1 {
                font-family:'Times New Roman', Times, serif;
                color: #232323;
                border-collapse: collapse;
                width: 100%;
            }
            
            .table1, th, td {
                font-family:'Times New Roman', Times, serif;font-size:12px;padding-top:2px; padding-left:5px; padding-right:5px; 
                padding-bottom: 4px;
                border: 1px solid black;
                /* padding: 8px 20px; */
            }

            th {
                text-align: center;
                text-transform: uppercase;
            } 
            .td-1 {
                vertical-align: top;
                text-align: justify;
            }
            .td-2 {
                vertical-align: top;
                text-align: center;
            }

        </style>
        <body>
            
            <header>
                <table>
                    <tr>
                        <td style="border:0px">
                            {{-- <img src="{{asset('upload/gambar/'.Auth::user()->logo_desa)}}" height="50px"> --}}
                        </td>
                        <td valign="top" style="border:0px">
                            <h2 style="margin-top:0px;margin-bottom:0px;">SISTEM INFORMASI TENAGA KERJA KONTRAK</h2>
                            <p style="margin:0px;font-family:Arial; font-size:13px;">dsn. Alas Purwo, ds. Alas Purwo, kec. Alas Purwo <br>Banyuwangi - Jawa Timur</p>
                        </td>
                    </tr>
                </table>
                <hr>
            </header>

            <main>
                <div style="font-family:Arial; font-size:12px;">
                    <center>
                        <h2 style="margin-top:5px;margin-bottom:0px;">RIWAYAT KERJA @if($bulan != "semua")BULAN {{strtoupper(nama_bulan($bulan))}}@endif</h2>
                        <h2 style="margin-top:0px;margin-bottom:0px;">TAHUN {{$tahun}}</h2>
                    </center>  
                </div>
                <br>
                <table class="table1">
                    <tr>			
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Nomor SK</th>
                        <th>Tanggal SK</th>
                        <th>Jabatan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Satuan Kerja</th>			
                        <th>Lokasi</th>			
                        <th>Status</th>
                    </tr>
                    
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $d)
                        <tr>
                            <td class="td-2">{{$i++}}</td>
                            <td class="td-1">{{$d->nip}}</td>
                            <td class="td-1">{{$d->nama_pegawai}}</td>
                            <td class="td-1">{{$d->nomor_sk}}</td>
                            <td class="td-2">{{tgl_id($d->tanggal_sk)}}</td>
                            <td class="td-1">{{$d->nama_jabatan}}</td>
                            <td class="td-2">{{tgl_id($d->tanggal_mulai)}}</td>
                            <td class="td-2">{{tgl_id($d->tanggal_selesai)}}</td>
                            <td class="td-1">{{$d->satuan_kerja}}</td>
                            <td class="td-1">{{$d->nama_lokasi}}</td>
                            <td class="td-1">{{$d->status}}</td>
                        </tr>
                    @endforeach

                    @if (count($data)<1)
                    <tr>
                        <td colspan="11" align="center" style="padding:20px">DATA MASIH KOSONG</td>
                    </tr>
                    @endif
                </table>
            </main>

        </div>

        <script type="text/php">
            if ( isset($pdf) ) {
                $x = 890;
                $y = 565;
                $text = "| {PAGE_NUM} |";
                $font = null;
                $size = 10;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script> 
        </body>
    </head>
</html>
