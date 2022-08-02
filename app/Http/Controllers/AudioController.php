<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;
use App\Models\Scholar;
use App\Models\Fan;
use App\Models\Program;
use App\Models\Type;
use DB;

class AudioController extends Controller
{

        public function index()
        {
            return view('index');
        }
        public function addView()
        {
            $all_scholars = Scholar::all();
            $all_fn = Fan::all();
            $all_programs = Program::all();
            $all_types = Type::all();

            return view('add-audio', [
                'scholars'=>$all_scholars,
                'fn'=>$all_fn,
                'programs'=>$all_programs,
                'types'=>$all_types,
            ]);
        }

       

        public function view()
        {
            $audio = Audio::all()
            ->map(function($i){
                $scho = $i->scholar;
                $fn = $i->fn;
                $type = $i->type;
                $prog = $i->program;
                $i->scholar = Scholar::where('id', $scho)->first();
                $i->fn = Fan::where('id', $fn)->first();
                $i->type = Type::where('id', $type)->first();
                $i->program = Program::where('id', $prog)->first();
                return $i;
            });

            return view('view-audio', [
                'audio'=> $audio,
            ]);

            // return $audio;


        }

        public function getAudioByDesc_API($desc)
        {
            $audio = DB::table('audio')->where('desc','like', '%'.$desc.'%')
            ->get();
            // ->map(function($i){
            //     $scho = $i->scholar;
            //     $fn = $i->fn;
            //     $type = $i->type;
            //     $prog = $i->program;
            //     $i->scholar = Scholar::where('id', $scho)->first();
            //     $i->fn = Fan::where('id', $fn)->first();
            //     $i->type = Type::where('id', $type)->first();
            //     $i->program = Program::where('id', $prog)->first();
            //     return $i;
            // });
         
            return $audio;
        }

        public function add(Request $req)
        {
            $req->validate([
                'desc'=>'required',
                'scholar'=>'required',
                'fn'=>'required',
                'type'=>'required',
                'program'=>'required',
                'episode'=>'required',
            ]);

            //file name
            $fileExt = '.'.$req->file('file')->extension();
            $Scholarcode = $this->getScholarCode(request('scholar'));
            $fn = request('fn');
            $fileName = $Scholarcode.'-'.$fn.'-'.time().$fileExt;

            $req->file('file')->storeAs('public/sw',$fileName);

            $audio = new Audio;
            $audio->scholar = request('scholar');
            $audio->fn = request('fn');
            $audio->type = request('type');
            $audio->desc = request('desc');
            $audio->program = request('program');
            $audio->episode = request('episode');
            $audio->file = $fileName;
            $audio->save();

            return redirect('/view-audio');
        }

        public function getScholarCode($id)
        {
            $code = Scholar::where('id', $id)->first();
            return $code->code;
        }

       
    }
