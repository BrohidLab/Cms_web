<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $query = Consultation::with('product');

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

        $consultations = $query->latest()->paginate(10);

        return view('pages.admin.pages.consultation.index',compact('consultations'));
    }

    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        if (!$consultation->read_at) {
            $consultation->update([
                'read_at' => now() // atau Carbon::now()
            ]);
        }
        return view('pages.admin.pages.consultation.show', compact('consultation'));
    }
}
