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

                <x-messages />
                <!-- @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Eyy ka muna jan!</strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif -->

                <!-- <a href="{{ url('add-user') }}" class="btn btn-primary mt-4">Add user</a> -->
                <a href="{{ url('/homepages') }}" class="btn btn-outline-danger btn-sm m-0 mt-3">Back</a>
                <a href="{{ route('user.trash') }}" class="btn btn-outline-success btn-sm m-0 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 
                        1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z" />
                    </svg> Archive</a>

                <div class="mt-4 text-bold">
                    <span>Total Users: {{ $total_user }}</span>
                </div>
                <table class="table table-hover mt-4">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>

                    <tbody>
                        @forelse ( $user as $users)

                        <tr>

                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>


                            <td>
                                <form action="{{ url('user/'.$users->id) }}" method="POST">

                                    <a href="{{ url('edit-userdata/'.$users->id) }}" class="btn btn-outline-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-secondary btn-sm m-0" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                            <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 
                                        1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z" />
                                        </svg>
                                    </button>

                                    <a href="{{ url('view-user/'.$users->id) }}" class="btn btn-outline-info btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg>
                                    </a>
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