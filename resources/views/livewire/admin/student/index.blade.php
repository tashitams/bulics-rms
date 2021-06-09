<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h4 class="mb-0"> {{ __('Class Student') }} </h4>
                            </div>
                            <div class="text-right col-5">
                                <div class="form-group mb-0 has-search">
                                    <span class="icon-search form-control-feedback"></span>
                                    <input type="text" wire:model="search" class="form-control rounded-pill" placeholder="Search classes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($grades->isEmpty())
                        <blockquote>
                            <div class="callout">
                                <p class="content">
                                    <i class="icon-warning-empty navbar-icon"></i> Sorry no classes found ...
                                </p>
                            </div>
                        </blockquote>
                        @else
                        <div class="table-responsive pt-3">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">Class Name</th>
                                        <th scope="col" class="text-center">Total Students</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grades as $key => $grade)
                                    <tr>
                                        <th scope="row" class="text-center">{{ ++$key }}</th>
                                        <td> {{ $grade->class_name }}</td>
                                        <td class="text-center"> {{ $grade->students_count }}</td>
                                        @if($grade->students_count > 0)
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('admin.students.show_student', $grade->id) }}" class="btn btn-primary btn-sm rounded-pill" type="button" data-toggle="tooltip" data-placement="top" title="{{ $grade->class_name }} student">
                                                        View students
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                        @else
                                            <td>
                                                <a href="{{ route('admin.students.create') }}" class="btn btn-secondary btn-sm rounded-pill" type="button" data-toggle="tooltip" data-placement="top" title="Add student">
                                                    Add students
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{ $grades->links() }}
                            </div>
                            <div class="col text-right text-muted mt-2">
                                Showing {{ $grades->firstItem() }} to {{ $grades->lastItem() }} out of {{ $grades->total() }} results
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.flash_msg')
</div>

@section('custom-js')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection