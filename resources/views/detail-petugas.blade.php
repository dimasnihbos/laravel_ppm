@include('layout.navbarpetugas')

@section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>

    <h1>Detail Pengaduan</h1>

<table class="center" border="1">
  <tr>
    <th>ID</th>
    <th>Tanggal</th>
    <th>Nik</th>
    <th>isi_laporan</th>
    <th>Foto</th>
  </tr>
@foreach ($tanggapan as $pengaduan)
    
<tr>
  <td>{{$pengaduan->id_pengaduan}}</td>
  <td>{{$pengaduan->tgl_pengaduan}}</td>
  <td>{{$pengaduan->nik}}</td>
  <td>{{$pengaduan->isi_laporan}}</td>
  <td><img src='{{asset("storage/image/".$pengaduan->foto)}}' width="120px"></td>

</tr>

@endforeach


</table>
</body>


<h1>Tanggapan</h1>

