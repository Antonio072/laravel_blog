<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return $this->sendSuccessResponse(Post::all(), 'Post successfully fetched');     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = \App\User::count();
        $post = new Post;
        $post->title= $request->title;
        $post->content= $request->content;
        $post->user_id= $request->user_id;

        $post->save();

        return $this->sendSuccessResponse($post, 'Post created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
       return $this->sendSuccessResponse($post, 'Post successfully fetched');
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
        print_r($request->title);
        $post = Post::findOrFail($id);
        // print_r($post);
        if($request->has('title')) $post->title= $request->title;
        if($request->has('content')) $post->content= $request->content;
        $post->save();
        
        return $this->sendSuccessResponse($post, 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::FindOrFail($id);
        $post->delete();
        return $this->sendSuccessResponse(['id' => $post->id,], 'Post succesfully deleted');
    }
}
