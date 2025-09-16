<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --background-color: #f8f9fa;
            --card-background: #ffffff;
            --border-color: #e9ecef;
            --text-color: #333;
            --shadow-light: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        body {
            background-color: var(--background-color);
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-color);
        }

        .container-sm {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: var(--shadow-md);
            background-color: var(--card-background);
        }

        .card-header {
            background-color: var(--primary-color);
            color: #fff;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h4 {
            margin: 0;
            font-weight: 600;
        }

        .btn {
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .card-body {
            padding: 2rem;
        }

        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 1rem;
            border-color: var(--border-color);
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border-bottom: none;
            font-weight: 600;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .table td img {
            border-radius: 50%;
            border: 2px solid var(--border-color);
            object-fit: cover;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: nowrap;
        }

        .btn-warning {
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container-sm">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

            <div class="card mt-4">

                <div class="card-header">
                    <h4>Student Information
                        <a href="{{ url('add-students') }}" class="btn btn-warning">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Actions</th>
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
                                                width="70px" height="70px" alt="Student Profile Image">
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ url('edit-student/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ url('view-student/'.$item->id) }}" class="btn btn-warning btn-sm">View</a>
                                                <form action="{{ url('student/'.$item->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                </form>
                                            </div>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>