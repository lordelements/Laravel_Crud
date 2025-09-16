
---

## Laravel CRUD Operations Using Service Class

In Laravel, using a **service class** for your CRUD operations is an excellent way to follow the **Single Responsibility Principle (SRP)** and keep your controllers clean and organized. By placing the business logic inside service classes, you can separate concerns between request handling and the actual business logic, making the application more maintainable, scalable, and testable.

---

### General Flow

1. **Controller**: Handles HTTP requests, validates input, and calls the service methods.
2. **Service**: Contains the business logic and interacts with the model.
3. **Model**: Represents the database structure and interacts with the database.

---

### Example: Create Operation Using Service Class

Below is an organized approach for handling the **Create** operation (insert) with the service class in Laravel.

---

### 1. **Service Class: Handling Business Logic (Create Operation)**

The **service class** holds the business logic for creating a student record, including validation, file handling, and saving the data to the database.

```php
namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentService
{
    /**
     * Create a new student record.
     */
    public function createFromRequest(Request $request)
    {
        // Validate the incoming request (optional)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // image validation
        ]);

        // Create a new student record
        $student = new Student();
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->course = $validatedData['course'];

        // Handle file upload (if provided)
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $student->profile_image = $filename;
        }

        // Save the student record to the database
        $student->save();

        // Return the created student record
        return $student;
    }
}
```

#### Key Points:

* The `createFromRequest` method validates the input data.
* It processes the file upload if a profile image is provided.
* It creates a new student and saves the record to the database.

---

### 2. **Controller Class: Interacting with the Request and Service**

The **controller** is responsible for handling the HTTP request and interacting with the business logic via the service class.

```php
namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    // Inject the StudentService into the controller
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    // Show the form to create a student
    public function create()
    {
        return view('students.create');
    }

    // Store a new student record
    public function store(Request $request)
    {
        // Delegate the logic to the service class
        $student = $this->studentService->createFromRequest($request);

        // Redirect with a success message
        return redirect()->route('students.index')->with('status', 'Student created successfully!');
    }
}
```

#### Key Points:

* The `store` method handles the `POST` request and delegates the logic to the `StudentService` class.
* After creating the student, it redirects to the `students.index` route with a success message.

---

### 3. **Route Definition**

Define the routes for creating a student in your `web.php` routes file.

```php
use App\Http\Controllers\StudentController;

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
```

* The `GET` route shows the form to create a new student.
* The `POST` route processes the form data and calls the `store` method of the controller, which delegates the operation to the service class.

---

### 4. **Blade Template for Student Creation (Form)**

The Blade template handles the form submission for creating a student.

```html
<!-- resources/views/students/create.blade.php -->

<form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="course">Course</label>
        <input type="text" name="course" required>
    </div>
    <div>
        <label for="profile_image">Profile Image</label>
        <input type="file" name="profile_image">
    </div>
    <button type="submit">Create Student</button>
</form>
```

* The form includes the fields: `name`, `email`, `course`, and `profile_image`.
* It uses `enctype="multipart/form-data"` to support file uploads.
* The form submits to the `store` method of the `StudentController`.

---

### Full Flow of the **Create** Operation:

1. **User submits the form**: The user enters the details and submits the form.
2. **Controller processes the request**: The `store` method in the controller calls the `createFromRequest` method in the `StudentService` class.
3. **Service processes business logic**: The service class validates the request, handles file uploads, creates the student record, and saves it to the database.
4. **Redirect with success message**: After the student is created, the controller redirects to the `students.index` page with a success message.

---

### Advantages of This Approach:

1. **Separation of Concerns**: The controller focuses only on request handling, while the service class manages business logic.
2. **Reusability**: The service class can be reused for other operations (e.g., update, delete).
3. **Testability**: The service class is easier to test since it encapsulates the business logic.
4. **Cleaner Controllers**: Controllers remain clean and focused on handling HTTP requests and responses.

---

### Final Project Structure:

```text
app/
    Http/
        Controllers/
            StudentController.php
    Services/
        StudentService.php
    Models/
        Student.php
    Resources/
        views/
            students/
                create.blade.php
    routes/
        web.php
```

This approach ensures that your code is **modular**, **clean**, and **easy to maintain**. The service class is reusable and easy to test, while the controller remains concise and focused on handling HTTP requests.

---

This structure is ideal for large-scale applications and ensures maintainability, readability, and scalability.
