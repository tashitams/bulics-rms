@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Profile Picture') }} </h4>
                </div>
                <div class="card-body text-center">
                    @if(Auth::user()->avatar)
                        <img src=" {{ asset('/storage/avatar/'. Auth::user()->avatar) }}" class="img-account-profile rounded-circle mb-2" alt="Avatar">
                        <div class="small font-italic text-muted mb-4">
                            JPG or PNG no larger than 1 MB
                            <small class="form-text text-muted">Preferred size 512x512</small>
                        </div>
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#profileUploadImageModal" data-backdrop="static" data-keyboard="false">Upload new image</button>
                    @else
                        <img src="{{ asset('img/default.jpg') }}" class="img-account-profile rounded-circle mb-2" alt="Avatar">
                        <div class="small font-italic text-muted mb-4">
                            JPG or PNG no larger than 1 MB
                            <small class="form-text text-muted">Preferred size 512x512</small>
                        </div>
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#profileUploadImageModal" data-backdrop="static" data-keyboard="false">Upload new image</button>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Account Details') }} </h4>
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => ['admin.profile.update'], 'method' => 'PATCH']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="small mb-1" for="inputName">Name</label>
                                <input class="form-control  @error('name') is-invalid @enderror" name="name" type="text" placeholder="eg. My Bhutan" value="{{ Auth::user()->name }}">
                                <small class="form-text text-muted">Do not use special characters</small>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control  @error('username') is-invalid @enderror" name="username" type="text" placeholder="eg. ict_bhutan" value="{{ Auth::user()->username }}">
                                <small class="form-text text-muted">Use alphanumeric characters, underscore and dot</small>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @include('inc.flash_msg')
    </div>
    <!-- Modal -->
    <div class="modal fade" id="profileUploadImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.update_avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="avatar" required class="form-control-file" required>
                            <small class="form-text text-muted">JPG or PNG no larger than 1 MB</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection