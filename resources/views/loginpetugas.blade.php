<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isi-masyarakat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
@include('layout.navbar') 
     <br>
     <br>
     <h3 style="text-align:center;">{{$loginpetugas}}</h3>
     @if(session("error"))
      <div class="alert alert-danger">{{session("error")}}</div>
     @endif
        <form action="{{ url('loginpetugas')}}" method="POST" enctype="multipart/form-data">
            <div class="container">
                @method("POST")
                @csrf 
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="col-form-label">Username</label>
                    <input class="form-control" type="text"  name="username" aria-label="default input example">
               </div>

               <div class="mb-3">
                 <label for="inputPassword5" class="form-label">Password</label>
                 <input type="password"  name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
               </div> 
                  
                  <br>
                <input class="btn btn-primary" type="submit" value="Daftar"> 
        </form> 
</body>
</html>