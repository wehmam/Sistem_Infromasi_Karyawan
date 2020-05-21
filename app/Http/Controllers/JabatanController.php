<?php

namespace App\Http\Controllers;

use App\model\Jabatan;
use Alert;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.jabatan.index',['jabatan'=> Jabatan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.jabatan.create');
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
            'jabatan' => 'required|string'
        ]);
        Jabatan::create($validateData);
        Alert::toast('Data '.$request->jabatan.' Berhasil Disimpan','success');
        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('pages.admin.jabatan.edit',['jabatan'=>$jabatan->find($jabatan->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $validateData = $request->validate([
            'jabatan' => 'required|string'
        ]);
        $jabatan->find($jabatan->id)->update($validateData);
        Alert::toast('Data '.$jabatan->jabatan.' Berhasil Diedit','success');
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->find($jabatan->id)->delete();
        Alert::toast('Data '.$jabatan->jabatan.' Berhasil Dihapus','error');
        return redirect()->route('jabatan.index');
    }
}
