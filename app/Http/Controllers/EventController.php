<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
class EventController extends Controller
{
    public function index(Request $request)
    {
        try {
            $events = Event::orderBy('id', 'desc')->paginate(10);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return view('admin.events.index', compact('events'));
    }
 

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . '.' . $image->getClientOriginalName();
            $image = $request->image->move(public_path() . '/uploads/events', $filename);
            $image = $filename;
        } else {
            $image = null;
        }

        try {
            Event::insert([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $image,
            ]);
        } catch (Exception $e) {
            return back()->with('error', value: $e->getMessage());
        }

        return response()->json(['message' =>  'Event updated successfully']);
    }

    public function update(Request $request)
    {
        try {

            $event = Event::find($request->id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = date('Y-m-d') . '.' . $image->getClientOriginalName();
                $image = $request->image->move(public_path() . '/uploads/events', $filename);
                $image = $filename;
            } else {
                $image = $event->image;
            }
            Event::where('id', $request->id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $image,
            ]);
           
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return response()->json(['message' =>  'Event updated successfully']);
    }

    public function delete($id)
    {
        try {
            Event::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return to_route('events.index')->with('success', 'Room deleted successfully');
    }
}
