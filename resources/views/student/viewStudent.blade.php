<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
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

        .info-group {
            margin-bottom: 1.5rem;
        }

        .info-group h6 {
            color: var(--label-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
            display: inline-block;
            padding-bottom: 0.25rem;
        }
        
        .info-group p {
            font-size: 1.1rem;
            margin: 0;
            color: var(--text-color);
        }

        .profile-image-container {
            margin-top: 1rem;
        }
        
        .profile-image-container img {
            border-radius: 50%;
            border: 4px solid var(--primary-color);
            box-shadow: var(--shadow-light);
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container-sm">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Student Information</h4>
                        <a href="{{ url('index') }}" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        
                        <div class="info-group">
                            <h6>Student Name</h6>
                            <p>{{$student->name}}</p>
                        </div>
                        <div class="info-group">
                            <h6>Student Email Address</h6>
                            <p>{{$student->email}}</p>
                        </div>
                        <div class="info-group">
                            <h6>Student Course</h6>
                            <p>{{$student->course}}</p>
                        </div>
                        
                        <div class="info-group">
                            <h6>Student Profile Picture</h6>
                            <div class="profile-image-container">
                                <img src="{{ asset('uploads/students/'.$student->profile_image) }}" width="150px" height="150px" alt="Student Profile Picture">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>