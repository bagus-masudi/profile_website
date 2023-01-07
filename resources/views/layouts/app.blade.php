<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  {{-- <meta http-equiv="refresh" content="1"> --}}
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Fix style in ngrok -->
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  
  <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{asset('style/main.css')}}">
  <title>Profile Website</title>
  <link rel="shortcut icon" href="{{asset('images/user.png')}}">
</head>

<body>

  @yield('content')

  <div class="animation-area">
    <ul class="box-area">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
  </div>

  <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#show-hide i').on('click', function(e) {
                e.preventDefault();
                if($('#password').attr('type') == 'text'){
                    $('#password').attr('type', 'password');
                    $('#show-hide i').addClass('bi bi-eye-slash')
                    $('#show-hide i').removeClass('bi bi-eye')
                } else if($('#password').attr('type') == 'password'){
                    $('#password').attr('type', 'text');
                    $('#show-hide i').removeClass('bi bi-eye-slash')
                    $('#show-hide i').addClass('bi bi-eye')
                }
            })
        });
    </script>
</body>

</html>