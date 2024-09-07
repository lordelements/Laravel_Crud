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
                        Student Information
                        <h4><a href="{{ url('index') }}" class="btn btn-danger float-end">Back</a></h4>
                    </div>
                    <div class="card-body">

                    <form action="{{ url('view-student/'.$student->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <h6>Student name</h6>
                                <p>{{$student->name}}</p>
                            </div>
                            <div class="mb-3">
                                <h6>Student email address</h6>
                                <p>{{$student->email}}</p>
                            </div>
                            <div class="mb-3">
                                <h6>Student course</h6>
                                <p>{{$student->course}}</p>
                            </div>
                            <div class="mb-3">
                                <h6>Student Profile</h6>
                                <img src="{{ asset('uploads/students/'.$student->profile_image) }}"  width="70px" height="70px" alt="img">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


</body>

</html>