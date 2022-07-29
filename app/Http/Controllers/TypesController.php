<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    public function add(Request $req)
    {

        $req->validate([
            'type'=>'required'
        ]);

        $type = new Type;
        $type->type = request('type');
        $type->save();
        return redirect('/view-types');
    }

    public function del($id)
    {
        $type = Type::find($id);
        $type->delete();
        return redirect('/view-types');
    }

    public function view()
    {
        $type = Type::all();
        return view('view-types', [
            'types'=> $type,
        ]);
    }
}
