<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class Upload extends Component
{
    use WithFileUploads;

    public $student_file;

    
    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'student_file' => 'bail|required|max:5120|mimes:xls,xlsx'
        ]);
    }

    public function upload()
    {
        $this->validate([
            'student_file' => 'bail|required|max:5120|mimes:xls,xlsx'
        ]);

        Excel::import(new StudentImport, $this->student_file->getRealPath());

        session()->flash('success', 'Student uploaded successfully');

        return redirect()->route('admin.students.upload');

    }

    public function render()
    {
        return view('livewire.admin.student.upload');
    }
}
