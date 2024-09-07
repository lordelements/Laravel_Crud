<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

          <x-messages />
          <h4 class="card-title">Sign in here</h4>
          <form class="row mt-4" action="{{ url('store-login') }}" method="POST">
            @csrf

            @error('email')
            <p class="text-red" style="color: red; font-size: 15px;">
              {{$message}}
            </p>
            @enderror

            <div class="form-floating mb-4">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput" class="form-label m-2">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword" class="form-label m-2">Password</label>
            </div>
            <div class="col-12">
              <button type="submit" class="form-control btn btn-primary mt-2">Login</button>
            </div>

            <div class="container signin p-2">
              <p>Dont have an account? <a href="{{ url('register-pages') }}">Sign up</a>.</p>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>

</body>

</html>