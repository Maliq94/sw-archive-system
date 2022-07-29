<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fan;

class FnController extends Controller
{
    public function add(Request $req)
    {
        $req->validate([
            'name'=>'required'
        ]);

        $fn = new Fan;
        $fn->name = request('name');
        $fn->save();
        return redirect('/view-fn');
    }

    public function del($id)
    {
        $fn = Fan::find($id);
        $fn->delete();
        return redirect('/view-fn');
    }

    public function view()
    {
        $fn = Fan::all();
        return view('view-fn', [
            'fn'=> $fn,
        ]);
    }
}
