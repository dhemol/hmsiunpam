<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Field;
use App\Models\Department;
use App\Models\Status;
use Illuminate\Http\Request;

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
            "anggota" => User::latest()->filter(request(['searchAnggota', 'role', 'status', 'field', 'department']))->paginate(10)->withQueryString(),
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
        return view('dashboard.member.create');
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
        return $request->file('image')->store('img');

        $anggota = new User;
        $anggota->nik = $request->nik;
        $anggota->nama = $request->nama;
        $anggota->username = $request->username;
        $anggota->password = $request->password;
        $anggota->email = $request->email;
        $anggota->jabatan = $request->jabatan;
        $anggota->no_hp = $request->no_hp;
        $anggota->alamat = $request->alamat;
        $anggota->foto = $request->foto;
        $anggota->save();

        return redirect()->route('member.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        // Route Anggota
        return view('dashboard.member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        // Route Edit Anggota
        return view('dashboard.member.show', compact('member'));

        return redirect()->route('dashboard.member.show')->with('success', 'Data berhasil diubah');
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
        $member->nik = $request->nik;
        $member->nama = $request->nama;
        $member->username = $request->username;
        $member->password = $request->password;
        $member->email = $request->email;
        $member->jabatan = $request->jabatan;
        $member->no_hp = $request->no_hp;
        $member->alamat = $request->alamat;
        $member->foto = $request->foto;
        $member->save();

        return redirect()->route('dashboard.member.show')->with('success', 'Data berhasil diubah');
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
        $member->delete();
        return redirect()->route('dashboard.member.index')->with('success', 'Data berhasil dihapus');
    }
}
