<?php

namespace App\Http\Livewire\Admin\Grade;

use App\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use withPagination;

    public $search = '';

    public function render()
    {
        $grades = Grade::search($this->search)
                    ->with('subjects')
                    ->orderBy('id')
                    ->paginate(2);
                    
        return view('livewire.admin.grade.index', compact('grades'));
    }


    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);

        DB::beginTransaction();

        try {
            $grade->subjects()->detach();
            $grade->delete();        
            session()->flash('success', 'Class deleted successfully');
            return redirect()->route('admin.grades.index');

        } catch(QueryException $e) {
            DB::rollback();
            session()->flash('warning', "Sorry you can't delete this class becuase it has students in it.");
            return redirect()->route('admin.grades.index');
        }
        DB::commit();
    }
}
