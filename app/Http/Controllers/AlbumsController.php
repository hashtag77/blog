<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;
use App\User;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$user_id=auth()->id();
			$user=User::find($user_id);
			return view('albums.index')->with('albums',$user->albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$album = Album::create([
				'album_name'    =>  request('album_name'),
				'user_id'       =>  auth()->id()
			]);

			if( $album ) {
				foreach( request("image") as $image ) {
					$i           = new Image();
					$i->image    = $image;
					$i->album_id = $album->id;
					$album->images()->save($i);
				}
			}
			return redirect('/albums')->with('success','Album Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album=Album::find($id);
        return view('albums.show')->with('album',$album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$album =Album::find($id);
			if(auth()->user()->id == $album->user_id){
				return view('albums.edit')->with('album',$album);
			}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$album=Album::find($id);
			if($album){
				foreach(request("image") as $image){
					$i           = new Image();
					$i->image    = $image;
					$i->album_id = $album->id;
					$album->images()->save($i);
				}
			}
			return redirect('/albums')->with('success','Image(s) Added!');
		}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $album=Album::find($id);
        // $album->delete();
        // return redirect('/albums')->with('error','Album Deleted!!!');
    }
}
