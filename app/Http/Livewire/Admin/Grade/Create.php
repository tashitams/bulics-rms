<?php

namespace App\Http\Livewire\Admin\Grade;

use Livewire\Component;
use App\Grade;
use App\Subject;

class Create extends Component
{
    public $class_name;
    public $subject_id;
    
    public function render()
    {
        $subjects = Subject::orderBy('subject_name')->pluck('subject_name', 'id');
        return view('livewire.admin.grade.create', compact('subjects'));
    }

    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'class_name' => 'bail|required|min:3|max:30|unique:grades,class_name',
            'subject_id'  =>  'bail|required|exists:subjects,id'
        ]);
    }

    
    public function store()
    {
        $validatedData = $this->validate([
            'class_name' => 'bail|required|min:3|max:30|unique:grades,class_name',
            'subject_id'  =>  'bail|required|exists:subjects,id'
        ]);

        $grade = Grade::create($validatedData);

        $grade->subjects()->attach($this->subject_id);

        session()->flash('success', 'Class added successfully');

        return redirect()->route('admin.grades.create');

    	$this->reset();
    }

}
