<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembimbingRequest;
use App\Models\Pembimbing;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembimbings = Pembimbing::paginate(6);
        return view('pembimbing.index',[
            'pembimbings' => $pembimbings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembimbing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembimbingRequest $request)
    {
        $data = $request->all();
        Pembimbing::create($data);
        return redirect()->route('pembimbing.index');
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
    public function edit(Pembimbing $pembimbing)
    {
        return view('pembimbing.edit',[
            'pembimbing' => $pembimbing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PembimbingRequest $request, $id)
    {
        $data = $request->all();
        Pembimbing::find($id)->update($data);
        return redirect()->route('pembimbing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembimbing::find($id)->delete();
        return redirect()->route('pembimbing.index');
    }
}
