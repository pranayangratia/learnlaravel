@php
    use App\Models\User;
    $students = User::where('role', 'student')->get();
@endphp

<div class="container mt-5">
    <h1 class="mb-4">View your students</h1>
    @if (auth()->check())
        <div class="card">
            <div class="card-header">
                Student Management
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container mt-4">
                        <ul class="list-group">
                            @foreach ($students as $student)
                                <div class="mt-3">
                                    <li class="list-group-item">Name: {{ $student->name }}</li>
                                    <li class="list-group-item">Email: {{ $student->email }}</li>
                                </div>
                            @endforeach
                        </ul>
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