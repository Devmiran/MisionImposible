<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{
    public function index(){
        $post=Post::all();

        return response()->json($post);
    }

    public function show($id){
        $post=Post::find($id);
        return response()->json($post);
    }

    public function store(Request $request){
        $rules=[
            'name'=>'required|min:5|max:10',
            'email'=>'required',
            'password'=>'required'
        ];
        try {
            $request->validate($rules);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json($e->errors(),422);
        }
        $posts=Post::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
              
            ]
            );
        return response()->json($posts);
    }
     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name'=>'required|min:5|max:10',
            'email'=>'required',
            'password'=>'required'
          
        ];
        try {
            $request->validate($rules);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json($e->errors(),420);
        }
        $posts=Post::find($id);

        $posts->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
            ]
            );
        return response()->json($posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        return response()->json('eliminado');
    }

}
