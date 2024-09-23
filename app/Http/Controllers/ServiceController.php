<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        try {
            $services = Service::get();
            $vendors = Vendor::get();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return view('admin.services.index', compact('services','vendors'));
    }

   
 

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

         

        try {
            Service::insert([
                'name' => $request->name,
                'vendor_id' => $request->vendor_id,
            ]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return response()->json(['message' =>  'Service added successfully']);
      
    }

    public function update(Request $request)
    {
        try {
            Service::where('id', $request->id)->update([
                'name' => $request->name,
                'vendor_id' => $request->vendor_id,
            ]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
 
 
        return response()->json(['message' =>  'Service updated successfully']);
    }

    public function delete($id)
    {
        try {
            Service::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return to_route('services.index')->with('success', 'TimeSlot deleted successfully');
    }
}
