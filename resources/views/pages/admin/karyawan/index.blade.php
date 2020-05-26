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
    <div class="container-fluid">
        <table id="example" class="table table-striped display nowrap" style="width:100%">
            {{-- <a href="" class="float-right btn btn-primary"><i class="fa fa-plus"> Add Data</i></a> --}}
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
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
                    <td><a href="{{ route('karyawan.edit',$karyawans->id,'edit') }}" class="mr-2 badge-info badge">
                        Edit</a></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $karyawans->nama }}</td>
                    <td>{{ $karyawans->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                    <td>{{ $karyawans->telepon->nomer_telepon }}</td>
                    <td>{{ $karyawans->status->status }}</td>
                    <td>{{ $karyawans->jabatan->jabatan }}</td>
                    <td>{{ $karyawans->pendidikan->pendidikan }}</td>
                    <td>{{ $karyawans->tanggal_masuk }}</td>
                    <td>
                        {{-- <div class="btn-group"> --}}
                                
                            <form action="{{ route('karyawan.destroy',$karyawans->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge badge-danger">Hapus</button>
                            </form>
                        {{-- </div> --}}
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</section>

{{-- </div> --}}

@endsection

@push('data')

<script>
    $(document).ready(function() {
     $('#example').DataTable( {
         responsive: {
             details: {
                 type: 'column',
                 target: 'tr'
             }
         },
         columnDefs: [ {
             className: 'details-control',
             orderable: false,
             targets:   0
         } ],
         order: [ 1, 'asc' ]
     } );
  } );
  </script>
@endpush

{{-- <tbody> --}}

    {{-- @foreach($karyawan as $karyawans)
        <tr>
            <th></th>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('edit') }}" class="badge badge-success"></a></td>
            <td>{{ $karyawans->nama }}</td>
            <td>{{ $karyawans->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
            <td>{{ $karyawans->telepon->nomer_telepon }}</td>
            <td>{{ $karyawans->jabatan->jabatan }}</td>
            <td>{{ $karyawans->status->status }}</td>
            <td>{{ $karyawans->tanggal_masuk }}</td>
           
        </tr>
    @endforeach
</tbody> --}}