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
                        <h4>Add Student Information
                            <a href="{{ url('index') }}" class="btn btn-danger float-end">List</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add-user') }}" method="post">
                            @csrf
                            <div class ="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input type="text" id="nameInput" name="name" class="form-control" placeholder="name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="email">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password">
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