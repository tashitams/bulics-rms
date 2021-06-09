@foreach($student->grade->subjects as $subject)
    <div class="form-group">
        {!! Form::label('marks', $subject->subject_name) !!}
        {!! Form::number('marks[]', null, ['class' => 'form-control' . ( $errors->has($subject->subject_name) ? ' is-invalid' : '' ), 'placeholder' => 'Enter '. $subject->subject_name. ' marks', 'required', 'max' => 100, 'min' => 0, 'step' => '0.25']) !!}
        {!! Form::hidden('subject_id[]', $subject->id) !!}
    </div>
@endforeach
<div class="form-group">
    {!! Form::submit($submitBtnText, ['class' => 'btn btn-primary']) !!}
</div>


