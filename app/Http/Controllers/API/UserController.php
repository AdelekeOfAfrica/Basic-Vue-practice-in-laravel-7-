<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         $this->middleware('api');
     }
     
    public function index()
    {
        //

        return User::latest()->paginate(10);
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
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,',
            'bio'=>'required|string',
            'password'=>'sometimes|string|min:8'
        ]);

        return User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'userType'=>$request['type'],
            'bio'=>$request['bio'],
            'photo'=>$request['photo'],
            'password'=>Hash::make($request['password'])


        ]);
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

    public function profile(){
        return auth('api')->user();
    }

    public function updateprofile(Request $request){
        $user= auth('api')->user();
        
        if($request->photo){
        $pathtofile=$request->file('image')->store('images','public');

        return $pathtofile;
        }

        //return ["message"=>"success"];
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
        $user=User::findorFail($id);
        $user->update($request->all());
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
        $user=User::findOrFail($id);
        //delete user 

        $user->delete();

        return['message'=>'user has been deleted'];
        
    }
}
