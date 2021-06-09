<?php

namespace App\Http\Livewire\Admin\Subject;

use Livewire\Component;
use App\Subject;

class Create extends Component
{
    public $subject_name = '';
    
    public function render()
    {
        return view('livewire.admin.subject.create');
    }

    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'subject_name' => 'bail|required|min:3|max:30|unique:subjects,subject_name',
        ]);
    }

    
    public function store()
    {
        $validatedData = $this->validate([
            'subject_name' => 'bail|required|min:3|max:30|unique:subjects,subject_name',
        ]);

        Subject::create($validatedData);

        session()->flash('success', 'Subject added successfully');

        return redirect()->route('admin.subjects.create');

    	$this->reset();
    }
}
