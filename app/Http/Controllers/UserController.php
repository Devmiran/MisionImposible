<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();

        return response()->json($users);
    }


    public function show($id){

        $user=User::find($id);

        return response()->json([
            'message' =>'listo',
            'user' => $user
        ]);
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|min:5|max:10',
            'email'=>'required',
            'password'=>'required'
        ];

        try {
            $request->validate($rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json($e->errors(), 422);
        }

        $user=User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);



        return response()->json($user);
    }

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
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json($e->errors(), 422);
        }

        $user=User::find($id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password

        ]);
         return response()->json($user);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $user=User::find($id);
     $user->delete();

     return response()->json('YAAAAAA');

    }
}
