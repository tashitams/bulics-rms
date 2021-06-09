<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0"> {{ __('Update subject') }} </h4>
                            </div>
                            <div class="text-right col-4">
                                <a href="{{ route('admin.subjects.index') }}" class="btn btn-sm btn-primary rounded-pill"><i class="icon-reply-all-1"></i> Return back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            @include('livewire.admin.subject._form')
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Update Subject" wire:target="update" wire:loading.remove>
                            </div>
                            <div wire:loading wire:target="update">
                                <button type="button" class="btn btn-danger"> <i class="icon-spin4 animate-spin mr-1"></i> Updating ...</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
