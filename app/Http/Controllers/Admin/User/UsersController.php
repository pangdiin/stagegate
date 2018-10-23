<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Company;
use App\Model\Department;
use App\Model\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        $companies = Company::all();

        $categories = Category::all();

        $roles = Role::all();

        return view('backend.users.create', compact('departments', 'companies', 'categories', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['first_name' => 'required', 'middle_name' => 'required', 'last_name' => 'required', 'department_id' => 'nullable', 'company_id' => 'nullable']);

        $user->update($data);

        $user->categories()->attach(request('category'));

        $user->assignRole(request('roles'));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $model = $user;

        $departments = Department::all();

        $companies = Company::all();

        $categories = Category::all();

        $roles = Role::all();

        return view('backend.users.show', compact('model', 'departments', 'companies', 'categories', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $model = $user;

        $departments = Department::all();

        $companies = Company::all();

        $categories = Category::all();

        $roles = Role::all();

        return view('backend.users.edit', compact('model', 'departments', 'companies', 'categories', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate(['first_name' => 'required', 'middle_name' => 'required', 'last_name' => 'required', 'department_id' => 'nullable', 'company_id' => 'nullable']);

        $user->update($data);

        $user->categories()->sync(request('category'));

        $user->syncRoles(request('roles'));

        return redirect()->route('admin.users.index');
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
