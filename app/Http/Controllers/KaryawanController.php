<?php

namespace App\Http\Controllers;

use App\model\Karyawan;
use App\model\Telepon;
use App\model\Jabatan;
use App\model\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Requests\KaryawanRequest;
Use Alert;
use DataTables;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.karyawan.index',['karyawan'=>Karyawan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $pendidikan = Pendidikan::all();
        $status = ['Karyawan Tetap','Magang','Kontrak'];
        return view('pages.admin.karyawan.formCreate',compact('status','jabatan','pendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|min:3',
            'jenis_kelamin' => 'required',
            'jabatan_id' => 'required',
            'pendidikan_id' => 'required',
            'status' => 'required',
            'tanggal_masuk' => 'required',
        ]);
        
        $karyawan = Karyawan::create($validateData);
        $telepon = new Telepon;
        $telepon->nomer_telepon = $request->input('nomer_telepon');
        $karyawan->telepon()->save($telepon);

        Alert::success('Berhasil','Data '.$request->nama.' Berhasil Disimpan');
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        $karyawan->find($karyawan->id);
        $jabatan = Jabatan::all();
        $status = ['Karyawan Tetap','Magang','Kontrak'];
        return view('pages.admin.karyawan.formEdit',compact('karyawan','jabatan','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|min:3',
            'jenis_kelamin' => 'required',
            'jabatan_id' => 'required',
            'status' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        $karyawan->update($validateData);
        $telepon = $karyawan->Telepon;
        $telepon->nomer_telepon = $request->input('nomer_telepon');
        $karyawan->telepon()->save($telepon);
        
        Alert::success('Berhasil', 'Data Berhasil Di ubah !');
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->find($karyawan->id)->delete();
        Alert::toast('Data '.$karyawan->nama.' Berhasil Terhapus','error');
        return redirect()->route('karyawan.index');
    }
}
