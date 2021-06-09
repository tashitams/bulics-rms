@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">{{ $user->name }} </h4>
                        </div>
                        <div class="text-right col-4">
                            <span class="btn btn-sm btn-secondary"> Index Number - {{ $user->index_no }} </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($user->results()->exists())
                        <div class="table-body table-responsive">
                            <table class="table table-striped table-borderless" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th> Subject</th>
                                        <th class="text-center"> Marks</th>
                                    </tr>
                                </thead>
                                <tbody class="no-border-x">
                                    @foreach ($user->results as $key => $result)
                                    <tr>
                                        <td class="text-center">{{ ++$key }} </td>
                                        <td> {{ $result->subject->subject_name }}</td>
                                        <td class="text-center"> {{ $result->marks }} </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td class="text-center"></td>
                                        <td><b>Total Marks</b></td>
                                        <td class="text-center"> <b> {{ $total_marks }} </b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td><b>Percentage</b></td>
                                        <td class="text-center"> <b> {{ number_format($percentage, 2) }} %</b></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <small class="form-text text-muted">*Note: In order to promote student to higher grade, the student MUST pass in Dzongkha and English and should not fail in more than 2 minor subjects.</small>
                    @else
                        <blockquote>
                            <div class="callout">
                                <p class="content">
                                    <i class="icon-edit-1 navbar-icon"></i> Sorry your result haven't been uploaded at the moment.
                                </p>
                            </div>
                        </blockquote>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('inc.flash_msg')
</div>
@endsection