@php
    $user = auth()->user();
    $enrolledCourses = $user->courses;
@endphp

<div class="container mt-5">
    @if (auth()->check())
    <h1 class="mb-4">Courses that you enrolled</h1>
    <div class="card">
        <div class="card-header">
            Enrolled courses
        </div>
        <div class="card-body">
            <div class="row">
                @if ($enrolledCourses->isEmpty())
                    <p>You are not enrolled in any courses.</p>
                @else
                    @foreach ($enrolledCourses as $course)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Course Id: {{ $course->course_id }}</h5>
                                    <p class="card-text">Course Name: {{$course->course_name}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @else
        <div class="alert alert-warning mt-4">
            You are not logged in. Please <a href="{{ route('login') }}" class="alert-link">login</a> to view your course list.
        </div>
    @endif
</div>