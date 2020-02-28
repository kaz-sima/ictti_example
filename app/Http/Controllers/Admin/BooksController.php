<?php
namespace App\Http\Controllers\Admin;

use App\Book;
use App\Ctgry;
use App\Subctgry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // add

// add
class BooksController extends Controller
{
    // display book list
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(3); // change
        return view('admin.book.books', [
            'books' => $books
        ]);
    }
    // register processing
    public function register(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'book_title' => 'required|min:4|max:255',
            'Author' => 'required|min:4|max:100',
            'publisher' => 'required|min:4',
            'published' => 'required',
            'ctgry_id' => 'required|integer|min:1',
            'subctgry_id' => 'required|integer|min:1',
        ]);
        // validation error
        if ($validator->fails()) {
            return redirect('/admin/booksadd')->withErrors($validator)->withInput();
        }
        // book register processing
        $book = new Book();
        $form = $request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        /*
         * $books->book_title = $request->book_title;
         * $books->book_number = $request->Author;
         * $books->book_price = $request->publisher;
         * $books->published = $request->published;
         * $books->save();
         */
        return redirect('/admin/book');
    }
    // adding screen
    public function add()
    {
        $ctgries = Ctgry::orderBy('code','asc')->pluck('name', 'code');
        $ctgries = $ctgries -> prepend('ctgry', '');
        $subctgries = Subctgry::get_subctgry();
        return view('admin.book.booksadd')->with( compact('ctgries','subctgries') );
    }
    // delete processing
    public function destroy($book_id)
    {
        Book::find($book_id)->delete();
        return redirect('/admin/book');
    }
    // Editing screen
    public function edit($book_id)
    {
        $ctgries = Ctgry::orderBy('code','asc')->pluck('name', 'code');
        $ctgries = $ctgries -> prepend('ctgry', '');
        $subctgries = Subctgry::get_subctgry();
        $book = Book::find($book_id);
        return view('admin.book.booksedit')->with(compact('book','ctgries','subctgries'));
    }
    // Update processing
    public function update(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'book_title' => 'required|min:4|max:255',
            'Author' => 'required|min:4|max:100',
            'publisher' => 'required|min:4',
            'published' => 'required',
            'ctgry_id' => 'required|integer|min:1',
            'subctgry_id' => 'required|integer|min:1',
        ]);
        // Validation:error
        if ($validator->fails()) {
            //return redirect('/admin/book')->withInput()->withErrors($validator);
            return redirect('/admin/booksedit'."/".$request->id)->withErrors($validator)->withInput();
        }
        $book = Book::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        return redirect('/admin/book');
    }
}
