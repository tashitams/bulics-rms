<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0"> {{ __('Update class') }} </h4>
                            </div>
                            <div class="text-right col-4">
                                <a href="{{ route('admin.grades.index') }}" class="btn btn-sm btn-primary rounded-pill"><i class="icon-reply-all-1"></i> Return back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            <div class="form-group">
                                {!! Form::label('className', 'Class Name') !!}
                                <input type="text" wire:model="class_name" class="form-control @error('class_name') is-invalid @enderror" placeholder="Enter class name" required="">
                                <small class="form-text text-muted">Eg. Class 7 A, Class VII A etc.</small>
                                @error('class_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div wire:ignore>
                                    {!! Form::label('subject_id', 'Subjects') !!}
                                    {!! Form::select('wire:model=subject_id', $subjects, $this->grade->subjects, ['class' => 'form-control', 'id' => 'subject-id', 'multiple', 'required']) !!}
                                    <small class="form-text text-muted">You can choose multiple subjects.</small>
                                </div>
                            </div>

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

@section('custom-js')
<script>
    $(document).ready(function() {
        $('#subject-id').select2({
            placeholder: "Choose a subject",
            allowClear: true
        });
        $('#subject-id').on('change', function(e) {
            // let subject_id = $(this).attr('id');
            // var data = $(this).select2("val");
            // @this.set('subject_id', data);

            var data = $(this).select2("val");
            @this.set('subject_id', data);

        });
    });
</script>
@include('inc.tooltip')
@endsection