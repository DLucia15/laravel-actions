<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cicle;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentList = Student::all();
        $studentList = Student::orderBy('id','asc')->paginate(10);
        $cicles = Cicle::all();
        if(isset($_REQUEST['action'])){
            return view('institut.index', ['studentList' => $studentList, 'action' => $_REQUEST['action'], 'cicles' => $cicles]);
        }else{
            return view('institut.index', ['studentList' => $studentList, 'cicles' => $cicles]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('institut.show' ,['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('institut.edit', ['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'address'=>'required'
            ]
        );

        $p = Student::findOrFail($id);
        $p->name = $request->name;
        $p->email = $request->email;
        $p->address = $request->address;
        $p->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p = Student::findOrFail($id)->delete();
        return redirect()->route('index');
    }
}
