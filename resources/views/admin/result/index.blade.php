@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0"> {{ __('All Students') }} </h4>
                        </div>
                        <div class="text-right col-4">
                            <a href="{{ route('admin.students.create') }}" class="btn btn-sm btn-primary">Add new +</a>
                            <!-- <div class="dropdown show">
                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Filter
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-box">
                        @if ($grades->isEmpty())
                        <blockquote>
                            <div class="callout">
                                <p class="content">
                                    <i class="icon-edit-1 navbar-icon"></i> Sorry no students have been created at the moment.
                                </p>
                            </div>
                        </blockquote>
                        @else
                        <div class="table-body table-responsive">
                            <table class="table table-striped table-borderless" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th> Class name</th>
                                        <th class="text-center"> Total Student</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="no-border-x">
                                    @foreach ($grades as $key => $grade)
                                    <tr>
                                        <td class="text-center">{{ ++$key }} </td>
                                        <td> {{ $grade->name }}</td>
                                        <td class="text-center"> {{ $grade->students_count }}</td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('admin.students.show_class_student', $grade->id) }}" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="{{ $grade->name }} student">
                                                        <!-- <i class="icon-user"></i> --> View students
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        {{ $grades->links() }}
                    </div>
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