<?php

namespace App\Http\Livewire\Admin\Subject;

use Livewire\Component;
use App\Subject;

class Edit extends Component
{
    public $subject;
    public $subject_name;

    public function mount(Subject $subject)
    {
        $this->subject = $subject;
        $this->subject_name = $subject->subject_name;
    }

    public function render()
    {
        return view('livewire.admin.subject.edit');
    }

    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'subject_name' => 'bail|required|min:3|max:30|unique:subjects,subject_name,'. $this->subject->id,
        ]);
    }

    public function update()
    {
        $this->validate([
            'subject_name' => 'bail|required|min:3|max:30|unique:subjects,subject_name,'. $this->subject->id,
        ]);

        $this->subject->update([
            'subject_name' => $this->subject_name
        ]);

        session()->flash('success', 'Subject updated successfully');

        return redirect()->route('admin.subjects.index');
    }
}
