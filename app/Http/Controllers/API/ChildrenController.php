<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Children;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function inputChildren(Request $request){
        try {
            $request->validate([
                'name' =>'string|required',
                'code' =>'string|required',
                'role' =>'String|required',
                'id_pembimbing' => 'required|integer|exists:pembimbings,id',
            ]);
 
            $child = Children::create([
                'name' => $request->name,
                'code' => $request->code,
                'id_pembimbing' => $request->id_pembimbing,
                'role' => $request->role,
            ]);
            
            $children = Children::with(['pembimbing'])->find($child->id);
            return ResponseFormatter::success($children,'Success');

        } catch (\Throwable $th) {
            return ResponseFormatter::error([$th],'Unknown Erorr',500);
        }
    }

    public function getChildrenData(Request $request){
       $children =  Children::with(['pembimbing'])->get();
       if($children){
           return ResponseFormatter::success($children,'Success');
       }else{
           return ResponseFormatter::error(null,'No Data At Database',404);
       }
    }
}
