<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function getAbsensi(Request $request){
        try {
            $childrens = Absensi::with(['children','pembimbing'])->get();
        return ResponseFormatter::success($childrens,'Success');

        } catch (\Throwable $th) {
            return ResponseFormatter::error([$th],'Unknown Erorr',500);
        }
    }

    public function addAbsensi(Request $request){
        try {
            $request->validate([
                'children_id'=>'required|exists:childrens,id',
                'pembimbing_id'=>'required|exists:pembimbings,id',
                'video' => 'string',
                'image' => 'string',
                'sunday_date' => 'required|string',
            ]);
    
            $child = Absensi::create([
                'children_id' => $request->children_id,
                'pembimbing_id' => $request->pembimbing_id,
                'video' => $request->video,
                'image' => $request->image,
                'sunday_date' => $request->sunday_date, 
            ]);
    
            $children = Absensi::with(['children','pembimbing'])->find($child->id);
            return ResponseFormatter::success($children,'Success');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([$th],'Erorr',500);
        }
    }
}
