<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h4 class="mb-0"> Student List</h4>
                            </div>
                            <div class="text-right col-5">
                                <div class="form-group mb-0 has-search">
                                    <span class="icon-search form-control-feedback"></span>
                                    <input type="text" wire:model="search" class="form-control rounded-pill" placeholder="Search student">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-box">
                            @if ($students->isEmpty())
                            <blockquote>
                                <div class="callout">
                                    <p class="content">
                                        <i class="icon-warning-empty navbar-icon mr-2"></i> Sorry no students have been created at the moment.
                                    </p>
                                </div>
                            </blockquote>
                            @else
                            <div class="table-responsive pt-3">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="row" class="text-center">#</th>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Index Number</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $key => $student)
                                        <tr>
                                            <th scope="row" class="text-center"> {{ $key + $students->firstItem()}}</th>
                                            <td> {{ $student->name }}</td>
                                            <td> {{ $student->index_no }}</td>
                                            <td>
                                                <!-- Call to action buttons -->
                                                <ul class="list-inline m-0">
                                                @if($student->results()->exists())
                                                    <li class="list-inline-item">
                                                        <div class="dropdown show">
                                                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{ route('admin.students.edit', $student->index_no) }}" data-toggle="tooltip" data-placement="top" title="Edit Student"><i class="icon-edit-1"></i> Edit </a>
                                                                <button wire:click="destroy({{ $student->index_no }})" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Delete student"><i class="icon-trash-empty"></i> Delete</button>
                                                            </div>
                                                        </div>
                                                    </li>  
                                                    <li class="list-inline-item">
                                                        <div class="dropdown show">
                                                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Result
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{ route('admin.student_result.edit', $student->index_no) }}" data-toggle="tooltip" data-placement="top" title="Edit Result"><i class="icon-edit-1"></i> Edit </a>
                                                                <form method="POST" action="{{ route('admin.student_result.destroy', $student->index_no) }}" style="display: inline;" onsubmit="return confirm('Do you want to delete this student\'s result?');">
                                                                @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="submit" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Delete {{ $student->name }}'s result"> <i class="icon-trash-empty"></i> Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="list-inline-item">
                                                        <div class="dropdown show">
                                                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{ route('admin.students.edit', $student->index_no) }}" data-toggle="tooltip" data-placement="top" title="Edit Student"><i class="icon-edit-1"></i> Edit </a>
                                                                <button wire:click="destroy({{ $student->index_no }})" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Delete student"><i class="icon-trash-empty"></i> Delete</button>
                                                                <a class="dropdown-item" href="{{ route('admin.student_result.create', $student->index_no) }}" data-toggle="tooltip" data-placement="top" title="Add Result"> <i class="icon-plus-outline"></i> Add Result</a>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                @endif
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{ $students->links() }}
                                </div>
                                <div class="col text-right text-muted mt-2">
                                    Showing {{ $students->firstItem() }}-{{ $students->lastItem() }} of {{ $students->total() }} results
                                </div>
                            </div>
                            @endif
                        </div>
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