<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\GoogleApiToken;
use Illuminate\Http\Request;

class GoogleApiController extends Controller
{
    public function inputNewTokenCode(Request $request){
        try {
            $request->validate([
                'refresh_token' => 'required|string',
                'access_token' => 'required|string',
            ]);
            GoogleApiToken::where('access_token','!=',$request->access_token)->forceDelete();
            GoogleApiToken::create([
                'refresh_token' => $request->refresh_token,
                'access_token' => $request->access_token,
            ]);
            $tokens = GoogleApiToken::where('access_token',$request->access_token)->first();
            return ResponseFormatter::success([
                $tokens,'Success Submited',200,
            ]);
        } catch (\Throwable $th) {
            return ResponseFormatter::error(
                null,'Unknown erorr',500,
            );
        }

    }

    public function getToken(Request $request){
        $result = GoogleApiToken::orderByDesc('created_at')->first();
        GoogleApiToken::where('id','!=',$result->id)->forceDelete();
        if($result){
            return ResponseFormatter::success($result,'Success');
        }else{
            return ResponseFormatter::error(null,'There\'s no data',404);
        }
    }
}
