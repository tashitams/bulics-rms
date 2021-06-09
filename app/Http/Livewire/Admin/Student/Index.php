<?php

namespace App\Http\Livewire\Admin\Student;

use App\Grade;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;

    public $search = '';

    public function render()
    {
        $grades = Grade::search($this->search)
        ->withCount('students')
        ->orderBy('class_name', 'asc')
        ->paginate(4);

        return view('livewire.admin.student.index', compact('grades'));
    }
}
