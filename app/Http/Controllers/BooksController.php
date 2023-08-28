<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Book;
use Validator;
use Auth;

class BooksController extends Controller
{
    public function index() {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('books', [
            'books' => $books
        ]);
    }

    public function edit(Book $books) {
        return view('booksedit', [
            'book' => $books
        ]);
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required|min:3|max:255',
            'note' => 'required|min:3|max:255',
            'finished_date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $books = Book::find($request->id);
        $books->title = $request->title;
        $books->note = $request->note;
        $books->finished_date = $request->finished_date;
        $books->save();
        return redirect('/')->with('message', '更新が完了しました');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:255',
            'note' => 'required|min:3|max:255',
            'finished_date' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $books = new Book;
        $books->title   = $request->title;
        $books->note = $request->note;
        $books->finished_date   = $request->finished_date;
        $books->save();
        return redirect('/')->with('message', '登録が完了しました');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect('/')->with('message', '削除が完了しました');
    }
}
