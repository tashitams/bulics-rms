<?php

namespace App\Imports;

use App\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class ResultImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    
    public function model(array $row)
    {
        return new Result([
            'index_number' => $row['index_number'],
            'subject_id'   => $row['subject_id'], 
            'marks'        => $row['marks'], 
        ]);
    }

    public function rules(): array
    {
        return [
            'index_number'  => 'bail|required|exists:students,index_no',
            'subject_id'    => 'bail|required|exists:subjects,id',
            'marks'         => 'bail|required|numeric|between:0,100',
        ];

    }

    public function customValidationMessages()
    {
        return [
            'index_number.required'  => 'Index Number is required',
            'index_number.exists'    => 'Invalid Index Number',
            'subject_id.required'  => 'Subject ID is required',
            'subject_id.exists'    => 'Invalid Subject ID',
            'marks.required'       => 'Marks is required',
            'marks.between'        => 'Marks should be between 0 and 100',
        ];
    }
}
