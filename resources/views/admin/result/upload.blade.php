@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0"> {{ __('Upload Result') }} </h4>
                        </div>
                        <div class="col-4 text-right">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.results.post_upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="avatar">Select Excel file </label>
                            <input type="file" name="excel_file" required class="form-control-file">
                            <small class="form-text text-muted">xlsx or xls no larger than 5 MB</small>
                        </div>
                        <input type="submit" value="Upload Now" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection