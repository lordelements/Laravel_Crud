<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- Content here -->
    <div class="container-sm">
        <div class="row">
            <div class="col-sm-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

                <div class="card mt-2">
                    <div class="card-header">
                        <h4>Update Student Info
                            <a href="{{ url('index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-student/'.$student->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Student Name</label>
                                <input type="text" class="form-control" name="name" value="{{$student->name}}">
                            </div>
                            <div class="col-sm-12">
                                <label for="email" class="form-label">Student Email address</label>
                                <input type="email" class="form-control" name="email" value="{{$student->email}}">
                            </div>
                            <div class="col-sm-12">
                                <label for="course" class="form-label">Student Course</label>
                                <input type="text" class="form-control" name="course" value="{{$student->course}}">
                            </div>
                            <div class="col-sm-12">
                                <label for="profile-image" class="form-label">Student Profile</label>
                                <input type="file" class="form-control" name="profile_image">
                                <img src="{{ asset('uploads/students/'.$student->profile_image) }}" class="image-thumbnail mt-2" width="70px" height="70px" alt="img">
                            </div>
                            <div class="form-group mb-3 mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>