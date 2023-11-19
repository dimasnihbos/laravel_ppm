@include('layout.navbarpetugas')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $laporan }}</h1>

    <table class="center" border="1">
        <tr>
          <th>ID</th>
          <th>Tanggal</th>
          <th>Nik</th>
          <th>isi_laporan</th>
          <th>Foto</th>
          <th>status</th>
        </tr>
      
      
      @foreach($pengaduan as $pengaduan)
      <tr>
        <td>{{$pengaduan->id_pengaduan}}</td>
        <td>{{$pengaduan->tgl_pengaduan}}</td>
        <td>{{$pengaduan->nik}}</td>
        <td>{{$pengaduan->isi_laporan}}</td>
        <td><img src='{{asset("storage/image/".$pengaduan->foto)}}' width="120px"></td>
        <td>{{$pengaduan->status}}</td>
      </tr>
      <td>
        <a href="tanggap-pengaduan/{{$pengaduan->status}}">Tanggapi</a>|
        <a href="detail-petugas/{{$pengaduan->status}}">Detail</a>
      </td>
      @endforeach
      </table>
</body>
</html>