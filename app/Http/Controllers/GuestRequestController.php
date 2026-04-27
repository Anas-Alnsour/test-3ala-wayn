<?php

namespace App\Http\Controllers;

use App\Models\GuestRequest;
use Illuminate\Http\Request;

class GuestRequestController extends Controller
{
    public function updateStatus(Request $request, GuestRequest $guestRequest)
    {
        $request->validate([
            'status' => 'required|in:Pending,In Progress,Resolved'
        ]);

        $guestRequest->status = $request->status;
        $guestRequest->save();

        return response()->json([
            'message' => 'Request status updated to ' . $request->status,
            'status' => $guestRequest->status
        ]);
    }
}
