<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
      //Form validation
      $rules = [
      'comment' => 'required|max:254',
    ];
    $customMessages = [
      'comment.required' => __('messages.section_required'),
    ];
    $this->validate($request, $rules, $customMessages);
      //var_dump of data from create post form
        $post = new Comment;

      //Creata a new post using the request data
      $id = Auth::id();

      if($request->has('anonymous')){  //user_id is null for anonymous
     }
     else{
       $post->user_id = $id;   //has to be user_id for current_user
      }

        $post->comment = $request->comment;
        $post->article_id = $request->article_id;

        //Save it to DB
        $post->save();

        //And redirect to same page with new comment
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
