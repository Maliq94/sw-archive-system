<?php

namespace App\Http\Controllers;

use App\Http\Requests\AudioTagRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Audio;
use App\Models\Scholar;
use App\Models\Fan;
use App\Models\Program;
use App\Models\Type;
use App\Models\AudioTag;
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
            $audio = Audio::with('scholar')->get();

            return view('view-audio', [
                'audio'=> $audio,
            ]);
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
            $scholarName = Scholar::find(request('scholar'))->name;
            $fn = Fan::find(request('fn'))->name;
            $fileName = $Scholarcode.'-'.$fn.'-'.time().$fileExt;

            $req->file('file')->storeAs('sw/'.$fn.'/'.$scholarName, $fileName, 'public');

            $audio = new Audio;
            $audio->scholar_id = request('scholar');
            $audio->fn_id = request('fn');
            $audio->type_id = request('type');
            $audio->desc = request('desc');
            $audio->program_id = request('program');
            $audio->episode = request('episode');
            $audio->file = 'sw/'.$fn.'/'.$scholarName.'/'.$fileName;
            $audio->save();

            return redirect('/view-audio');
        }

        public function getScholarCode($id)
        {
            $code = Scholar::where('id', $id)->first();
            return $code->code;
        }

        public function addAudioTagView($id)
        {
            $audio = Audio::where('id',$id)->with('scholar')->first();
            $tags = AudioTag::where('audio_id', $id)->get();
            return view('add-audio-tag',[
                'tags'=>$tags,
                'id'=>$id,
                'audio'=>$audio

            ]);


        }

        public function addAudioTag(AudioTagRequest $request)
        {
            AudioTag::create($request->validated());
            return redirect()->route('audiotag',[$request['audio_id']]);
        }


        public function tagDel($audioId,$id)
         {
        $audio = AudioTag::find($id);
        $audio->delete();
        return redirect()->route('audiotag',[$audioId]);
         }


    }
