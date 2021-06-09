<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        return new Student([
            'name'            => $row['name'],
            'index_no'        => $row['index_no'], 
            'password'        => Hash::make(Date::excelToDateTimeObject($row['password'])->format('Y-m-d')),
            'grade_id'        => $row['grade_id'], 
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'bail|required|min:3|max:30',
            'index_no' => 'bail|required|digits:5|unique:students',
            'password' => 'required',
            'grade_id' => 'bail|required|exists:grades,id',
        ];

    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'Student name is required',
            'name.min'   => 'Student name should be at least 3 characters',
            'name.max'   => 'Student name not be greater than 30 characters',
            'index_no.required'   => 'Index number is required',
            'index_no.digits:5'   => 'Index number should be number and 5 characters long',
            'index_no.unique'     => "Index number is already saved",
            'grade_id.required'       => 'Grade ID is required',
            'grade_id.exists'         => "Grade ID is invalid",
        ];
    }
}
