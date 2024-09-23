<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        try {
            $customers = User::orderBy('id', 'desc')->where('role', 'customer')->get();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }
 

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $class = Vendor::create($request->all());
            $class->subjects()->sync($request->subjects);

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return to_route('classes.index')->with('success', 'Class created successfully');
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
            $class->update($request->all());
            $class->subjects()->sync($request->subjects);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }


        return redirect()->route('classes.index')->with('success', 'Classes updated successfully');
    }

    public function delete($id)
    {
        try {
            Vendor::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return to_route('classes.index')->with('success', 'Classes deleted successfully');
    }
}
