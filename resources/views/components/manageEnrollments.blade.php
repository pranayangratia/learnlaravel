@php
    use App\Models\Course;
    $user = auth()->user();
    $courses = Course::where('user_id', $user->id)->exists();
    $courseslist = Course::where('user_id', $user->id)->get();
@endphp

<div class="container mt-5">
    <h1 class="mb-4">View your courses</h1>
    @if (auth()->check())
        <div class="card">
            <div class="card-header">
                Course Management
            </div>
            <div class="card-body">
                @if($courses)
                    <div class="row">
                        <div class="container mt-4">
                            <ul class="list-group">
                                @foreach ($courseslist as $course)
                                    <div class="mt-3">
                                        <li class="list-group-item">
                                            <p>Name: {{ $course->course_name }}</p>
                                            <p>Course ID:  {{ $course->course_id }}</p>
                                            <p>Course Details:  {{ $course->course_details }}</p>
                                            <p>Course Duration:  {{ $course->course_duration }}</p>
                                        </li>
                                    </div>
                                @endforeach
                            </ul>
                            <button type="submit" class="btn btn-primary mt-4" id="openModalBtn" data-bs-toggle="modal" data-bs-target="#courseModal">Add a course</button>
                    <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="courseModalLabel">Add New Course</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addCourseForm" action="{{ route('course.add') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="course_id" class="form-label">Course ID</label>
                                            <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Eg: CS16819" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_name" class="form-label">Course Name</label>
                                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Data Structures" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_details" class="form-label">Course Details</label>
                                            <input type="text" class="form-control" id="course_details" name="course_details" placeholder="Comprising of the complex data structures....." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_duration" class="form-label">Course Duration</label>
                                            <input type="text" class="form-control" id="course_duration" name="course_duration" placeholder="Comprising of the complex data structures....." required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                @else
                    <h6>There are no courses till now.</h6>
                        <button type="submit" class="btn btn-primary " id="openModalBtn" data-bs-toggle="modal" data-bs-target="#courseModal">Add a course</button>
                    <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="courseModalLabel">Add New Course</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addCourseForm" action="{{ route('course.add') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="course_id" class="form-label">Course ID</label>
                                            <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Eg: CS16819" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_name" class="form-label">Course Name</label>
                                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Data Structures" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_details" class="form-label">Course Details</label>
                                            <input type="text" class="form-control" id="course_details" name="course_details" placeholder="Comprising of the complex data structures....." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_duration" class="form-label">Course Duration</label>
                                            <input type="text" class="form-control" id="course_duration" name="course_duration" placeholder="Comprising of the complex data structures....." required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            You are not logged in. Please <a href="{{ route('login') }}" class="alert-link">login</a> to view your profile.
        </div>
    @endif
</div>