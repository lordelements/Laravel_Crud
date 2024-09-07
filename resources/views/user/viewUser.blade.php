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
                    <div class="card-header">
                        User Information
                        <h4><a href="{{ url('index-display') }}" class="btn btn-danger float-end">Back</a></h4>
                    </div>
                    <div class="card-body">

                    <form action="{{ url('view-user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <h6>User ID</h6>
                                <p>{{$user->id }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <h6>User name</h6>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="mb-3">
                                <h6>User email address</h6>
                                <p>{{ $user->email }}</p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


</body>

</html>