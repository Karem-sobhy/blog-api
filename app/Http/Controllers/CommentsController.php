<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return $post->comments;
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
    public function store(Request $request ,Post $post)
    {
        $request->validate([
            'user_id' => 'required',
            'comment' => 'required',
        ]);
        $post->comments()->create([
            'user_id' => $request->user_id,
            'comment' => $request->comment,
        ]);
        return response()->json(['message' => 'Comment is saved'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post,Comments $comment)
    {
        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$post,Comments $comment)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post,Comments $comment)
    {
        $request->validate([
            'user_id' => 'required',
            'comment' => 'required',
        ]);
        $comment->update([
            'user_id' => $request->user_id,
            'comment' => $request->comment,
        ]);
        return response()->json(['message' => 'Comment is saved'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post,Comments $comment)
    {
        $comment->delete();
        return response()->json(['message' => 'Comment is Deleted'], 200);
    }
}
