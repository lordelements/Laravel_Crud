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

          <p class="fs-5"><x-messages /></p>

          <h4 class="card-title mt-3">Create your account</h4>
         
          <form class="row" action="{{ url('store-register') }}" method="POST">
            @csrf
            <div class="form-floating mb-3 mt-4">

              @error('name')
              <p class="text-red" style="color: red; font-size: 12px;">
              {{$message}}
              </p>
              @enderror

              <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="floatingInput" placeholder="name">
              <label for="floatingInput" class="form-label m-2">Name</label>
            </div>

            <div class="form-floating mb-3">

              @error('email')
              <p class="text-red" style="color: red; font-size: 12px;">
              {{$message}}
              </p>
              @enderror

              <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput" class="form-label m-2">Email address</label>
            </div>

            <div class="form-floating mb-3">
              
              @error('password')
              <p class="text-red" style="color: red; font-size: 12px;">
              {{$message}}
              </p>
              @enderror
              <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword" class="form-label m-2">Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Confirm your password">
              <label for="floatingPassword" class="form-label m-2">Confirm Password</label>
            </div>

            <div class="col-12">
              <button type="submit" class="form-control btn btn-primary mt-2">Register</button>
            </div>

            <div class="container signin p-2">
              <p>Already have an account? <a href="{{ url('/') }}">Sign in</a>.</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>