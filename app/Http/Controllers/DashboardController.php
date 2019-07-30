<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Role;
use Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user_id=auth()->id();
        $user=User::find($user_id);
        return view('/dashboard')->with('posts',$user->posts);
    }

    public function logins(){
        if(Auth::user()->isAdmin()){
            $logins = \LoginActivity::getLoginLogs()->orderBy('id','desc')->paginate(7);
            return view('/logins')->with('logins',$logins);
        }
    }

    public function logouts(){
        if(Auth::user()->isAdmin()){
            $logouts = \LoginActivity::getLogoutLogs()->orderBy('id','desc')->paginate(7);
            return view('/logouts')->with('logouts',$logouts);
        }
    }

    public function allusers(){
        if(Auth::user()->isAdmin()){
            $allusers = User::orderBy('id','desc')->paginate(5);
            return view('/allusers')->with('allusers',$allusers);
        }
    }

    public function gallery(){
        return view('/gallery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alluser=User::find($id);
        $alluser->delete();
        return redirect('/allusers')->with('error','User Deleted!!!');
    }
}
