@extends('layouts.app')

@section('content')


    <div class="container mt-5" id = "content">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Image Section -->
                <div class="card">
                    <div class="card-body text-center">
                        <div class="profile-img-container">
                            <div class="profile-img-border">
                                <img src="{{ asset('images/profile_img.jpg') }}" alt="Profile Picture" class="img-fluid rounded-circle profile-img">
                            </div>
                        </div>
                        <h5 class="card-title mt-3">{{$user->name}}</h5>
                        <p class="card-text text-muted">Web Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <!-- Profile Information Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Profile Information</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{$user->email}}</p>
                                <p><strong>Phone:</strong> (123) 456-7890</p>
                                <!-- Add more details as needed -->
                            </div>
                            <div class="col-md-6">
                                <p><strong>Location:</strong> City, Country</p>
                                <p><strong>Website:</strong> www.johndoe.com</p>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Experience</h3>
                        <hr>
                        <!-- Add your experience details here -->
                        <p><strong>Web Developer</strong></p>
                        <p class="text-muted">Company Name, City, Country</p>
                        <p class="text-muted">January 2020 - Present</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                </div>

                <!-- Education Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Education</h3>
                        <hr>
                        <!-- Add your education details here -->
                        <p><strong>Bachelor of Science in Computer Science</strong></p>
                        <p class="text-muted">University Name, City, Country</p>
                        <p class="text-muted">Graduated: May 2019</p>
                    </div>
                </div>

                <!-- Skills Section -->
                
            </div>
        </div>
    </div>

    <!-- Additional CSS for Profile Image and Background Design -->
    <style>
        .profile-img-container {
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 50%;
            margin: 0 auto;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* This ensures the image covers the entire container */
        }
    </style>
@endsection
