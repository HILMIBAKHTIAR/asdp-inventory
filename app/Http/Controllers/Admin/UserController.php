<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Foundation\Auth\User as AuthUser;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware(['Role:admin']);
    // }

    public function index()
    {
        //
        $allUser=User::all();
        return view('admin.user.index', compact('allUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allRoles=Role::all();

        return view('admin.user.create', compact('allRoles'));
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
            'name'=> 'required',
            'email'=>'required|email|unique:users,email',
            'password_user'=>'required|same:konfirmasipassword_user',
            'role_user'=>'required'
        ]);

        $user=New User();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password_user);
        $user->save();
        
        $user->assignRole($request->role_user);
        return redirect()->route('users.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $allRoles = Role::all();
        $userRole=$user->roles->pluck('id')->all();

        return view('admin.user.edit', compact('user', 'allRoles', 'userRole'));
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
        $this->validate($request,[
            'name'=> 'required',
            'email'=>'required|email',
            // 'txtpassword_user'=>'required|same:txtkonfirmasiPassword_user',
            'role_user'=>'required'
        ]);

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->password_user !=null){
            $user->password=Hash::make($request->password_user);
        }
        $user->update();

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->role_user);
        return redirect()->route('users.index')->with('sukses, User Berhasil di update');
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
        $user = User::find($id);
        $user ->delete();
        
        return redirect()->route('users.index')->with('sukses, User Berhasil di hapus');
    }
}
