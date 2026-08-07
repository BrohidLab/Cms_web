<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingService;

class BookingServiceController extends Controller
{
    //
    public function index(Request $request)
    {
    	$query = BookingService::query();
    
    	if ($request->filled('search')) {
    
    		$search = $request->search;
    
    		$query->where(function ($q) use ($search) {
    
    			$q->where('name','like',"%$search%")
    				->orWhere('no_wa','like',"%$search%")
    				->orWhere('lokasi','like',"%$search%")
    				->orWhere('pesan','like',"%$search%")
    				->orWhereHas('product',function($p) use ($search){
    					$p->where('name','like',"%$search%");
    				});
   	       });
     	}
       	$bookings = $query->latest()->paginate(10);
    
       	return view('pages.admin.pages.booking.index',compact('bookings'));
    }
    
    public function show($id)
    {
        $booking = BookingService::findOrFail($id);
        if (!$booking->is_read) {
            $booking->update([
            'is_read' => true // atau Carbon::now()
        	]);
        }
        return view('pages.admin.pages.booking.show', compact('booking'));
    }
    
    public function store(Request $request)
    {
    	
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'no_wa'      => 'required|string|max:20',
            'address'    => 'nullable|string',
            'type_car'   => 'required|string|max:100',
            'complaint'  => 'required|string',
        ]);
    
        try {
            // 💾 Simpan data
            BookingService::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'no_wa'      => $request->no_wa,
                'address'    => $request->address ?? null,
                'type_car'   => $request->type_car,
                'complaint'  => $request->complaint,
            ]);
            
            return redirect()->back()->with('success', 'Booking service berhasil dikirim!');
            
        } catch (\Exception $e) {
        	
            return redirect()->back()->with('error', 'Terjadi kesalahan, coba lagi!');
        }
    }
}
