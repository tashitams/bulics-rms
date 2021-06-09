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
                    {!! Form::open(['route' => ['admin.student_result.update', $student->index_no], 'method' => 'PATCH']) !!}
                    @include('admin.result._edit_form', ['submitBtnText' => 'Update Marks'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
