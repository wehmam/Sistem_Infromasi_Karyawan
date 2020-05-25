<?php

namespace App\Http\Controllers;

use App\model\Status;
use Alert;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = ['Karyawan Tetap','Kontrak','Magang'];
        return view('pages.admin.status.index',['status' => Status::all()],compact('daftar'));
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
        $status = new Status;
        $status->status = $request->status;
        $status->save();
        Alert::toast('Status Berhasil Ditambahkan!','success');
        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        $status->find($status->id);
        $daftar = ['Karyawan Tetap','Kontrak','Magang'];
        return view('pages.admin.status.edit',compact('status','daftar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $status->find($status->id)->update([
            'status' => $request->status
        ]);
        Alert::toast('Status Berhasil Diedit!','success');
        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->find($status->id)->delete();
        Alert::toast('Status Berhasil Dihapus!','error');
        return redirect()->route('status.index');
    }
}
