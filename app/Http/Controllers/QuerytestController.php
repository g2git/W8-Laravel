<?php

namespace App\Http\Controllers;

use App\Querytest;
use Illuminate\Http\Request;

class QuerytestController extends Controller
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
        //Form validation
        $rules = [
        'query' => 'required'
      ];
      $customMessages = [
        'query.required' => __('messages.query_required')
      ];
        $this->validate($request, $rules, $customMessages);

        $post = new Querytest;
      //Creata a new post using the request data

        $post->body = $request->input('query');


        try {
            //Save it to DB
            $outcome = $post->save();
            $result = __('messages.injection_unsuccesfull');
        } catch(\Illuminate\Database\QueryException $err){
          $result = $err->getMessage();
        }

        return view('querytest.index',compact('result'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Querytest  $querytest
     * @return \Illuminate\Http\Response
     */
    public function show(Querytest $querytest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Querytest  $querytest
     * @return \Illuminate\Http\Response
     */
    public function edit(Querytest $querytest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Querytest  $querytest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Querytest $querytest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Querytest  $querytest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Querytest $querytest)
    {
        //
    }
}
