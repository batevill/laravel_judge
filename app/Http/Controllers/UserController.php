<?php

namespace App\Http\Controllers;

use App\User;
use App\Positions;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(20);

        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'position_id' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
            'position_id' => $request->position_id
        ]);

        FacadesSession::flash('success', 'User created successfully');
        return redirect()->route('user.index');
    }

    public function edit(User $user) {
        return view('admin.user.edit', [
            'user' => $user,
            'positions' => Positions::all()
        ]);
    }
    

    public function update(Request $request, User $user){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
            'position_id' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('password') && $request->password !== null){
            $user->password = bcrypt($request->password);
        }
        // $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->position_id = $request->position_id;
        $user->save();

        FacadesSession::flash('success', 'User updated successfully');
        return redirect()->route('user.index');
    }

    public function destroy(User $user){
        if($user){
            $user->delete();
            FacadesSession::flash('success', 'User deleted successfully');
        }
        return redirect()->back();
    }

    public function profile(){
        $user = auth()->user();

        return view('admin.user.profile', compact('user'));
    }

    public function profile_update(Request $request){
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
            'image'=> 'sometimes|nullable|image|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        if($request->has('password') && $request->password !== null){
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/user/', $image_new_name);
            $user->image = '/storage/user/' . $image_new_name;
        }
        $user->save();

        FacadesSession::flash('success', 'User profile updated successfully');
        return redirect()->back();
    }
}
