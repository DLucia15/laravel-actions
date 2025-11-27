<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CicleController extends Controller
{
    public function show($id)
    {
    $cicle = Cicle::findOrFail($id);
    return view('institut.cicles.show')->with('cicle', $cicle);
    }

    public function create(Request $request)
    {
        return view('institut.cicles.create');
    }

    public function store(Request $request)
    {
        $p = new Cicle();
        $p->name = $request->name;
        $p->code = $request->code;
        $p->desc = $request->desc;
        $p->courses = $request->courses;
        $p->image = $request->image;
        $p->save();
        return redirect()->route('index');
    }

    public function edit(string $id)
    {
        $cicle = Cicle::findOrFail($id);
        return view('institut.cicles.edit', ['cicle'=>$cicle]);
    }

    public function update(Request $request, string $id)
    {
        $p = Cicle::findOrFail($id);
        $p->code = $request->code;
        $p->name = $request->name;
        $p->desc = $request->desc;
        $p->courses = $request->courses;
        $p->image = $request->image;
        $p->save();
        return redirect()->route('index');
    }

    public function matricular($id)
    {
    $student = Auth::user()->student;
    $curs = Cicle::findOrFail($id);
    $student->cicle_id = $curs->id;
    $student->save();

    return redirect()->route('index');
    }

    public function destroy($id)
    {
    $curs = Cicle::findOrFail($id);
    $curs->delete();

    return redirect()->route('index');
    }
}
