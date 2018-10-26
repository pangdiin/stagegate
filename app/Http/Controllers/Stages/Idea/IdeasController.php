<?php

namespace App\Http\Controllers\Stages\Idea;

use App\Http\Controllers\Controller;
use App\Model\Buildup;
use App\Model\Category;
use App\Model\Company;
use App\Model\Idea;
use App\Model\Workflow;
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
       //ito yung lahat ng ideas kahit anong status

        return view('stages.idea.index');
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
        $ideas = collect(request('rows'));
        $comment = request('comment');

        try {
            
            $ideas->each(function($row) use($comment){
                $this->save($row, $comment);
            });

            return response()->json(['message'=> 'Success']);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
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

    protected function save($row, $comment)
    {
        $row = (object) $row;

        $idea = New Idea();
        $idea->user_id = auth()->user()->id;
        $idea->workflow_id = Workflow::first()->id;
        $idea->company_id = $row->company;
        $idea->category_id = $row->category;
        $idea->demographic_id = $row->demographic;
        $idea->existing = $row->existing == 'new' ? true : false;
        $idea->product_concept = $row->product_concept;
        $idea->product_description = $row->product_description;
        $idea->psychographics = $row->psychographics;
        $idea->opportunities = $row->opportunities;
        $idea->retail_price = $row->retail_price;
        $idea->competition = $row->competition;
        $idea->is_initial = true;
        $idea->save();

        collect($row->sec)->each(function($sec) use ($idea){
            $idea->sec()->create(['sec_id' => $sec]);
        });

        collect($row->distribution)->each(function($distribution) use ($idea){
            $idea->distribution()->create(['distribution_id' => $distribution]);
        });

        $idea->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => $comment,
        ]);

        $idea->ideaOwners()->create([
            'user_id' => auth()->user()->id
        ]);
    }
}
