<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\update;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users=User::all();
        
        if($request->has('search')){
            $users=User::where('username','like',"%{$request->search}%")->orWhere('email','like',"%{$request->search}%")->get();
        }
        return view('users.index',compact('users'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message','Utilisateur est enregistré avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user)
    {
        return view ('users.edit',compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $users->update (
            [
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ] );

         return redirect()->route('users.index')->with('message','Mise à jour réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (auth()->user()->id==$user->id){
            return redirect()->route('users.index')->with('message','Vous etes sur le point de supprimer cette donnée');
        }
     $user->delete();
     return redirect()->route('users.index')->with('message','Utilisateur Supprimée');
    }
}
