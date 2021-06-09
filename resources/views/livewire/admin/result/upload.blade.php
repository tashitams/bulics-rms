<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h4 class="mb-0"> {{ __('Upload Result') }} </h4>
                            </div>
                            <div class="text-right col-5">
                                <div class="form-group mb-0 has-search">
                                    <a href="{{ asset('file/result_upload_sample.xlsx') }}" class="btn btn-sm btn-primary rounded-pill"><i class="icon-download-1"></i> Download sample excel </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="upload">
                            <div class="form-group">
                                <label for="avatar">Select Excel file </label>
                                <input type="file" wire:model="result_file" required class="form-control-file @error('result_file') is-invalid @enderror">
                                <small class="form-text text-muted">xlsx or xls no larger than 5 MB</small>
                                @error('result_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input {{ empty($result_file) ? 'disabled' : '' }} class="btn btn-primary" type="submit" wire:target="upload" wire:loading.remove value="Upload Now">
                            </div>
                            <div wire:loading wire:target="upload">
                                <button type="button" class="btn btn-danger"> <i class="icon-spin4 animate-spin mr-1"></i> Uploading please wait ...</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.flash_msg')
</div>