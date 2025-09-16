<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --background-color: #f8f9fa;
            --card-background: #ffffff;
            --border-color: #dee2e6;
            --text-color: #333;
            --label-color: #555;
            --shadow-light: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        body {
            background-color: var(--background-color);
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-color);
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: var(--shadow-md);
            background-color: var(--card-background);
            width: 100%;
            max-width: 600px;
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
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .card-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--label-color);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            outline: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .alert-success {
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .float-end {
            float: right;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            <h4>Add Student Information</h4>
            <a href="{{ url('index') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ url('add-students') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" name="name" placeholder="e.g., Jane Doe">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Student Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="e.g., jane.doe@example.com">
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Student Course</label>
                    <input type="text" class="form-control" name="course" placeholder="e.g., Computer Science">
                </div>
                <div class="mb-3">
                    <label for="profile-image" class="form-label">Student Profile Picture</label>
                    <input type="file" class="form-control" name="profile_image">
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Save Information</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>