@php
    use App\Models\User;
    $users = User::whereHas('courses', function($query) use ($unique_id) {$query->where('courses.id', $unique_id);})->get();
@endphp

<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Course name:{{ $course_name }}</p>
    <p>Course id:{{ $course_id }}</p>
    <div class="row">
        <div class="container mt-4">
            <ul class="list-group">
                @foreach ($users as $user)
                    <div class="mt-3">
                        <li class="list-group-item">Name: {{ $user->name }}</li>
                        <li class="list-group-item">Email: {{ $user->email }}</li>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
