<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Exception;
use App\Models\Event;
use App\Models\Vendor;
use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('site.index');
    }

    public function events(){
        $events = Event::get();
        return view('site.events', compact('events'));
    }

    public function event_detail($id){
        $event = Event::find($id);
        $vendors = Vendor::get();
        return view('site.event_detail', compact('event','vendors'));
    }

    public function get_services($vendorId){
        
        $services = Service::where('vendor_id', $vendorId)->get();
       
        return response()->json($services);
    }

    public function save_booking(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required',
            'contact_no' => 'required',
            'perform_on' => 'required|date',
            'payment_method' => 'required',
            'amount' => 'required',
            'customer_id' => 'required',
            'payment_receipt' => 'required_if:payment_method,online_transfer|file|mimes:jpg,png,pdf', 
        ]);
    
        $paymentReceiptPath = null;
        if ($request->payment_method == 'online_transfer') {

            if ($request->hasFile('payment_receipt')) {
                $payment_receipt = $request->file('payment_receipt');
                $filename = date('Y-m-d') . '.' . $payment_receipt->getClientOriginalName();
                $image = $request->payment_receipt->move(public_path() . '/uploads/payment_receipt', $filename);
                $paymentReceiptPath = $filename;
            } else {
                $paymentReceiptPath = null;
            }
        }

       
    
        // Try saving the booking to the database
        try {
            Booking::insert([
                'customer_id' => $request->customer_id,
                'vendor_id' => $request->vendor_id,
                'amount' => $request->amount,
                'contact_no' => $request->contact_no,
                'perform_on' => $request->perform_on,
                'payment_method' => $request->payment_method,
                'address' => $request->address,
                'bank' => $request->bank ?? null,
                'payment_proof' => $paymentReceiptPath,
            ]);
    
            return response()->json(['message' => 'Your event was booked successfully!']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
      
    }

    public function success_booking(){

        return view('site.success_booking');
    }

}
