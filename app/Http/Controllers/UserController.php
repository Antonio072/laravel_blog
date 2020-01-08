<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use DB;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for fetch all posts from the user
     *
     * @return \Illuminate\Http\Response
     */
    public function userPosts($id)
    {   
        $user = $this->getAuthenticatedUser();
        // echo $user->id;
        $userPosts = User::select('users.name','posts.*')
            ->join('posts' , 'posts.user_id', '=', 'users.id')
            ->where('users.id', '=', $user->id)
            ->get();
        return View::make('users.posts')->with('userPosts',$userPosts);
    }

    /**
     * Show the form for fetch all posts from the user
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {   
        $user = $this->getAuthenticatedUser();
        $userProfile = User::select('users.*',DB::raw('count(posts.id) as posts'))
            ->join('posts' , 'posts.user_id', '=', 'users.id')
            ->where('users.id', '=', $user->id)
            ->groupBy('users.id')
            ->get()->first();

        return View::make('users.profile')->with('userProfile',$userProfile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
