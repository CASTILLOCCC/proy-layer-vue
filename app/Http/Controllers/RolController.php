<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permissioin;
use Illuminate\Support\Facades\BD;


class RolController extends Controller
{
    function __construct()
    {
        $this->middleware('Permisson:ver-rol | crear-rol | editar-rol | borrar-rol',['only'=>['index']]);
        $this->middleware('Permission:crear-rol' ,['only' => ['create','store']]);   
        $this->middleware('Permission:editar-rol' ,['only' => ['edit','update']]);   
        $this->middleware('Permission:borrar-rol' ,['only' => ['destroy']]);  
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::get();
        return view ('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required','permission' =>'required']);
        $role = Role::create(['name'=>$request->input('permission')]);
        $role->sycPermissions($request->input('permission'));
        return redirect ()-> route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission=Permission::get();
        $rolePermission=DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
        //metodo pluck, recupera todos los valores de clave determinada Id
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permissions_id')
            ->all();    
        return view('roles.editar', compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,['name'=>'required','permission' =>'required']);
        $role= Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->synPermissions($request->input('permission'));
        return redirect()->ruote('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
