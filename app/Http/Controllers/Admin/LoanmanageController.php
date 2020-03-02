<?php
namespace App\Http\Controllers\Admin;

use App\Book;
use App\Loan;
use App\Reservation;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\bookAvailable; // add 

//use App\Mail\bookAvailable;

class LoanmanageController extends Controller
{

    // Top screen
    public function index()
    {
        $loans = Loan::where('status', '<', 4)->get(); // without return and cancel
        $reservation = Reservation::where('status','1')->get(); // with current reservations

        return view('admin.loan.index', 
            ['loans' => $loans],
            ['reservations' => $reservation ],
            ['name' => '', 'title' => '', 'status' => '']
        );
    }
  
    // chage status
    public function changestat($loan_id, Request $request){

        // add loan
        $loans = Loan::find($loan_id);
        $dt = new Carbon($loans->duedate);
        $today = Carbon::now();
        $due = Carbon::now();

        switch($request->status){
            case "2": //borrow request
                $loans->status = $request->status;
                $loans->save();                
                break;
            case "3": //extention request
                $reserves = Reservation::where('book_id', $loans->book_id)
                ->where('status', 1)->first();                
                if (empty($reserves)){
                    $loans->status = $request->status;
                    $loans->duedate = $dt->addDay(7);
                    $loans->save();
                }else{
                    Session::flash('status', 'This book has reservated');
                }
                break;
            case "4": //return request
            case "5": //cancel request
                $reserves = Reservation::where('book_id', $loans->book_id)
                    ->where('status', 1)->first();
                if (empty($reserves)){
                    $loans->status = $request->status; // change status to returned
                    $loans->returndate = Carbon::now();
                    $loans->save();

                    // update book status
                    $book = Book::find($loans->book_id);
                    $book->increment('lendingstatus',1);

                }else{
                    $reserves->status = '0'; // change stat to no reservation
                    $reserves->save();

                    $loans->status = $request->status; // change status to returned
                    $loans->returndate = Carbon::now();
                    $loans->save();

                    // add loan
                    $createloan = new Loan;
                    $createloan->registerdate  = $today;
                    // $createloan->returndate   =  Null;
                    $createloan->duedate = $due->addDay(7);
                    $createloan->status = '1'; //borrow request
                    $createloan->user_id = $reserves->user_id;
                    $createloan->book_id = $reserves->book_id;
                    $createloan->save();

                    // update book status
                    $book = Book::find($loans->book_id);
                    $book->increment('lendingstatus',1);

                    // sending email notifying the user of the availability of the book
                    $user = User::find($reserves->user_id);	//add
                    Mail::to($user->email)->queue(new bookAvailable($user, $book));	//add                    
                }
                break;
            defaule:
                break;
        }
        return redirect(url('admin/loan/'));
    }

	// Cancel reservation
    public function reservecancel($reserve_id){

        // update reservation status
        $reserve = Reservation::find($reserve_id);
        $reserve->status = '0';
        $reserve->save();

        // update book status
        $book = Book::find($reserve->book_id);
        $book->increment('lendingstatus',1);
        
        return redirect(url('admin/loan/'));
    }
}
