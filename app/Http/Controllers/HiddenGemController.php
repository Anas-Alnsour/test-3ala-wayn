<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HiddenGemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'region' => 'required|exists:cities,id',
        ]);

        $gem = Attraction::create([
            'name' => $request->name,
            'name_ar' => $request->name,
            'description' => $request->description,
            'city_id' => $request->region,
            'type' => 'hidden_gem',
            'status' => 'pending',
            'submitter_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Gem submitted successfully!', 
            'status' => 'success',
            'gem' => $gem
        ]);
    }
}
