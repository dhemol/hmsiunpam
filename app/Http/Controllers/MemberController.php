<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Field;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Route Anggota
        return view('dashboard.member.index', [
            "anggota" => User::where('role', 'anggota')->latest()->filter(request(['searchAnggota', 'status', 'field', 'department']))->paginate(10)->withQueryString(),
            "title" => "Anggota | HMSI UNPAM",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Tambah Anggota
        return view('dashboard.member.create', [
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
        // Route Simpan Anggota
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
            'status' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/member')->with('success', 'New Member Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function show(User $member)
    {
        // Route Anggota
        return view('dashboard.member.show', [
            "member" => $member,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
            "title" => "Anggota | HMSI UNPAM",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(User $member)
    {
        // Route Edit Anggota
        return view('dashboard/member/edit', [
            "member" => $member,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $member)
    {
        // Route Update Anggota
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
            'status' => 'required',
        ];

        if ($request->email != $member->email) {
            if ($request->username != $member->username) {
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
        User::where('id', $member->id)->update($validatedData);

        return redirect('/dashboard/member')->with('success', 'Member Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $member)
    {
        // Route Hapus Anggota
        if ($member->image) {
            Storage::delete($member->image);
        }
        User::destroy($member->id);

        return redirect('/dashboard/member')->with('success', 'Post Has Been Deleted');
    }

    public function export()
    {
        $anggota = User::where('role', 'anggota')->get();

        $pdf = PDF::loadview('/dashboard/member/exportPDF', ['role', 'anggota' => $anggota]);
        return $pdf->download('anggota-HMSI.pdf');
    }
}
