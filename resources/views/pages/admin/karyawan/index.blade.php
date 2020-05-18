@extends('layouts.master')
@section('title','home')
@section('content')

@include('includes.admin.header')

<!-- Content Header (Page header) -->
<section class="content">
    <div class="container-fluid">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>

                @foreach($karyawan as $karyawans)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawans->nama }}</td>
                        <td>{{ $karyawans->jenis_kelamin }}</td>
                        <td>{{ $karyawans->telepon->nomer_telepon }}</td>
                        <td>{{ $karyawans->jabatan }}</td>
                        <td>{{ $karyawans->status }}</td>
                        <td>{{ $karyawans->tanggal_masuk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

{{-- </div> --}}

@endsection
