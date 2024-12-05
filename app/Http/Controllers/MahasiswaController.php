<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg|max: 4096',
            'nim' => 'unique:App\Models\Mahasiswa,nim'
        ], [
            'foto.image' => 'File yang diupload harus berupa foto!',
            'foto.mimes' => 'File foto yang diperbolehkan hanya berformat: png, jgp, jpeg!',
            'foto.max' => 'File yang diupload max 4MB!',
            'nim.unique' => 'NIM yang diinput sudah terdaftar sebelumnya'
        ]);

        $data = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_tinggal' => $request->alamat_tinggal,
        ];

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nim . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('public/foto/', $newName);
            $data['foto'] = $newName;
        }

        Mahasiswa::create($data);
        return redirect('/')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg|max: 4096',
            'nim' => 'unique:App\Models\Mahasiswa,nim,' . $mahasiswa->id
        ], [
            'foto.image' => 'File yang diupload harus berupa foto!',
            'foto.mimes' => 'File foto yang diperbolehkan hanya berformat: png, jgp, jpeg!',
            'foto.max' => 'File yang diupload max 4MB!',
            'nim.unique' => 'NIM yang diinput sudah terdaftar sebelumnya'
        ]);

        $data = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat_tinggal' => $request->alamat_tinggal,
        ];

        if ($request->file('foto')) {
            if ($mahasiswa->foto) {
                $old_image = public_path('storage/foto/' . $mahasiswa->foto);
                if (file_exists($old_image)) {
                    unlink($old_image);
                }
            }

            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nim . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('public/foto/', $newName);
            $data['foto'] = $newName;
        }

        $mahasiswa->update($data);
        return redirect('/')->with('success', 'Data berhasil diedit');
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        $mahasiswa->delete();
        return redirect('/')->with('success', 'Data berhasil dihapus');
    }
}
