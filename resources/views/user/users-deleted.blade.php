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
                            <h2>Trash Users</h2>
                        </div>
                    </div>
                </div>

                <x-messages />

                <a href="{{ url('users') }}" class="btn btn-outline-danger btn-sm m-0 mt-3">Back</a>

                <div class="mt-4 text-bold">
                    <span>Total Users Deleted: {{ $total_users_deleted }}</span>
                </div>
                <table class="table table-hover mt-4">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date of deletion</th>
                        <th scope="col">Action</th>
                    </tr>

                    <tbody>
                        @forelse ( $user as $users)
                        <tr>

                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->deleted_at }}</td>

                            <td>
                                <!-- <form action="{{ url('user/delete-permanent/'.$users->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm m-0" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                        </svg> Delete permanently
                                    </button>

                                    <a href="{{ url('restore/'.$users->id) }}" class="btn btn-success btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                        </svg>
                                    </a>

                                </form> -->

                                <a href="{{ url('restore/'.$users->id) }}" class="btn btn-success btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                    </svg>
                                </a>

                                <a href="{{ route('users.delete-permanent', ['id'=> $users->id]) }}" class="btn btn-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                    </svg>
                                    Delete permanently
                                </a>

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