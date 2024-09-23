<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        try {
            $bookings = Booking::with('customer')->orderBy('id', 'desc')->get();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return view('admin.bookings.index', compact('bookings'));
    }

    
 

    public function delete($id)
    {
        try {
            Booking::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Booking deleted successfully');
    }


    public function status_change($id,$status)
    {
         
        $state = Booking::where('id', $id)->update([
            'status' => $status
        ]);
        return back()->with('success', 'Booking deleted successfully');
    }
       
}
