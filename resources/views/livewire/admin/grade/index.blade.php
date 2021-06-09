<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h4 class="mb-0"> Class List </h4>
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
                                    <i class="icon-warning-empty navbar-icon"></i> Sorry no class found ...
                                </p>
                            </div>
                        </blockquote>
                        @else
                        <div class="table-responsive pt-3">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">Class ID</th>
                                        <th scope="col">Class Name</th>
                                        <th scope="col" style="padding-left: 35px;">Subjects</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grades as $grade)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $grade->id }}</th>
                                        <td scope="row">{{ $grade->class_name }}</td>
                                        <td scope="row">
                                            <ol>
                                                @foreach($grade->subjects as $subject)
                                                <li>{{ $subject->subject_name }}</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('admin.grades.edit', $grade->id) }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit class"><i class="icon-edit-1"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button wire:click="destroy({{ $grade->id }})" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete class"><i class="icon-trash-empty"></i></button>
                                                </li>
                                            </ul>
                                        </td>
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
                                Showing {{ $grades->firstItem() }}-{{ $grades->lastItem() }} of {{ $grades->total() }} results
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
    @include('inc.tooltip')
@endsection