@include('layout.navbarpetugas')

@section('content')

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <form action="{{route('tanggap', ['id'  => $data['status']])}}" method="POST" enctype="multipart/form-data">
        @method("put")
        @csrf
        

    <div class="container">
    <div class="mb-3">
    <label for="formFile" class="form-label"> Bukti Foto</label>
    <input type="file" class="form-control" id="formFile" name="foto">
    </div>

    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label"> Isi Laporan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="isi_laporan" rows="3" required>{{$data['isi_laporan']}}</textarea>
    <select class="form-select" aria-label="Default select example">
        <option selected>Pilih Tanggapan</option>
        <option value="1">0</option>
        <option value="2">proses</option>
        <option value="3">selesai</option>
      </select>

    @error('isi_laporan')
        <div>{{$message}}</div>
    @enderror
    </div>
    <input class="btn btn-primary" type="submit" value="Tanggapi"> 
    </form>
</div>
</body>
</html>