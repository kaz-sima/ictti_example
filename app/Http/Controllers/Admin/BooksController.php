<?php
namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        
        return $dataTable->render('admin.book.books');
        
    }

    // register processing
    public function register(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'book_img' => 'required|image',
            'book_title' => 'required|min:4|max:255',
            'Author' => 'required|min:4|max:100',
            'publisher' => 'required|min:4',
            'published' => 'required',
            'ctgry_id' => 'required',
            'subctgry_id' => 'required',
        ]);
        // validation error
        if ($validator->fails()) {
            return redirect('/admin/booksadd')->withInput()->withErrors($validator);
        }
        
         /* // validation with validate method
         $request->validate([
         'book_title' => 'required|min:4|max:255',
         'Author' => 'required|min:4|max:100',
         'publisher' => 'required|min:4',
         'published' => 'required',
         ]);
         */
        
        // file upload
        $file = $request->file('book_img');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/',$filename); //public
        }else{
            $filename = "";
        }
                
        // book register processing
        $book = new Book();
        $form = $request->all();
        unset($form['_token']);
        $form['book_img'] = $filename;
        $book->fill($form)->save();
        /*
         * $books->book_title = $request->book_title;
         * $books->book_number = $request->book_number;
         * $books->book_price = $request->book_price;
         * $books->published = $request->published;
         * $books->save();
         */
        $request->session()->flash('status', 'Task was successful!');
        return redirect('/admin/book');
    }

    // Add books
    public function add()
    {
          
        return view('admin.book.booksadd')->with(
            compact('ctgries','subctgries')
        );
    }

    // delete processing
    public function destroy($book_id)
    {
        Book::find($book_id)->delete();
        return redirect('/admin/book');
    }

    // Edit screen
    public function edit($book_id)
    {
  
        $book = Book::find($book_id);
        return view('admin.book.booksedit')->with(
            compact('book','ctgries','subctgries')
        );         
    }

    // Update
    public function update(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'book_img' => 'required|image',
            'book_title' => 'required|min:4|max:255',
            'Author' => 'required|min:4|max:100',
            'publisher' => 'required|min:4',
            'published' => 'required',
            'ctgry_id' => 'required',
            'subctgry_id' => 'required',
        ]);

        // Validation:error
        if ($validator->fails()) {
            //return redirect('/admin/book')->withInput()->withErrors($validator);
            return redirect('/admin/booksedit'."/".$request->id)->withInput()->withErrors($validator);
        }
        
        // file upload
        if($request->file('book_img')->isvalid()){
            $filename = $request->file('book_img')->getClientOriginalName();
            $request->file('book_img')->storeAs('public/',$filename); // move the file to the set place
        }else{
            $filename = "";
        }
        
        $book = Book::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $form['book_img'] = $filename;
        $book->fill($form)->save();
        return redirect('/admin/book');
    }
}