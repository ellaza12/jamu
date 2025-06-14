@guest
<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Jamu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="./assets/css/dashboard.css" rel="stylesheet" />
  <link href="./assets/css/login.css" rel="stylesheet" />
  
</head>
<style>
  html, body {
    overflow: hidden;
  }
</style>
<body>
  <div class="header">
    <img src="./asset/img/jaaaa.jpg" alt="Logo Jamu" style="margin: 5px 5px 5px 30px; width: 100px;">
  </div>
  <div class="page">
    <div class="page-single">
      <div class="container login-wrapper">
        <div class="login-image">
          <img src="./asset/img/h.png" alt="Gambar Jamu">
        </div>
        <div class="login-form">
          <form class="card" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-body p-6 px-5">
              <div class="login-title">
                <h3 class="text-center" style="color: #3cb815">Silahkan Login</h3>
              </div>
              <br>
              <br>
              
              @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
              @endif
              @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif
              
                <div class="form-group" style="position: relative;">
                  <input type="text" autofocus class="form-control" placeholder="Username" name="username">
                  <i class="fa fa-user icon-inside"></i>
                </div>
                <div class="form-group" style="position: relative;">
                  <input type="password" class="form-control" placeholder="**********" name="password" id="password">
                  <i class="fa fa-lock" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                </div>
                
              
              <div class="form-footer">
                <button type="submit" class="btn btn-block" style="background-color: #3cb815; color:white">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
      var passwordInput = document.getElementById('password');
      var passwordIcon = document.getElementById('togglePassword');
    
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';  
        passwordIcon.classList.remove('fa-lock');  
        passwordIcon.classList.add('fa-unlock-alt');
      } else {
        passwordInput.type = 'password';  
        passwordIcon.classList.remove('fa-unlock-alt'); 
        passwordIcon.classList.add('fa-lock');
      }
    });
  </script>
  
</body>
</html>
@endguest

@auth
<script>window.location = "/admin/index";</script>
@endauth
