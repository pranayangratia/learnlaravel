@php
    use App\Models\Course;
    $user = auth()->user();
    $courses = Course::where('user_id', $user->id)->exists();
    $courselist = Course::where('user_id', $user->id)->get();
@endphp


<div class="container mt-5">
    @if(auth()->check())
    <div class="card">
        <div class="card-header">
            <h3>Download your student list</h3>
        </div>
        <div class="card-body">

            @if($courses)
                <div class="row">
                    @foreach($courselist as $course)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> Course name: {{$course->course_name}}</h5>
                                    <p class="card-description">Download the list of students who belog to {{$course->course_name}}</p>
                                    <a  href="{{route('generatepdf', $course->id)}}" class="btn btn-primary">Download</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @endif
</div>