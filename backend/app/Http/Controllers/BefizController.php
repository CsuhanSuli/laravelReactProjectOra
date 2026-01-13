<?php

namespace App\Http\Controllers;

use App\Models\befiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BefizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(befiz::all());
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
            "ugyfel_azon"=>"required|exists:ugyfel,azon",
            "datum"=> "required",
            "osszeg" =>"required"
        ]);
 
        if ($validator->fails()) {
            return response()->json(["message"=>"hiba","hiba"=>$validator->errors(),402]);
        }
        $newRecord = new befiz();
        $newRecord->ugyfel_azon=$request->ugyfel_azon;  
        $newRecord->datum=$request->datum;  
        $newRecord->osszeg=$request->osszeg;
        $newRecord->save();
        return response()->json(["message"=>"sikeres adat feltöltés"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(befiz $befiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(befiz $befiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, befiz $befiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $data = befiz::find($id);
        if(empty($data))
            {
                return response()->json(["message"=>"what are you excepting bro it isnt even real"],404);
            }
        else
            {
                $data->delete();
                return response()->json(["sikeres szekesztés"=>true],202);
            }
    }
}
