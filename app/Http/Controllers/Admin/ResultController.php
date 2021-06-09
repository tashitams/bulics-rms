<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use App\Result;
use App\Http\Requests\ResultRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class ResultController extends Controller
{
    public function create($index_no)
    {
        $student = Student::with('grade')->findOrfail($index_no);
        return view('admin.result.create', compact('student'));
    }

    public function store(ResultRequest $request, $index_no)
    {
        $student = Student::findOrfail($index_no);

        for ($i=0; $i<count($request->subject_id); $i++) 
        {
            $result = new Result;   
            $result->index_number = $student->index_no;     
            $result->subject_id = $request->subject_id[$i];
            $result->marks = $request->marks[$i];
            $result->save();
        }

        return redirect()->route('admin.students.show_student', $student->grade->id)
            ->with('success', 'Student result saved successfully.');
    }

    public function edit($index_no)
    {
        $student = Student::findOrfail($index_no);
        $results = Result::with('subject')->whereIndexNumber($index_no)->get();
        return view('admin.result.edit', compact('student', 'results'));
    }

    public function update(ResultRequest $request, $index_no)
    {
        $student = Student::findOrfail($index_no);

        for ($i=0; $i<count($request->id); $i++) {

            Result::where('id', $request->id[$i])
            ->update([
                'subject_id' => $request->subject_id[$i],
                'marks'      => $request->marks[$i],
            ]);
        } 

        return redirect()->route('admin.students.show_student', $student->grade->id)
        ->with('success', 'Student marks updated successfully.'); 
    }

    public function destroy($index_no)
    {
        $student = Student::findOrfail($index_no);
        $student->results()->delete();

        return redirect()->route('admin.students.show_student', $student->grade->id)
            ->with('success', "Student result deleted successfully.");
    }
}
