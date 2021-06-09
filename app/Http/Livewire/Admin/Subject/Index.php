<?php

namespace App\Http\Livewire\Admin\Subject;

use App\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\QueryException;

class Index extends Component
{
    use withPagination;

    public $search = '';


    public function render()
    {
        $subjects = Subject::search($this->search)
                    ->orderBy('id')
                    ->paginate(4);
        return view('livewire.admin.subject.index', compact('subjects'));
    }


    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);

        try {
            $subject->delete();        
            session()->flash('success', 'Subject deleted successfully');
            return redirect()->route('admin.subjects.index');
        } 
        
        catch(QueryException $e) {
            session()->flash('warning', "Sorry you can't delete this subject becuase it's been assigned to classes.");
            return redirect()->route('admin.subjects.index');
        }
    }
    
}

        