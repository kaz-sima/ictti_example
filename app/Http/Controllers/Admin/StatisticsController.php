<?php
namespace App\Http\Controllers\Admin;

use App\Book;
use App\Loan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// add
class StatisticsController extends Controller
{
    public function index()
    {
        return view('admin.statistics.index');
    }    
    
    // display the monthly number of lending books
    public function barchart()
    {        
        $counts = Loan::select(DB::raw("count(id) as count"))
        ->orderBy("registerdate")
        ->groupBy(DB::raw("Month(registerdate)"))
        ->get()->toArray();
        
        $counts = array_column($counts, 'count');
        return view('admin.statistics.barchart')->with('counts', json_encode($counts,JSON_NUMERIC_CHECK));
    }
    
    // display the category ratio of books
    public function doughnutchart()
    {
        $counts = Book::select(DB::raw("count(id) as count"))
        ->groupBy('ctgry_id')
        ->get()->toArray();
        
        $counts = array_column($counts, 'count');
        return view('admin.statistics.doughnut')->with('counts', json_encode($counts,JSON_NUMERIC_CHECK));
    }
}
