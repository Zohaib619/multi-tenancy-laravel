<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with("roles")->get();
        return view("app.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("app.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:225",
            "email" => "required|email|max:225|unique:users,email",
            "password" => ["required", "confirmed", Rules\Password::default()]

        ]);
        User::create($validatedData);
        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $users = User::with("roles")->get();
        $roles = Role::get();
        return view("app.users.edit", compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:225",
            "email" => "required|email|max:225|unique:users,email,".$user->id,
            // "password" => ["required", "confirmed", Rules\Password::default()]
            "roles" => "required|array"

        ]);
        $user->update($validatedData);
        $user->roles()->sync($request->roles);
        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
