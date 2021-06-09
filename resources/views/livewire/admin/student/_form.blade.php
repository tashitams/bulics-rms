<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('studentName', 'Student Name') !!}
            <input type="text" wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter student name" required="">		
            <small class="form-text text-muted">Special characters are not allowed.</small>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('indexNumber', 'Index Number') !!}
            <input type="number" wire:model.lazy="index_no" class="form-control @error('index_no') is-invalid @enderror" placeholder="Enter index number" required="">
            <small class="form-text text-muted">Index number should be 5 characters.</small>
            @error('index_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            <input type="date" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter the password" required="">
            <small class="form-text text-muted">Default password is their DOB.</small>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('grade_id', 'Class Name') !!}
            <select wire:model.lazy="grade_id" class="form-control @error('grade_id') is-invalid @enderror" >
                <option value="">Select a class</option>    
                @foreach($grades as $grade)    
                    <option value="{{ $grade->id }}">{{ $grade->class_name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Select class for the student.</small>
            @error('grade_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>