@extends('layouts.master')
@section('title','home')
@section('karyawan','active')
@section('tambah','karyawan')
@section('content')

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"> Add Data</i></a>
        </div>
    </div>
    <hr>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content">
    <div class="container">
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>No Telepon</th>
                    <th>Status</th>
                    <th>Jabatan</th>
                    <th>Pendidikan</th>
                    <th>Tanggal Masuk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($karyawan as $karyawans)
                <tr class="text-center">
                    <td></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $karyawans->nama }}</td>
                    <td>{{ $karyawans->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                    <td>{{ $karyawans->umur }}</td>
                    <td>{{ $karyawans->telepon->nomer_telepon }}</td>
                    <td>{{ $karyawans->status->status }}</td>
                    <td>{{ $karyawans->jabatan->jabatan }}</td>
                    <td>{{ $karyawans->pendidikan->pendidikan }}</td>
                    <td>{{ $karyawans->tanggal_masuk }}</td>
                    <td>        
                        <div class="btn-group">
                        <form action="{{ route('karyawan.destroy',$karyawans->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="badge badge-danger mr-3 p-2">Hapus</button>
                        </form>
                         <a href="{{ route('karyawan.edit',$karyawans->id,'edit') }}" class="p-2 badge-info badge">Edit</a>
                        </div>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
