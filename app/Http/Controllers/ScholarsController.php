<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholar;


class ScholarsController extends Controller
{
    public function add(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'code'=>'required',
        ]);

        $scholar = new Scholar;
        $scholar->name = request('name');
        $scholar->code = request('code');
        $scholar->save();

        return redirect('/view-scholars');
    }

    public function del($id)
    {
        $scholar = Scholar::find($id);
        $scholar->delete();

        return redirect('/view-scholars');
    }

    public function view()
    {
        $scholars = Scholar::all();

        return view('view-scholars', [
            'scholars'=> $scholars,
        ]);
    }
}
