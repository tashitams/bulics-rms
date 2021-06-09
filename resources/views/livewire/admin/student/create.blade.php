<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0"> {{ __('Add new student') }} </h4>
                            </div>
                            <div class="text-right col-4">
                                <a href="{{ route('admin.students.index') }}" class="btn btn-sm btn-primary rounded-pill"><i class="icon-reply-all-1"></i> Return back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="store">
                            @include('livewire.admin.student._form')
                            <div class="form-group">
                                <input {{ empty($name && $index_no && $password && $grade_id) ? 'disabled' : '' }} class="btn btn-primary" type="submit" wire:target="store" wire:loading.remove value="Add Student">
                            </div>
                            <div wire:loading wire:target="store">
                                <button type="button" class="btn btn-danger"> <i class="icon-spin4 animate-spin mr-1"></i> Saving ...</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.flash_msg')
</div>