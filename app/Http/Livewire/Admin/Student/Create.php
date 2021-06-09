<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Grade;
use App\Student;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $name; 
    public $index_no;
    public $password; 
    public $grade_id;

    public function render()
    {
        // $grades = Grade::pluck('class_name', 'id');
        $grades = Grade::orderBy('class_name')->select('class_name', 'id')->get();
        return view('livewire.admin.student.create', compact('grades'));
    }

    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name'          => 'bail|required|min:3|max:30',
            'index_no'      => 'bail|required|digits:5|unique:students',
            'password'      => 'bail|required',
            'grade_id'      => 'bail|required|exists:grades,id',
        ]);
    }

    
    public function store()
    {
        $this->validate([
            'name'          => 'bail|required|min:3|max:30',
            'index_no'      => 'bail|required|digits:5|unique:students',
            'password'      => 'bail|required',
            'grade_id'      => 'bail|required|exists:grades,id',
        ]);

        Student::create([
            'name' => $this->name,
            'index_no' => $this->index_no,
            'password' => Hash::make($this->password),
            'grade_id' => $this->grade_id,
        ]);

        session()->flash('success', 'Student added successfully');

        return redirect()->route('admin.students.create');

    	$this->reset();
    }
}
