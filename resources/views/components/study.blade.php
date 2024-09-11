
<div class="container mt-5">
    @if (auth()->check())
        <div class="card">
            <div class="card-header">
                <h1 class="mb-4">Your Desk</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Courses Enrolled</h5>
                                <p class="card-text">View all courses that you enrolled.</p>
                                <a href="{{route('courseenrolledlist')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Browse</h5>
                                <p class="card-text">Find new courses to enroll.</p>
                                <a href="{{route('viewcourselist')}}" class="btn btn-primary">Find</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ask your Teacher</h5>
                                <p class="card-text">Find solutions to your Doubts.</p>
                                <a href="" class="btn btn-primary">Ask</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            You are not logged in. Please <a href="{{ route('login') }}" class="alert-link">login</a> to view your learning desk.
        </div>
    @endif
</div>