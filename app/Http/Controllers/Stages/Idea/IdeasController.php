<?php

namespace App\Http\Controllers\Stages\Idea;

use App\Http\Controllers\Controller;
use App\Model\Buildup;
use App\Model\Category;
use App\Model\Company;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('stages.idea.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select(['id', 'name'])->get();
        $categories = Category::select(['id', 'name'])->get();

        $secs = Buildup::ofType('SEC')->get();
        $demographics = Buildup::ofType('DEMOGRAPHICS')->get();
        $distributions = Buildup::ofType('DISTRIBUTION')->get();

        return view('stages.idea.create', compact('companies', 'categories', 'secs', 'demographics', 'distributions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ideas = request('rows');
        $comment = request('comment');


        return response()->json(['message'=> 'Success']);
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
        //
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
        //
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
