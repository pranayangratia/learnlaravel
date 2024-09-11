@php
    use App\Models\Course;
    $courses = Course::all();
@endphp

<div class="container mt-5">
    <h1 class="mb-4">View your courses</h1>
    @if (auth()->check())
        <div class="card">
            <div class="card-header">
                Enroll in a course
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" id="alert-success">
                         {{ session('success') }}
                    </div>
                @else
                    <div class="alert alert-danger" id="alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                <script>
                    window.addEventListener('load',function() {
                        setTimeout(function() {
                            var successAlert = document.getElementById('alert-success');
                            var errorAlert = document.getElementById('alert-danger');

                            if (successAlert) {
                                successAlert.style.display = 'none';
                            }

                            if (errorAlert) {
                                errorAlert.style.display = 'none'; 
                            }
                        },3000);
                    });
                </script>
                <div class="row">
                    @foreach ($courses as $course)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Course Id: {{ $course->course_id }}</h5>
                                        <p class="card-text">Course Name: {{$course->course_name}}</p>
                                        <button type="submit"  class="btn btn-primary" id="openModalBtn" data-bs-toggle="modal" data-bs-target="#enrollModal{{ $course->id }}">Enroll</button>
                                            <div class="modal fade" id="enrollModal{{ $course->id }}" tabindex="-1" aria-labelledby="enrollModalLabel{{ $course->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="enrollModalLabel{{ $course->id }}">Enroll in this Course</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="enrollForm" action="{{ route('enrollcourse',$course->id) }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="contact_no" class="form-label">Contact no.</label>
                                                                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="888888888" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Enroll</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            You are not logged in. Please <a href="{{ route('login') }}" class="alert-link">login</a> to view your course list.
        </div>
    @endif
</div>