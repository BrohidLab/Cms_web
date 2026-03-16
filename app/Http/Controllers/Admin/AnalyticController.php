<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticController extends Controller
{
    public function index()
    {
        $totalVisitor = Analytic::count();

        $todayVisitor = Analytic::whereDate('created_at', today())->count();

        $weekVisitor = Analytic::where('created_at', '>=', now()->subDays(7))->count();

        $topPages = Analytic::select('page', DB::raw('count(*) as total'))
            ->groupBy('page')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $chartVisitor = Analytic::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('pages.admin.pages.analytic.index', compact(
            'totalVisitor',
            'todayVisitor',
            'weekVisitor',
            'topPages',
            'chartVisitor'
        ));
    }    
}
