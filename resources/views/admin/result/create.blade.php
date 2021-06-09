@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0"> {{ $student->name }} </h4>
                        </div>
                        <div class="col-4 text-right">
                           Index Number: {{ $student->index_no }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                @if($student->results()->exists())
                    <blockquote>
                        <div class="callout">
                            <p class="content"> 
                                <i class="icon-edit-1 navbar-icon"></i> Sorry the result for {{ $student->name }} is already saved. You may try editing the result.
                            </p>
                        </div>
                    </blockquote>
                @else
                    {!! Form::open(['route' => ['admin.student_result.store', $student->index_no], 'method' => 'POST']) !!}
                    @include('admin.result._create_form', ['submitBtnText' => 'Save Marks'])
                    {!! Form::close() !!}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
