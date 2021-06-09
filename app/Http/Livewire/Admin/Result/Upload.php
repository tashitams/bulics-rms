<?php

namespace App\Http\Livewire\Admin\Result;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\ResultImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;


class Upload extends Component
{
    use WithFileUploads;

    public $result_file;

    // Realtime validation
    public function updated($field)
    {
        $this->validateOnly($field, [
            'result_file' => 'bail|required|max:5120|mimes:xls,xlsx'
        ]);
    }

    public function upload()
    {
        $this->validate([
            'result_file' => 'bail|required|max:5120|mimes:xls,xlsx'
        ]);

        try {
            Excel::import(new ResultImport, $this->result_file->getRealPath());
            session()->flash('success', 'Result uploaded successfully');
            return redirect()->route('admin.results.upload');
        } 
        
        catch(QueryException $e) {
            session()->flash('warning', "Duplicate entry detected. Most probably you tried to assign same subject mark twice for the same student");
            return redirect()->route('admin.results.upload');
        }
    }

    public function render()
    {
        return view('livewire.admin.result.upload');
    }
}

