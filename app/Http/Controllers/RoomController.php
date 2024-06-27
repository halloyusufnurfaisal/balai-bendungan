<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class RoomController extends Controller
{
    public function index(): View
    {
        $rooms = Room::get();

        return view('rooms', compact('rooms'));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'is_booking' => 'required',
        ]);

        Room::create([
            'name' => $request->name,
            'is_booking' => $request->is_booking,
        ]);

        return response()->json(['success' => 'Room created successfully.']);
    }

    public function delete(Request $request): JsonResponse
    {
        $rooms = Room::where('id', $request->id);
        $rooms->delete();
        return response()->json(['success' => 'Room Delete successfully.']);
    }

    public function update(Request $request): JsonResponse
    {
        $rooms = Room::find($request->id);
        $rooms->name = $request->name;
        $rooms->is_booking = $request->is_booking;
        $rooms->save();

        return response()->json(['success' => 'Room Update successfully.']);
    }
}
