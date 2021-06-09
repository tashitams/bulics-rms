@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0"> {{ __('Teacher Dashboard') }} </h4>
                        </div>
                        <div class="text-right col-4">
                            <!-- <a href="" data-toggle="tooltip" data-placement="right" title="Read documentation" class="btn btn-sm btn-primary">{{ __('Read Docs') }}</a> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ __('You are logged in as Teacher.') }}
                    <span> Later this page will have quick report.</span>

                    <h2 id="installation" class="mt-3">
                        <a href="#">Quick Start</a>
                    </h2>
                    <p>This application has been developed using Laravel framework v.7 (PHP). Hence the minimum PHP version required is 7.2.5. If you are using PHP version < 7.2.5 please contact your hosting provider.</p> <ul>
                    <li><a href="#">Step 1. Add subjects</a>
                    <li><a href="#">Step 2. Create class/grade and assign subjects to the class</a>
                    <li><a href="#">Step 3. Add new student or upload it </a>
                    <li><a href="#">Step 4. Upload Result</a>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection