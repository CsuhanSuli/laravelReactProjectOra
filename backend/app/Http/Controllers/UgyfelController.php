<?php

namespace App\Http\Controllers;

use App\Models\ugyfel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UgyfelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ugyfel::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
            "nev"=>"required",
            "szulev"=> "required",
            "irszam" =>"required",
            "orsz"=>"required"
        ]);
 
        if ($validator->fails()) {
            return response()->json(["message"=>"hiba","hiba"=>$validator->errors(),402]);
        }
        $newRecord = new ugyfel();
        $newRecord->nev=$request->nev;
        $newRecord->szulev=$request->szulev;
        $newRecord->irszam=$request->irszam;
        $newRecord->orsz=$request->orsz;
        $newRecord->save();
        return response()->json(["message"=>"sikeres adat feltöltés"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ugyfel::find($id);
        if(empty($data))
            {
                return response()->json(["message"=>"elcseszted"],404);
            }
        return response()->json($data->befiz);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ugyfel $ugyfel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ugyfel $ugyfel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ugyfel $ugyfel)
    {
        //
    }
}
