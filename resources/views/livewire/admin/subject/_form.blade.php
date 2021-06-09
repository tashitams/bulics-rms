<div class="form-group">
    {!! Form::label('subjectName', 'Subject Name') !!}
    <input type="text" wire:model.debounce.300ms="subject_name" class="form-control @error('subject_name') is-invalid @enderror" placeholder="Enter subject name" required="">		
    <small class="form-text text-muted">Eg. English, Dzongkha etc.</small>
    @error('subject_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>





