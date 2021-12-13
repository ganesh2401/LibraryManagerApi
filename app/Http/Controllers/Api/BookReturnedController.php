<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookReturnedRequest;
use App\Models\BooksIssued;
use App\Models\BooksReturned;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class BookReturnedController extends Controller
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

            return BooksIssued::all();
        }
        else{
            return User::with('returnBooks')->where('id',$user->id)->get();
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
    public function store(BookReturnedRequest $request,$id=null)
    {
        //

        $issueDate = BooksIssued::with('book','user')->where('id',$request->issuedId)->first();
        if($issueDate->issueDate>$request->retDate){
            return response()->json(['message' => 'Return date equal or greater that issue date'],401);
        }
        else{
            return $this->addOrUpdate($request,$id,$issueDate);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = auth('api')->user();
        if (Gate::allows('isAdmin')) {

            return BooksReturned::with('user','book','ReturnDate')->where('id',$id)->get();
        }
        else{
            return BooksReturned::with('book_issued','book')->where('id',$id)->where('memberId',$user->id)->get();
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
    public function update(BookReturnedRequest $request, $id)
    {
        //
        $this->store($request,$id);
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
            $book = BooksReturned::findOrFail($id)->delete();
            return response()->json($book, 201);
        } else {

            return unAuthorizedAccess();
        }
    }

    public function addOrUpdate($request, $id=null,BooksIssued $booksIssued){

        if (Gate::allows('isAdmin')) {
            $book = BooksReturned::updateOrCreate(['id'=>$id],$request->except('id'));
            $booksIssued->isReturn = 'Y';
            $booksIssued->book->update(['totalAvail'=>DB::raw('totalAvail+1')]);
            $booksIssued->save();
            return response()->json($book, 201);
        }else{
            return unAuthorizedAccess();
        }

    }

}
