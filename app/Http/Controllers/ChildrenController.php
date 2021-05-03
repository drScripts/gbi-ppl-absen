<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildrenRequest;
use App\Models\Absensi;
use App\Models\Children;
use App\Models\Pembimbing;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = Children::with(['pembimbing'])->paginate(20);
        return view('children.index',[
            'children' => $children,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembimbings = Pembimbing::all();
        return view('children.create',[
            'pembimbings' => $pembimbings,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildrenRequest $request)
    {
        $data = $request->all();
        Children::create($data);
        return redirect()->route('children.index');
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
    public function edit(Children $child) // nyatu sama variable yang di create
    {
        $children = Children::with(['pembimbing'])->find($child->id);
        $pembimbings = Pembimbing::all();
        return view('children.edit',[
            'children' => $children,
            'pembimbings' => $pembimbings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChildrenRequest $request,$id)
    {       
        $data = $request->all();
        Children::find($id)->update($data);

        return redirect()->route('children.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Children::find($id)->forceDelete();
        Absensi::where('children_id',$id)->forceDelete();
        return redirect()->route('children.index');
    }
}
