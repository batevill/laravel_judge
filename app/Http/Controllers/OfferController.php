<?php

namespace App\Http\Controllers;

use App\User;
use App\Positions;
use App\Offers;
use App\OfferChild;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offers::orderBy('id', 'asc')->paginate(20);

        return view('admin.offer.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offer.create', [
            'positions' => Positions::all(),
            'users' => User::select('id', 'name')->get()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'position_id' => 'required|numeric',
            'position_gonarar' => 'required|numeric|max:100',
            'userIds' => 'required'
        ]);
        $userIds = $request->userIds;
        $offer = Offers::create([
            'position_id' => $request->position_id,
            'position_gonarar' => $request->position_gonarar
        ]);

        foreach ($userIds as $userId) {
            OfferChild::create([
                'user_id' => $userId,
                'parent_id' => $offer->id
            ]);
        }

        FacadesSession::flash('success', 'Offer created successfully');
        return redirect()->route('offer.index');
    }


    public function edit(Offers $offer)
    {
        $users = User::select('id', 'name')->get();
        $selectedUserIds = OfferChild::where('parent_id', $offer->id)->pluck('user_id')->toArray();

        return view('admin.offer.edit', [
            'offer' => $offer,
            'positions' => Positions::all(),
            'users' => $users,
            'selectedUserIds' => $selectedUserIds
        ]);
    }


    public function update(Request $request, Offers $offer)
    {
        // dd($request->all());
        $this->validate($request, [
            'position_id' => 'required|numeric',
            'position_gonarar' => 'required|numeric|max:100',
            'userIds' => 'required'
        ]);

        $offer->position_id = $request->position_id;
        $offer->position_gonarar = $request->position_gonarar;
        $offer->save();
        OfferChild::where('parent_id', $offer->id)->delete();
        $userIds = $request->userIds;
        foreach ($userIds as $userId) {
            OfferChild::create([
                'user_id' => $userId,
                'parent_id' => $offer->id
            ]);
        }

        FacadesSession::flash('success', 'Offers updated successfully');
        return redirect()->route('offer.index');
    }

    public function destroy(Offers $offer)
    {
        if ($offer) {
            $offer->delete();
            OfferChild::where('parent_id', $offer->id)->delete();
            FacadesSession::flash('success', 'Offer deleted successfully');
        }
        return redirect()->back();
    }
}
