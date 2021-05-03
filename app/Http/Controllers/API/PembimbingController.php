<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Children;
use App\Models\Pembimbing;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
        public function addPembimbing(Request $request){
            try {
                $request->validate([
                    'name' => 'required',
                ]);
    
                Pembimbing::create([
                    'name' => $request->name,
                ]);
    
                $pembimbing = Pembimbing::where('name',$request->name)->first();
                return ResponseFormatter::success($pembimbing,'Success Add Pembimbing');
            } catch (\Throwable $th) {
                return ResponseFormatter::error(null,'Unknown Erorr',500);
            }
        }

        public function getPembimbing(Request $request){
            try {
                $pembimbing = Pembimbing::all();
                return ResponseFormatter::success($pembimbing,'Success Get Data');
            } catch (\Throwable $th) {
                return ResponseFormatter::error(null,'Unknown Error');
            }
        }
}
