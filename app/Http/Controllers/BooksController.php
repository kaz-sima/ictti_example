<?php
namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
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
}
