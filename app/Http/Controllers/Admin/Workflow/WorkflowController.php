<?php

namespace App\Http\Controllers\Admin\Workflow;

use App\Http\Controllers\Controller;
use App\Model\Buildup;
use App\Model\Workflow;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.workflow.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Buildup::ofType('STAGES')->get();
        $actions = Buildup::ofType('ACTION')->get();

        $roles = Role::pluck('name');

        return view('backend.workflow.create', compact('stages', 'actions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['sort_order' => 'required', 'stage_id' => 'required', 'substage_id' => 'required', 'action_id' => 'required', 'nextstage_id' => 'required', 'nextsubstage_id' => 'required', 'nextaction_id' => 'required']);

        $workflow = Workflow::create($data);

        collect($request->currentowners)->each(function($role) use ($workflow) {
            $workflow->currentRoleOwner()->create(['user_role' => $role]);
        });

        collect($request->nextowners)->each(function($role) use ($workflow){
            $workflow->nextRoleOwner()->create(['user_role' => $role]);
        });

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Workflow $workflow)
    {
        $model = $workflow;

        $stages = Buildup::ofType('STAGES')->get();
        $actions = Buildup::ofType('ACTION')->get();

        $roles = Role::pluck('name');

        return view('backend.workflow.show', compact('model', 'stages', 'actions', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Workflow $workflow)
    {
        $model = $workflow;

        $stages = Buildup::ofType('STAGES')->get();
        $actions = Buildup::ofType('ACTION')->get();

        $roles = Role::pluck('name');

        return view('backend.workflow.edit', compact('model', 'actions', 'stages', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workflow $workflow)
    {
        $data = $request->validate(['sort_order' => 'required', 'stage_id' => 'required', 'substage_id' => 'required', 'action_id' => 'required', 'nextstage_id' => 'required', 'nextsubstage_id' => 'required', 'nextaction_id' => 'required']);

        $workflow->update($data);

        $workflow->currentRoleOwner->delete();

        $workflow->nextRoleOwner->delete();

        collect($request->currentowners)->each(function($role) use ($workflow) {
            $workflow->currentRoleOwner()->create(['user_role' => $role]);
        });

        collect($request->nextowners)->each(function($role) use ($workflow){
            $workflow->nextRoleOwner()->create(['user_role' => $role]);
        });

        return redirect()->route('admin.workflow.index');
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
