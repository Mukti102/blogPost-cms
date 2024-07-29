<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users', [
            'users' => User::paginate(5),
            'blogs' => Blogs::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        $credential['password'] = bcrypt($credential['password']);

        // create new user
        User::create($credential);

        // session
        Session::flash('success', 'Register Succes');

        // back to login
        return redirect('/dashboard/users');
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
    public function edit(User $user)
    {
        $user = User::find($user->id);
        return view('dashboard.editUser', [
            'user' => $user,
        ]);
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
        $credential = $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'username' => 'required|min:5|max:255',
            'email' => 'required',
        ]);

        if ($request->bio != null) {
            $credential['bio'] = $request->bio;
        }

        if ($request->file('photo_profile') !== null) {
            // check old image
            if ($request->old_profile) {
                Storage::delete($request->old_profile);
            }
            // save new image
            $credential['photo_profile'] = $request->file('photo_profile')->store('photo_profile_images');
        }
        // update new user
        User::where('id', $id)->update($credential);
        Session::flash('success', 'update success');
        // back to profile
        return redirect('/dashboard/' . $request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        if ($user->photo_profile) {
            Storage::delete($user->photo_profile);
        }
        Session::flash('success', 'delete is success');
        return redirect('/dashboard/users');
    }

    public function switchRole(User $user)
    {
        $user->role_id == 1 ? $user->role_id = 2 : $user->role_id = 1;

        // save user 
        $user->save();

        return redirect()->back();
    }
}
