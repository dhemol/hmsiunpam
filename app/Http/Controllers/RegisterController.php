<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Position;
use App\Models\Field;
use App\Models\Department;

class RegisterController extends Controller
{
    // Route Tambah Data
    public function create()
    {
        return view('/auth/register', [
            'member' => new User,
            'positions' => Position::all(),
            'fields' => Field::all(),
            'departments' => Department::all(),
            'title' => 'Register'
        ]);
    }

    // Route Simpan Register
    public function store(Request $request)
    {
        // Validate the data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required',
            'status' => 'required',
            'field_id' => 'filled',
            'department_id' => 'filled',
            'position_id' => 'filled',

        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Successful! Please Login');
    }
}
