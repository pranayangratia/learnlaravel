<div class="container mt-5">
    <h1 class="mb-4">User Profile</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (auth()->check())
        <div class="card">
            <div class="card-header">
                Profile Information
            </div>
            <div class="card-body">
                @if (Route::is('/profile/edit')) 
                    <x-profile-edit />
                @endif
                <p class="card-text"><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p class="card-text"><strong>Joined:</strong> {{ auth()->user()->created_at->format('F j, Y') }}</p>
                <p class="card-text"><strong>Role:</strong> {{ auth()->user()->role}}</p>

                <form method="GET" action="{{ route('profile-edit') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Edit</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            You are not logged in. Please <a href="{{ route('login') }}" class="alert-link">login</a> to view your profile.
        </div>
    @endif
</div>