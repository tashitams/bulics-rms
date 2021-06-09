@foreach($results as $result)
    <div class="form-group">
        {!! Form::label('marks', $result->subject->subject_name) !!}
        {!! Form::number('marks[]', $result->marks, ['class' => 'form-control' . ( $errors->has($result->subject->subject_name) ? ' is-invalid' : '' ), 'placeholder' => 'Enter '. $result->subject->subject_name. ' marks', 'required', 'max' => 100, 'min' => 0, 'step' => '0.25']) !!}
        {!! Form::hidden('id[]', $result->id) !!}
        {!! Form::hidden('subject_id[]', $result->subject->id) !!}
    </div>
@endforeach
<div class="form-group">
    {!! Form::submit($submitBtnText, ['class' => 'btn btn-primary']) !!}
</div>


