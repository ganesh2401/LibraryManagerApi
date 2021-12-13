<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCategoryRequest;
use App\Models\BooksCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use function Sodium\add;

class BooksCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return BooksCatagory[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BooksCatagory::all();
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
    public function store(BookCategoryRequest $request)
    {
        //
        return $this->addOrUpdate($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response|object
     */
    public function show($id)
    {
        //
        return BooksCatagory::with('books')->where('id',$id)->first();
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
    public function update(BookCategoryRequest $request, $id)
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
            try {
                BooksCatagory::findOrFail($id)->delete();
                return response()->json(['message' => 'Data deleted Successfully']);
            } catch (Exception $e) {

                Log::info("BookCategoryController delete function" . json_encode($e->getMessage()));
                return response()->json(['message' => 'Something Went Wrong Please try sometimes later'], 500);
            }
        }else{
            return unAuthorizedAccess();
        }
    }

    public function addOrUpdate($request, $id=null){

        if (Gate::allows('isAdmin')) {
            $book = BooksCatagory::updateOrCreate(['id'=>$id],$request->except('id'));
            return response()->json($book, 201);
        }else{
            return unAuthorizedAccess();
        }

    }

}
