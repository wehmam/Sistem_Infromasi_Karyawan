<?php

namespace App\Http\Controllers;

use App\model\Pendidikan;
use Alert;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.pendidikan.index',['pendidikan' => Pendidikan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftar = ['SD','SMP','SMA/SMK','S1'];
        return view('pages.admin.pendidikan.create',compact('daftar'));
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
            'pendidikan' => 'required|string'
        ]);
        Pendidikan::create($validateData);
        Alert::toast('Data '.$validateData['pendidikan'].' Berhasil Disimpan','success');
        return redirect()->route('pendidikan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        $daftar = ['SD','SMP','SMA/SMK','S1'];
        return view('pages.admin.pendidikan.edit',['pendidikan'=> $pendidikan->find($pendidikan->id)],compact('daftar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $validateData = $request->validate([
            'pendidikan' => 'required|string'
        ]);
        $pendidikan->find($pendidikan->id)->update($validateData);
        Alert::toast('Data '.$pendidikan->pendidikan.' Berhasil Di ubah!','success');
        return redirect()->route('pendidikan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->find($pendidikan->id)->delete();
        Alert::toast('Data '.$pendidikan->pendidikan.' Berhasil Dihapus!','error');
        return redirect()->route('pendidikan.index');
    }
}
