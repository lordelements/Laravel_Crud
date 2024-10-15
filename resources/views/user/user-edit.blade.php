<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-sm">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-4">

                    @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif

                    <div class="card-header">
                        <h4>Add users Information
                            <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <x-messages />
                        <form action="{{ url('updateuser-data/'.$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input type="text" id="nameInput" name="name" value="{{$user->name}}"
                                    class="form-control" placeholder="name">

                                @error('name')
                                <p class="text-red" style="color: red; font-size: 12px;">
                                    {{$message}}
                                </p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{$user->email}}"
                                    class="form-control" placeholder="email">

                                @error('email')
                                <p class="text-red" style="color: red; font-size: 12px;">
                                    {{$message}}
                                </p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" value="{{$user->password}}"
                                    class="form-control" placeholder="password">

                                @error('password')
                                <p class="text-red" style="color: red; font-size: 12px;">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password_confirmation" value="{{$user->password}}"
                                    class="form-control" placeholder="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>