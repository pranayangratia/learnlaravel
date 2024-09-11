@php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layout.app')

@section('content')
    @if (auth()->check())
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Dashboard</h3>
                        </div>
                        <div class="card-body">
                            @if(request()->fullUrlIs('http://127.0.0.1:8000/dashboard/profile/edit*'))
                                <h4>Edit your Profile</h4>
                                <x-profile-edit />
                            @else
                                @if(route('profile'))  
                                    <p>Welcome to your dashboard!</p>
                                    <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Profile</h5>
                                                <p class="card-text">View and edit your profile details.</p>
                                                <a href="{{route('profile')}}" class="btn btn-primary">Go to Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::user()->role == 'teacher')
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Management</h5>
                                                <p class="card-text">Manage your classroom</p>
                                                <a href="{{route('management')}}" class="btn btn-primary">Go to Management</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Upload</h5>
                                                <p class="card-text">Upload your lectures</p>
                                                <a href="" class="btn btn-primary">Go to Upload</a>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif (Auth::user()->role == 'student')
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Study</h5>
                                                <p class="card-text">Learn your Courses</p>
                                                <a href="{{route('gotodesk')}}" class="btn btn-primary">Go to Desk</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Attendance</h5>
                                                <p class="card-text">Check your Attendance</p>
                                                <a href="{{route('attendancerecord')}}" class="btn btn-primary">Go to Attendance</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection