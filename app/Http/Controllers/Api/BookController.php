<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return book[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::with('category','author')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookRequest $request)
    {
        //
        return $this->addOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response|object
     */
    public function show($id)
    {
        //
        return Book::with('category','author')->where('id',$id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BookRequest $request, $id)
    {
        //
        return $this->addOrUpdate($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        if (Gate::allows('isAdmin')) {
            try {
                Book::findOrFail($id)->delete();
                return response()->json(['message' => 'Data deleted Successfully']);
            } catch (Exception $e) {

                Log::info("Bookcontroller delete function" . json_encode($e->getMessage()));
                return response()->json(['message' => 'Something Went Wrong Please try sometimes later'], 500);
            }
        }
        else{
            return unAuthorizedAccess();
        }
    }


    public function addOrUpdate($request, $id=null){
        if (Gate::allows('isAdmin')) {

            $book = Book::updateOrCreate(['id'=>$id],$request->except('id'));
            return response()->json(['message' => 'Book data successfully Added','User'=>$book],201);
        }
        else{
            return unAuthorizedAccess();
        }

    }
}
