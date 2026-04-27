<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approve(Attraction $attraction)
    {
        $attraction->status = 'approved';
        $attraction->save();

        return response()->json([
            'message' => 'Attraction approved successfully!',
            'status' => 'approved'
        ]);
    }

    public function reject(Attraction $attraction)
    {
        $attraction->status = 'rejected';
        $attraction->save();

        return response()->json([
            'message' => 'Attraction rejected.',
            'status' => 'rejected'
        ]);
    }
}
