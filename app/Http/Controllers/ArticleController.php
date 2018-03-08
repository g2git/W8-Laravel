<?php

namespace App\Http\Controllers;

use App\Article;
use App\Machtiging;
use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $titles = Article::latest()->get();
      $items = Category::all();
      $posts = Post::all();

      return view('titles.index', compact('titles', 'items', 'posts'));
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
      'article_title' => 'required',
      'article_body' => 'required',
      'category_id' => 'required',
    ];
    $customMessages = [
      'article_title.required' => __('messages.article_title_required'),
      'article_body.required' => __('messages.article_body_required'),
      'category_id.required'  => __('messages.category_id_required'),
    ];
    $this->validate($request, $rules, $customMessages);

        //Check Trial period
        $id = Auth::id();
        //check if user has membership plan
        $membership = Machtiging::where('user_id', $id)->value('membership_plan');

        if(Article::where('user_id', $id)->count() == 5 && !$membership){
          //echo "<p>Please subscribe to continue posting articles</p>";
          return redirect('/subscribe');
        }

          else
          {
            //insert data in articles table
            $post = new Article;
            //Creata a new post using the request data
            $post->article_title = $request->article_title;
            $post->article = $request->article_body;
            $post->category_id = $request->category_id;
            $post->user_id = $id;
            //Save it to DB
            $post->save();


            //insert data in posts table
            $post_toPost = new Post;
            //Creata a new post using the request data
            $post_toPost->name = $request->article_title;
            $post_toPost->article_id = Article::where('user_id', $id)->latest()->value('id');
            //Save it to DB
            $post_toPost->save();

            //And redirect
            return redirect('/titles');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $show_article= Article::find($id);
      $comments = \App\Comment::where('article_id',$id)->get();
      $post = Post::where('article_id', $id)->first();
      return view('titles.show', compact('show_article','comments', 'post'));
    }

    //Store 2
    public function store2(Request $request)
    {
      $posts = Post::all();
      $items = Category::all();
      if ($request->has('filterAuthor'))
      {
      $titles = Article::where('user_id',request('filterbyAuthor'))->latest()->get();
      return view('titles.index', compact('titles', 'items', 'posts'));
      }else
        {
          $titles = Article::where('category_id',request('filterbyCategory'))->latest()->get();
          return view('titles.index', compact('titles', 'items', 'posts'));
        }
    }

    public function postPost(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $post = Post::find($request->id);


        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;

        $post->ratings()->save($rating);

        return redirect('/titles');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
