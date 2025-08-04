<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user');
    }

    public function create()
    {
        $data = [
            'role' => Role::get(),
        ];
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->validation());
        $user = User::create($request->all());
        $roles = $request->check;
        $user->syncRoles($roles);
        return response()->json(['success' => 'Data has been created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       $data = [
            'user' => $user,
            'roles' => $user->hasExactRoles(Role::all()),
            'allRoles' => Role::get(),
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate($this->validation());
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
        ])->save();
        $roles = $request->check;
        $user->syncRoles($roles);
        return response()->json(['success' => 'Data has been updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => 'Data has been deleted successfully!']);
    }

    /**
     * Validation the specified resource.
     */
    public function validation()
    {
        return [
            'name' => 'required',
            'email' => 'required',
        ];
    }
}
