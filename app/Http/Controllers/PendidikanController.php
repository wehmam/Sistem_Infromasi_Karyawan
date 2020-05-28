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
        $daftar = ['SD','SMP','SMA/SMK','D3','S1',"S2","S3"];
        return view('pages.admin.pendidikan.index',['pendidikan' => Pendidikan::all()],compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
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
            'pendidikan' => 'required|string|unique:pendidikans'
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
        $daftar = ['SD','SMP','SMA/SMK','D3','S1',"S2","S3"];
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
            'pendidikan' => 'required|string|unique:pendidikans,pendidikan,'.$pendidikan->id,
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
