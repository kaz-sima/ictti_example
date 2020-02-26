<?php
namespace App\Http\Controllers\Admin;

use App\Book;
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
        // return $dataTable->render('admin.book.index');
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
        ]);
        // validation error
        if ($validator->fails()) {
            return redirect('/admin/booksadd')->withInput()->withErrors($validator);
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
        return view('admin.book.booksadd');
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
        $book = Book::find($book_id);
        return view('admin.book.booksedit')->with(compact('book')); // sama as with(['book' => $book])
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
        ]);
        // Validation:error
        if ($validator->fails()) {
            return redirect('/admin/book')->withInput()->withErrors($validator);
            //return redirect('/admin/booksedit'."/".$request->id)->withInput()->withErrors($validator);
        }
        $book = Book::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        return redirect('/admin/book');
    }
}
