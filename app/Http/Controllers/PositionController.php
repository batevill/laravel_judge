<?php

namespace App\Http\Controllers;

use App\User;
use App\Positions;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Positions::orderBy('id', 'asc')->paginate(20);

        return view('admin.position.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.position.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $position = Positions::create([
            'name' => $request->name
        ]);

        FacadesSession::flash('success', 'Position created successfully');
        return redirect()->route('position.index');
    }

    public function edit(Positions $position)
    {
        return view('admin.position.edit', [
            'position' => $position
        ]);
    }


    public function update(Request $request, Positions $position)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $position->name = $request->name;
        $position->save();

        FacadesSession::flash('success', 'Positions updated successfully');
        return redirect()->route('position.index');
    }

    public function destroy(Positions $position)
    {
        if ($position) {
            $position->delete();
            FacadesSession::flash('success', 'Position deleted successfully');
        }
        return redirect()->back();
    }
}
