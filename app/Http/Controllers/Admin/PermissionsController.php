<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.permissions.index')->only('index');
        $this->middleware('can:admin.permissions.create')->only('create','store');
        $this->middleware('can:admin.permissions.edit')->only('edit','update');
        $this->middleware('can:admin.permissions.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$permissions = Permission::all();
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',

        ]);
        $permission= Permission::create($request->all());
        //$role->permissions()->sync($request->permissions);
        return redirect()->route('admin.permissions.edit',compact('permission'))->with('info','Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //$permissions = Permission::all();
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',

        ]);
        $permission->update($request->all());
        //$role->permissions()->sync($request->permissions);
        return redirect()->route('admin.permissions.edit',compact('permission'))->with('info','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index',compact('permission'))->with('info','Permission deleted successfully');
    }
}
