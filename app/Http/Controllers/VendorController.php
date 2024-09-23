<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        try {
            $vendors = Vendor::orderBy('id', 'desc')->get();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return view('admin.vendors.index', compact('vendors'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        try {
           Vendor::insert([
            'name'  => $request->name,
            'email'  => $request->email,
            'phone'  => $request->phone,
           ]);


        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return response()->json(['message' =>  'Vendor created successfully']);
    }

    public function update(Request $request)
    {
        try {
            $class = Vendor::find($request->id);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        $request->validate(['id' => 'required']);

        try {
            Vendor::insert([
                'name'  => $request->name,
                'email'  => $request->email,
                'phone'  => $request->phone,
               ]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }


        return response()->json(['message' =>  'Vendor updated successfully']);
    }

    public function delete($id)
    {
        try {
            Vendor::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Vendor deleted successfully');
     }
}
