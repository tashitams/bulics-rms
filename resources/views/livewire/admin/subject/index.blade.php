<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                        <div class="row align-items-center">
                        <div class="col-7">
                            <h4 class="mb-0"> Subject List </h4>
                        </div>
                        <div class="text-right col-5">
                            <div class="form-group mb-0 has-search">
                                <span class="icon-search form-control-feedback"></span>
                                <input type="text" wire:model.debounce.250ms="search" class="form-control rounded-pill" placeholder="Search subject">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($subjects->isEmpty())
                        <blockquote>
                            <div class="callout">
                                <p class="content">
                                    <i class="icon-warning-empty navbar-icon"></i> Sorry no subject found ...
                                </p>
                            </div>
                        </blockquote>
                        @else
                        <div class="table-responsive pt-3">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">Subject ID</th>
                                        <th scope="col">Subject Name</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $subject->id }}</th>
                                        <td>{{ $subject->subject_name }}</td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit subject"><i class="icon-edit-1"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button wire:click="destroy({{ $subject->id }})" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete subject"><i class="icon-trash-empty"></i></button>
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
                                {{ $subjects->links() }}
                            </div>
                            <div class="col text-right text-muted mt-2">
                                Showing {{ $subjects->firstItem() }}-{{ $subjects->lastItem() }} of {{ $subjects->total() }} results
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