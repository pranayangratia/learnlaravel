<div class="container mt-5">
    <h1 class="mb-4">Management</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (auth()->check())
        <div class="card">
            <div class="card-header">
                Student Management
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Student View</h5>
                                <p class="card-text">View all your students from different courses</p>
                                <a href="{{route('studentlist')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Manage Courses and Enrollments</h5>
                                <p class="card-text">Add or Remove Enrollments in your courses</br>Add or Remove Courses</p>
                                <a href="{{route('manageEnrollments')}}" class="btn btn-primary">Manage</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Track Attendance</h5>
                                <p class="card-text"> Monitor and record student attendance</p>
                                <a href="{{route('management')}}" class="btn btn-primary">Track</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            You are not logged in. Please <a href="{{ route('login') }}" class="alert-link">login</a> to view your profile.
        </div>
    @endif
</div>