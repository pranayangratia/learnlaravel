@php
    use App\Models\Course;
    $courses = Course::all();
@endphp

@if(session('success'))
    <div class="alert alert-success" id="alert-success">
        {{ session('success') }}
    </div>
@else
    <div class="container mt-5">
        <h3>Record your Attendance</h3>
        <form action="{{route('attendancestore')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="course_id" class="form-label">Select Course</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">
                        ----Select a Course----
                    </option>
                    @foreach($courses as $course)
                        <option value="{{$course->course_id}}">{{$course->course_id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Select your date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-success">
                Record
            </button>
        </form>
    </div>
@endif