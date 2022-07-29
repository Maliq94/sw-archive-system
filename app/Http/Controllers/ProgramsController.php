<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;


class ProgramsController extends Controller
{
    public function add(Request $req)
    {
        $req->validate([
            'name'=>'required'
        ]);

        $program = new Program;
        $program->name = request('name');
        $program->save();
        return redirect('/view-programs');
    }

    public function del($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect('/view-programs');
    }

    public function view()
    {
        $programs = Program::all();
        return view('view-programs', [
            'programs'=> $programs,
        ]);
    }
}
