<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Field;
use App\Models\Department;
use App\Models\Position;
use PDF;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Route Admin
        return view('dashboard.admin.index', [
            "admins" => User::where('role', 'admin')->latest()->filter(request(['searchAdmin', 'field', 'department']))->paginate(10)->withQueryString(),
            "title" => "Admin | HMSI UNPAM",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.admin.create', [
            'admin' => new User,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        $validatedData = $request->validate([
            'nba' => 'filled',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|min:6|max:255|unique:users',
            'password' => 'required|string|min:6',
            'no_hp' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position_id' => 'required',
            'field_id' => 'required',
            'department_id' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/admin')->with('success', 'New Member Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        // 
        return view('dashboard.admin.show', [
            "admin" => $admin,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
            "title" => "Anggota | HMSI UNPAM",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        //
        return view('dashboard/admin/edit', [
            "admin" => $admin,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        //
        $rules = [
            'nba' => 'filled',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'no_hp' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position_id' => 'required',
            'field_id' => 'required',
            'department_id' => 'required',
            'role' => 'required',
            'status' => 'required',
        ];

        if ($request->email != $admin->email) {
            if ($request->username != $admin->username) {
                $rules['username'] = 'required|min:6|max:255|unique:users';
            }
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
        User::where('id', $admin->id)->update($validatedData);

        return redirect('/dashboard/admin')->with('success', 'Member Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        //
        if ($admin->image) {
            Storage::delete($admin->image);
        }
        User::destroy($admin->id);

        return redirect('/dashboard/admin')->with('success', 'Post Has Been Deleted');
    }

    public function export()
    {
        $admin = User::where('role', 'admin')->get();

        $pdf = PDF::loadview('/dashboard/admin/exportPDF', ['role', 'admin' => $admin]);
        return $pdf->download('admin-HMSI.pdf');
    }
}
