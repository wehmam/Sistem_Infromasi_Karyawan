@extends('layouts.master')
@section('title','Edit Data')
@section('karyawan','active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3>Form Edit Data</h3>
                </div>
            </div>
           <hr>
           <div class="row">
               <div class="col-md-12">
                   <form action="{{ route('karyawan.update',$karyawan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama') ?? $karyawan->nama }}" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="L" {{ old('jenis_kelamin') == $karyawan->jenis_kelamin ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == $karyawan->jenis_kelamin ? 'selected' : '' }}>Perempuan</option>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="jabatan_id">Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-control ">
                                    @foreach ($jabatan as $item)
                                        <option value="{{ $item->id }}" {{ old('jabatan_id') ?? $karyawan->jabatan_id === $item->id ? 'selected' : '' }}>{{ $item->jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    @foreach($status as $status)
                                        <option value="{{ $status }}" {{ old('status') ?? $karyawan->status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') ?? $karyawan->tanggal_masuk }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="nomer_telepon">Nomer Telepon</label>
                                <input type="text" name="nomer_telepon" id="nomer_telepon" class="form-control @error('nomer_telepon') is-invalid @enderror" value="{{ old('nomer_telepon') ?? $karyawan->telepon->nomer_telepon }}">
                                @error('nomer_telepon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info mt-4">Submit</button>
                   </form>
               </div>
           </div>
        </div>
    </section>
@endsection
