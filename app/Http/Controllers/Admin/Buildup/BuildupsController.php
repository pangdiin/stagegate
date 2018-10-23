<?php

namespace App\Http\Controllers\Admin\Buildup;

use App\Http\Controllers\Controller;
use App\Model\Buildup;
use Illuminate\Http\Request;

class BuildupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.buildup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.buildup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['code' => 'required', 'name' => 'required', 'description' => 'required', 'type' => 'required']);

        Buildup::create($data);

        return redirect()->route('admin.buildup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buildup $buildup)
    {
        $model = $buildup;

        return view('backend.buildup.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buildup $buildup)
    {
        $model = $buildup;

        return view('backend.buildup.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buildup $buildup)
    {
        $data = $request->validate(['code' => 'required', 'name' => 'required', 'description' => 'required', 'type' => 'required']);

        $buildup->update($data);

        return redirect()->route('admin.buildup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
