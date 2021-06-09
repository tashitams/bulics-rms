<?php

namespace App\Http\Livewire\Admin\Grade;

use Livewire\Component;
use App\Grade;
use App\Subject;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $grade;
    public $class_name;
    public $subject_id;
    

    public function mount(Grade $grade)
    {
        $this->grade = $grade;
        $this->class_name = $grade->class_name;
        $this->subject_id = $grade->subject_id;
        
    }

    public function render()
    {
        $subjects = Subject::orderBy('subject_name')->pluck('subject_name', 'id');
        return view('livewire.admin.grade.edit', compact('subjects'));
    }


    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'class_name' => 'bail|required|min:3|max:30|unique:grades,class_name,'. $this->grade->id,
            'subject_id'  =>  'bail|required|exists:subjects,id'
        ]);
    }


    public function update()
    {
       
        DB::beginTransaction();

        try {
            $validatedData = $this->validate([
                'class_name' => 'bail|required|min:3|max:30|unique:grades,class_name,'. $this->grade->id,
                'subject_id'  =>  'bail|required|exists:subjects,id'
            ]);

            $this->grade->update($validatedData);
            
            $this->grade->subjects()->sync($this->subject_id);

            DB::commit();
    
            session()->flash('success', 'Class updated successfully');
    
            return redirect()->route('admin.grades.index');
        }

        catch(QueryException $e) {
            DB::rollback();
            session()->flash('warning', 'Oops something went wrong');
            return redirect()->route('admin.grades.index');
        }
    }
}

 