<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoogleApiTokenRequest;
use App\Models\GoogleApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GoogleApiTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = GoogleApiToken::paginate(10);
        return view('googleToken.index',[
            'tokens' => $tokens,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('googleToken.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoogleApiTokenRequest $request)
    {
        $data = $request->all();
        GoogleApiToken::create($data);
        return redirect()->route('googleToken.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $token = GoogleApiToken::find($id)->first();
        return view('googleToken.edit',[
            'tokens' => $token,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        GoogleApiToken::find($id)->update($data);

        return redirect()->route('googleToken.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GoogleApiToken::find($id)->forceDelete();
        return redirect()->route('googleToken.index');
    }
}
