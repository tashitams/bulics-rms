<?php

namespace App\Http\Livewire\Admin\Student;

use App\Grade;
use App\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $student;
    public $name; 
    public $index_no;
    public $password; 
    public $grade_id;

    public function mount(Student $student)
    {
        $this->student = $student;

        $this->name = $student->name;
        $this->index_no = $student->index_no;
        $this->grade_id = $student->grade_id;
        
    }

    public function render()
    {
        $grades = Grade::orderBy('class_name')->select('class_name', 'id')->get();
        return view('livewire.admin.student.edit', compact('grades'));
    }

    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name'          => 'bail|required|min:3|max:30',
            'index_no'      => 'bail|required|digits:5|unique:students,index_no,'. $this->student->index_no. ',index_no',
            'password'      => 'bail|required|min:6',
            'grade_id'      => 'bail|required|exists:grades,id',
        ]);
    }

    
    public function update()
    {
        $this->validate([
            'name'          => 'bail|required|min:3|max:30',
            'index_no'      => 'bail|required|digits:5|unique:students,index_no,'. $this->student->index_no. ',index_no',
            'password'      => 'bail|required|min:6',
            'grade_id'      => 'bail|required|exists:grades,id',
        ]);

        $this->student->update([
            'name' => $this->name,
            'index_no' => $this->index_no,
            'password' => Hash::make($this->password),
            'grade_id' => $this->grade_id,
        ]);

        session()->flash('success', 'Student updated successfully');

        return redirect()->route('admin.students.show_student', $this->student->grade->id);
    }
}
