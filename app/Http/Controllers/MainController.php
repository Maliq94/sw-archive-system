<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;
use App\Models\Scholar;
use App\Models\Fan;
use App\Models\Program;
use App\Models\Type;
use App\Models\Playlist;


class MainController extends Controller
{

    public function main_view(Request $request)
    {
        $audio = Audio::with('scholar')->get();

        $scholars = Scholar::offset(0)->limit(4)->get();
        $programs = Program::offset(0)->limit(4)->get();
        $types = Type::offset(0)->limit(4)->get();
        $fn = Fan::offset(0)->limit(4)->get();
        $playlists = Playlist::offset(0)->limit(4)->get();

        //counting
        $audio_count = Audio::all()->count();
        $scholars_count = Scholar::all()->count();
        $programs_count = Program::all()->count();
        $fn_count = Fan::all()->count();
        //------

        //get playlist info
        if($request->session()->has('selectedPlaylist')){
            $id = $request->session()->get('selectedPlaylist');
            $playlist_info = Playlist::where('id', $id)->first();

            return view('index', [
                'audio'=> $audio,
                'scholar'=>$scholars,
                'programs'=>$programs,
                'types'=>$types,
                'fn'=>$fn,
                'playlists'=>$playlists,
                'scholars_count'=>$scholars_count,
                'audio_count'=>$audio_count,
                'programs_count'=>$programs_count,
                'fn_count'=>$fn_count,
                'playlist_info'=>$playlist_info,
            ]);

        }else{
            return view('index', [
                'audio'=> $audio,
                'scholar'=>$scholars,
                'programs'=>$programs,
                'types'=>$types,
                'fn'=>$fn,
                'playlists'=>$playlists,
                'scholars_count'=>$scholars_count,
                'audio_count'=>$audio_count,
                'programs_count'=>$programs_count,
                'fn_count'=>$fn_count,
            ]);
        }







        // return $scholars_count;
    }

}
