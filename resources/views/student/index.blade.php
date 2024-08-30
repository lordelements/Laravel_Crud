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
            <div class="col-md-12">
                <div class="card mt-4">

                    @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif

                    <div class="card-header">
                        <h4>Laravel a IMAGE CRUD
                            <a href="{{ url('add-students') }}" class="btn btn-primary float-end">Add Student</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->course }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/students/'.$item->profile_image) }}"
                                            width="70px" height="70px" alt="img">
                                    </td>

                                    <td>
                                        <form action="{{ url('student/'.$item->id) }}" method="POST">
                                            <a href="{{ url('edit-student/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ url('view-student/'.$item->id) }}" class="btn btn-warning btn-sm">View</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm m-0" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>