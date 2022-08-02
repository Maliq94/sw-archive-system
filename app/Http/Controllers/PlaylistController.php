<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Audio;
use DB;

class PlaylistController extends Controller
{
    public function add(Request $req)
    {
        $req->validate([
            'name'=>'required'
        ]);

        $playlist = new Playlist;
        $playlist->name = request('name');
        $playlist->save();
        return redirect('/view-playlists');
    }

    public function del($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();
        return redirect('/view-playlists');
    }

    public function view()
    {
        $playlists = Playlist::all();
        return view('view-playlists', [
            'playlists'=> $playlists,
        ]);
    }

    public function viewSinglePlaylist($id)
    {
        $playlist_id = $id;

        $find_p = DB::table('playlists_content')->where('playlist_id', $id)->get()
        ->map(function($i){
            $audio_id = $i->audio_id;
            $audio = Audio::find($audio_id);
            return $audio;
        });

        return view('view-playlist-s', [
            'playlist'=> $find_p,
            'playlist_id' => $playlist_id
        ]);
    }

    public function viewSinglePlaylist_API($id)
    {
        $find_p = $users = DB::table('playlists_content')->where('playlist_id', $id)->get()
        ->map(function($i){
            $audio_id = $i->audio_id;
            $audio = Audio::find($audio_id);
            return $audio;
        });

        return $find_p;
    }

    public function selectPlaylist($pl, Request $request)
    {
        
        $ssn = $request->session()->put('selectedPlaylist', $pl);

        if ($request->session()->has('selectedPlaylist')) {
            return redirect()->action([MainController::class, 'main_view']);
        }


    }

    public function removeSelectedPl(Request $request)
    {
        $value = $request->session()->pull('selectedPlaylist', 'default');
        return redirect()->action([MainController::class, 'main_view']);

    }

    public function addAudioToPlaylist($id, Request $request)
    {
        if ($request->session()->has('selectedPlaylist')) {

            $playlistId = $request->session()->get('selectedPlaylist');
            DB::insert('insert into playlists_content (audio_id, playlist_id) values (?, ?)', [$id, $playlistId]);
            return redirect()->action([MainController::class, 'main_view']);

        }
    }

    public function addAudioToPlaylist_API($audio_id, $pl_id)
    {
            DB::insert('insert into playlists_content (audio_id, playlist_id) values (?, ?)', [$audio_id, $pl_id]);
            return 'ok';
    }
}
