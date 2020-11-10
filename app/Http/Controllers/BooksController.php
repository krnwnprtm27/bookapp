<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function getBookbyId($id)
    {
        // $book = DB::table('books')->where('id', $id)->first();
        $book = Book::where('id', $id)->first();
        if ($book) {
            return response()->json([
                'message' => 'Success',
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }
    }
}
