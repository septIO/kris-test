<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
 
class BookAPIController extends Controller
{
    public function index()
    {
        return new BookCollection(Book::paginate());
    }
 
    public function show(Book $book)
    {
        return new BookResource($book->load(['user']));
    }

    public function store(Request $request)
    {
        return new BookResource(Book::create($request->all()));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return new BookResource($book);
    }

    public function destroy(Request $request, Book $book)
    {
        $book->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}