<?php

namespace App\Http\Livewire\Admin\Student;

use App\Grade;
use App\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudent extends Component
{
    use withPagination;

    public $grade_id;
    public $search = '';

    public function mount($id)
    {
        $this->grade_id = $id;
    }

    public function render()
    {                    
        $students = Student::search($this->search)
                    ->whereGradeId($this->grade_id)
                    ->orderBy('index_no')
                    ->paginate(4);

        return view('livewire.admin.student.show-student', compact('students'));
  
    }

    public function destroy($index_no)
    {
        $student = Student::findOrFail($index_no);
        
        $student->results()->delete();
        $student->delete();
        
        session()->flash('success', 'Student deleted successfully');
        return redirect()->route('admin.students.show_student', $student->grade->id);
    }
}
