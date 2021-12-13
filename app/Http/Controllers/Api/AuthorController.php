<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use function response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Author::all();
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
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request,$id=null)
    {
        //
        return $this->addOrUpdate($request,$id);
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
        return Author::with('books')->where('id',$id)->first();
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
    public function update(AuthorRequest $request, $id)
    {
        //
        return $this->addOrUpdate($request,$id);
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
                Author::findOrFail($id)->delete();
                return response()->json(['message' => 'Data deleted Successfully']);
            } catch (Exception $e) {

                Log::info("Bookcontroller delete function" . json_encode($e->getMessage()));
                return response()->json(['message' => 'Something Went Wrong Please try sometimes later'], 500);
            }
        }else{
            return $this->unAuthorizedAccess();
        }
    }


    public function addOrUpdate($request, $id=null){

        if (Gate::allows('isAdmin')) {
            $book = Author::updateOrCreate(['id'=>$id],$request->except('id'));
            return response()->json($book, 201);
        }else{
            return unAuthorizedAccess();
        }
    }
}
