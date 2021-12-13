<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookIssuedRequest;
use App\Models\Book;
use App\Models\BooksIssued;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookIssuedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth('api')->user();
        if (Gate::allows('isAdmin')) {

            return BooksIssued::with('user','book','ReturnDate')->get();
        }
        else{
           return User::with('issuedBooks')->where('id',$user->id)->get();
        }
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
    public function store(BookIssuedRequest $request,$id=null)
    {
        //
        return $this->addOrUpdate($request,$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
        $user = auth('api')->user();
        if (Gate::allows('isAdmin')) {

            return BooksIssued::with('user','book','ReturnDate')->where('id',$id)->get();
        }
        else{
            return BooksIssued::with('book')->where('id',$id)->where('memberId',$user->id)->get();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookIssuedRequest $request, $id)
    {
        //
        $this->addOrUpdate($request,$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        if (Gate::allows('isAdmin')) {
            $book = BooksIssued::findOrFail($id)->delete();
            return response()->json($book, 201);
        } else {

            return unAuthorizedAccess();

        }
    }

    public function addOrUpdate($request, $id=null){

        if (Gate::allows('isAdmin')) {
            $Book = Book::select('*')->where('id',$request->bookId)->first();

            if($Book->totalAvail>0) {
                $bookIssued = BooksIssued::updateOrCreate(['id' => $id], $request->except('id'));
                $Book->totalAvail = $Book->totalAvail-1;
                $Book->save();
                return response()->json($bookIssued, 201);
            }
            else{
                return response()->json(['message' => 'selected are issued or not available '],404);
            }
        }else{
            return unAuthorizedAccess();
        }

    }

}
