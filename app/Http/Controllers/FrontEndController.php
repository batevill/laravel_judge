<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use App\User;
use App\Post;
use App\Contact;
use App\Category;
use App\Positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class FrontEndController extends Controller
{
    public function home(){
        $users = User::orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['users']));
    }
   

    public function positionByName($name){
        $position = Positions::where('name', $name)->first();
        if($position){
            $users = User::where('position_id', $position->id)->paginate(9);

            return view('website.position', compact(['position', 'users']));
        }else {
            return redirect()->route('website');
        }
    }
}
