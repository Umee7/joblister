@extends('layouts.account')

@section('content')
<div class="account-layoutborder">
  <div class="account-hdr bg-primary text-white border ">
    User Account
  </div>
  <div class="account-bdy border py-3">
    <div class="row container d-flex justify-content-center">
        <div class="col-xl-12 col-md-12">
            <div class="card user-card-full">
                <div class="row m-l-0 m-r-0">
                    <div class="col-sm-4 bg-c-lite-green user-profile">
                        <div class="card-block text-center text-white">
                            <div class="m-b-25"> <img src="{{asset('images/user-profile.png')}}" class="img-radius" alt="User-Profile-Image"> </div>
                            <h6 class="f-w-600">{{auth()->user()->name}}</h6>
                            <p>User</p>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <h6 class="text-muted f-w-400">{{auth()->user()->email}}</h6>
                                </div>
                            </div>

                            <!-- Resume Upload Section - Always Visible -->
                            <div class="mt-4">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Resume</h6>
                                <div class="row">
                                    <div class="col-12">
                                        @if(auth()->user()->resume)
                                            <div class="mb-3">
                                                <p class="m-b-10 f-w-600">Current Resume:</p>
                                                <a href="{{asset('storage/' . auth()->user()->resume)}}" target="_blank" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-file-pdf"></i> View Resume
                                                </a>
                                            </div>
                                        @endif
                                        
                                        <form action="{{route('account.uploadResume')}}" method="POST" enctype="multipart/form-data" class="mt-3">
                                            @csrf
                                            <div class="form-group">
                                                <label for="resume" class="f-w-600">Upload New Resume:</label>
                                                <input type="file" name="resume" id="resume" class="form-control-file" accept=".pdf,.doc,.docx" required>
                                                <small class="form-text text-muted">Accepted formats: PDF, DOC, DOCX (Max size: 2MB)</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-2">
                                                <i class="fas fa-upload"></i> Upload Resume
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Account Settings</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Password</p>
                                    <a href="{{route('account.changePassword')}}" class="btn primary-outline-btn">Change password</a>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Logout</p>
                                    <a href="{{route('account.logout')}}" class="btn btn-outline-dark">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@if ($errors->any())
<div class="alert alert-danger mt-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection

@push('css')
<style>
.user-card-full {
    overflow: hidden;
}
.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}
.user-profile {
    padding: 20px 0
}
.card-block {
    padding: 1.25rem
}
.m-b-25 {
    margin-bottom: 25px
}
.img-radius {
    border-radius: 5px
}
.card .card-block p {
    line-height: 25px
}
.b-b-default {
    border-bottom: 1px solid #e0e0e0
}
.m-b-20 {
    margin-bottom: 20px
}
.p-b-5 {
    padding-bottom: 5px !important
}
.f-w-600 {
    font-weight: 600
}
.m-t-40 {
    margin-top: 40px
}
.bg-c-lite-green {
    background: linear-gradient(to right, #185A91, #3498DA)
}
</style>
@endpush