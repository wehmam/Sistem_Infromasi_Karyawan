@extends('layouts.master')
@section('title','home')
@section('karyawan','active')

@section('content')

@include('includes.admin.header')

<!-- Content Header (Page header) -->
<section class="content">
    <div class="container-fluid">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Add Data</a>
            <thead>
                <tr>
                    {{-- <th>No</th> --}}
                    <th></th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Tanggal Masuk</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($karyawan as $karyawans)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td><a href="{{ route('edit') }}" class="badge badge-success"></a></td> --}}
                        <td>{{ $karyawans->nama }}</td>
                        <td>{{ $karyawans->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $karyawans->telepon->nomer_telepon }}</td>
                        <td>{{ $karyawans->jabatan->jabatan }}</td>
                        <td>{{ $karyawans->status->status }}</td>
                        <td>{{ $karyawans->tanggal_masuk }}</td>
                        <td>
                            <div class="btn-group">
                                    <a href="{{ route('karyawan.edit',$karyawans->id,'edit') }}" class="badge badge-info">
                                    Edit</a>
                                <form action="{{ route('karyawan.destroy',$karyawans->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge badge-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

{{-- </div> --}}

@endsection
