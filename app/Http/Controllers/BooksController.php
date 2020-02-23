<?php
namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // add

class BooksController extends Controller
{
    //display book list
    public function index()
    {
        // fetch book data from DB and hand over the data to book list screen
        $books = Book::orderBy('created_at', 'desc')->paginate(3); // add pagination
        return view('books', [
            'books' => $books
        ]);
    }
    //Add books
    public function add()
    {
        return view('booksadd');
    }
    
    //register processing
    public function register(Request $request)
    {
        //validation with custom validator
        $validator = Validator::make($request->all(), [
            'book_title' => 'required|min:4|max:255',
            'Author' => 'required|min:4|max:100',
            'publisher' => 'required|min:4',
            'published' => 'required',
        ]);
        //validation error processing
        if ($validator->fails()) {
            return redirect('/booksadd')
            ->withInput()
            ->withErrors($validator);
        }
        /* // validation with validate method
         $request->validate([
         'book_title' => 'required|min:4|max:255',
         'Author' => 'required|min:4|max:100',
         'publisher' => 'required|min:4',
         'published' => 'required',
         ]);
         */
        // book register processing
        $book = new Book;
        $form=$request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        // keep the success message in the session as flash data
        $request->session()->flash('status', 'Task was successful!');
        return redirect('/book');
    }
    // delete processing
    public function destroy($book_id)
    {
        //retrieve book data with id passed from the view and call delete processing
        Book::find($book_id)->delete();
        return redirect('/book');
    }
    // Edit screen
    public function edit($book_id)
    {
        $book = Book::find($book_id);
        return view('booksedit')->with(
            compact('book')
            );
    }    
    // Update
    public function update(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'book_title' => 'required|min:4|max:255',
            'Author' => 'required|min:4|max:100',
            'publisher' => 'required|min:4',
            'published' => 'required',
        ]);
        
        // Validation:error
        if ($validator->fails()) {
            //return redirect('/book')->withInput()->withErrors($validator);
            return redirect('/booksedit'."/".$request->id)->withInput()->withErrors($validator);
        }
        $book = Book::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        return redirect('/book');
    }
}
