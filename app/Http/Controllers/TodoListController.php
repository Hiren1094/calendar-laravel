<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        return response()->json(todolist::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $todolist = todolist::create($request->all());

        return response()->json(array('sucs' => true,'id' => $todolist->id), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  id  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update($id,Request $request){

        $todolist = todolist::findOrFail($id);
        $todolist->update($request->all());

        return response()->json(array('sucs' => true), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        todolist::findOrFail($id)->delete();
        return response()->json(array('sucs' => true), 200);
    }
}