@include('layout.navbar')

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
    <th>status</th>
  </tr>

<tr>
  <td>{{$pengaduan->id_pengaduan}}</td>
  <td>{{$pengaduan->tgl_pengaduan}}</td>
  <td>{{$pengaduan->nik}}</td>
  <td>{{$pengaduan->isi_laporan}}</td>
  <td>{{$pengaduan->foto}}</td>
  <td>{{$pengaduan->status}}</td>
</tr>
<td>
  <a href="">PRINT</a>
</td>

</table>
</body>


