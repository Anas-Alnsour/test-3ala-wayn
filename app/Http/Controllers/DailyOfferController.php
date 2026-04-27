<?php

namespace App\Http\Controllers;

use App\Models\DailyOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyOfferController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'original_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'valid_until' => 'required|string',
            'audience' => 'required|string',
        ]);

        $offer = DailyOffer::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'name_ar' => $request->name,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'valid_until' => $request->valid_until,
            'audience' => $request->audience,
            'is_active' => true,
        ]);

        return response()->json([
            'message' => 'Offer published successfully!', 
            'offer' => $offer
        ]);
    }

    public function toggle(DailyOffer $offer)
    {
        // Simple authorization check
        if ($offer->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $offer->is_active = !$offer->is_active;
        $offer->save();

        return response()->json([
            'message' => $offer->is_active ? 'Offer Activated' : 'Offer Paused', 
            'is_active' => $offer->is_active
        ]);
    }
}
