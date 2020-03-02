<?php
namespace App\Http\Controllers;

use App\Ctgry;
use App\Loan;
use App\Book;
use App\Reservation;
use App\Subctgry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookborrowingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user')->except('logout');
    }
    // show detail of a book
    public function detail(Book $books)
    {
        return view('book.bookdetail')->with(compact('books'));
    }
    // search books
    public function index(Request $request)
    {
        $request->flash();
        $title = $request->input('title');
        $ctgry = $request->input('ctgry');
        $subctgry = $request->input('subctgry');
        
        $query = Book::orderBy('book_title', 'asc');
        
        if (!empty($title)){
            $query->where('book_title', 'LIKE', "%$title%");
        }
        if (!empty($ctgry)){
            $query->Where('ctgry_id', $ctgry);
        }
        if (!empty($subctgry)){
            $query->Where('subctgry_id', $subctgry);
        }
        $books=$query->paginate(6);
        
        $ctgries = Ctgry::orderBy('code','asc')->pluck('name', 'code');
        $ctgries = $ctgries -> prepend('ctgry', '');
        $subctgries = Subctgry::get_subctgry();
        return view('book.index')->with(compact('books','ctgries','subctgries'));
    }
    // borrow books
    public function borrow($book_id) {
        
        $date = Carbon::now();
        $duedate = Carbon::now();
        $user = Auth::user();
        
        $exist = Loan::userHistory($user->id)->orderBy('created_at','desc')->first();
        
        if (!empty($exist)){ // prevent accessing error
            if($exist->status < 4 && $book_id == $exist->book_id){ // overlapping check
                Session::flash('samebookborrow', 'You are borrowing the same book');
                return redirect('/book');
            }
        }
        
        if (empty($exist) || $exist->status > 3){ // user does not borrow a book
            // add loan
            $loans = new Loan;
            $loans->registerdate  = $date;
            // $loans->returndate   =  Null;
            $loans->duedate = $duedate->addDay(7);
            $loans->status = '1';
            $loans->user_id = $user->id;
            $loans->book_id = $book_id;
            $loans->save();
            
            // update book status
            $book = Book::find($book_id);
            $book->decrement('lendingstatus',1);
            Session::flash('successborrow', 'You have successfully registered to orrow the book');
            return redirect('/book');
        }
        return view('book.returnreq');
    }
    
    //reseve books
    public function reservation($book_id)
    {
        $date = Carbon::now();
        $user = Auth::user();
        
        $loan1 = Loan::where('book_id', $book_id)->first(); // currently borrowed
        $loan2 = Loan::userHistory($user->id)->orderBy('created_at','desc')->first();
        $exist = Reservation::userHistory($user->id)->orderBy('created_at','desc')->first();
        
        if (!empty($loan2)){ // prevent accessing error
            if($loan2->status < 4 && $book_id == $loan2->book_id){ // overlapping check
                Session::flash('samebookreserve', 'You are reserving the book that you have currently borrowed');
                return redirect('/book');
            }
        }
        
        if (empty($exist) || $exist->status == 0){ // the user does not reserve a book
            // add reservation
            $reservations = new Reservation;
            $reservations->registerdate  = $date;
            $reservations->status   =  '1';
            $reservations->user_id = $user->id;
            $reservations->book_id = $book_id;
            $reservations->availabledate = $loan1->duedate;
            $reservations->save();
            
            // update book status
            $book = Book::find($book_id);
            $book->decrement('lendingstatus',1);
            Session::flash('successreserve', 'You have successfully reserved the book');
            return redirect('/book');
        }
        return view('book.releasereserv');
    }
}

