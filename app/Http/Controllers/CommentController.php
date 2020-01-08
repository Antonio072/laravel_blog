<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\View;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $Comments = Comment::all();
        return $this->sendSuccessResponse($Comments,"Comments fetched successfully");
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
            'content' => 'required|min:5|max:200',
            'user_id' => 'required|min:0',
            'Comment_id' => 'required|min:0',
        ]);

        if($validator->fails())
        {   
            return $this->sendErrorResponse('Error al registrar, no se cumplieron los requerimientos para el comentario, Comments.');
        }
        
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->Comment_id = $request->Comment_id;

        $comment->save();

        return $this->sendSuccessResponse($comment, "Comment created successfully on Comment " . $comment->Comment_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            
            $comment = Comment::select('comments.*','posts.title','users.name')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('comments.id','=',$id)
            ->first();  
            return $this->sendSuccessResponse($comment, "Comment fetched successfuly");
        } catch (\Throwable $th) {
            
            return $this->sendErrorResponse("Comment not found");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $comment = Comment::select('comments.*','posts.title','users.name')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('comments.id','=',$id)
            ->first();  

            // dd($comment);
            return View::make('comments.edit')->with('comment', $comment);
        }
        catch(\Exception $e){
            return $e;
            return $this->sendErrorResponse('Comment not found');
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

            $Comment = Comment::findOrFail($id);
            if($request->has('content')) $Comment->content= $request->content;
            $Comment->save();
            
            return $this->sendSuccessResponse($Comment, 'Comment updated updated');
        }
        catch(\Exception $e){
            return $this->sendErrorResponse('Comment not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return $this->sendSuccessResponse(['id' =>$comment->id], "Comment deleted successfuly");
        } catch (\Throwable $th) {
            
            return $this->sendErrorResponse("Comment not found");
        }
    }
}
