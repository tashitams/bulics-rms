@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0"> {{ __('Student Login') }} </h4>
                </div>
                <div class="card-body mt-3">
                    <form method="POST" action="{{ route('student.login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="index_number" class="col-md-4 col-form-label text-md-right">{{ __('Index Number') }}</label>

                            <div class="col-md-6">
                                <input id="index_no" type="number" class="form-control @error('index_no') is-invalid @enderror" name="index_no" value="{{ old('index_no') }}" required autocomplete="index_no" autofocus>
                                <small class="form-text text-muted">Example: 101652</small>
                                @error('index_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="date" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="******">
                                <small class="form-text text-muted">* Password is your DOB</small>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-login-1"></i> {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('inc.flash_msg')
</div>
@endsection