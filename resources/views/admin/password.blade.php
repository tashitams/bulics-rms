@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Change Password') }} </h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.password.update'], 'method' => 'PATCH']) !!}
                        <!-- Form Group (current password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="currentPassword">Current Password</label>
                            <input class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="currentPassword" type="password" placeholder="Enter current password" required>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Form Group (new password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="newPassword">New Password</label>
                            <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="newPassword" type="password" placeholder="Enter new password" required>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Form Group (confirm password)-->
                        <div class="form-group">
                            <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                            <input class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirmPassword" type="password" placeholder="Confirm new password" required>
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-primary" type="submit">Update Password</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @include('inc.flash_msg')
    </div>
</div>
@endsection