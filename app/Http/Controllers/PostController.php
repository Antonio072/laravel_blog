<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\View;

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
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:5|max:200',
            'content' => 'required|min:5|max:200',
            'user_id' => 'required|min:0',
        ]);

        if($validator->fails())
        {   
            return $this->sendErrorResponse('Error al registrar, no se cumplieron los requerimientos en los campos, Posts.');
        }
        
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
        try{
            $post = Post::findOrFail($id);
            return View::make('posts.show')->with('post',$post);
            // return $this->sendSuccessResponse($post, 'Post succe ssfully fetched');
        }
        catch(\Exception $e){
            return $this->sendErrorResponse('Post not found');
        }
    }
    
    public function edit($id)
    {  
        try{
            $post = Post::findOrFail($id);

            return View::make('posts.edit')->with('post', $post);
        }
        catch(\Exception $e){
            return $this->sendErrorResponse('Post not found');
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
        try{

            $post = Post::findOrFail($id);
            if($request->has('title')) $post->title= $request->title;
            if($request->has('content')) $post->content= $request->content;
            $post->save();
            
            return $this->sendSuccessResponse($post, 'Post successfully updated');
        }
        catch(\Exception $e){
            return $this->sendErrorResponse('Post not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   try {
        $post = Post::FindOrFail($id);
        $post->delete();
        return View::make('posts.delete');
        // return $this->sendSuccessResponse(['id' => $post->id], 'Post succesfully deleted');
    } catch (\Throwable $th) {
        return $this->sendErrorResponse('Post not found');
    }
      
    }
}
