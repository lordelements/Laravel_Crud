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
        <div class="row mt-4">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Laravel CRUD Example</h2>
                        </div>

                    </div>
                </div>


                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Eyy ka muna jan!</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <a href="{{ url('add-user') }}" class="btn btn-primary mt-4">Add user</a>
                <table class="table table-hover mt-4">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>

                    <tbody>
                        @forelse ( $user as $users)
                        <tr>

                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->password }}</td>
                            
                            <td>
                               
                                <form action="{{ url('user/'.$users->id) }}" method="POST">

                                    <a class="btn btn-outline-info btn-sm" href="{{ url('user.show/'.$users->id) }}"> Show</a>
                                    <a href="{{ url('edit-user-data/' .$users->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                   
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm m-0" type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <h5 class="text-center">There are no data.</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

                <div>
                    <div>
                        <div>

</body>

</html>