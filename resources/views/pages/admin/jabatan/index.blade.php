@extends('layouts.master')
@section('title','home')
@section('jabatan','active')
@section('content')

@include('includes.admin.header')

<!-- Content Header (Page header) -->
<section class="content">
    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            {{-- <a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-2">Add Data</a> --}}
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData">Add Data</button>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jabatan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if($item->id == 1)
                        <td>
                            <b class=" badge badge-info">{{ $item->jabatan }}</b>
                        </td>
                    @elseif($item->id == 2)
                        <td>
                            <b class=" badge badge-success">{{ $item->jabatan }}</b>
                        </td>                        
                    @else
                        <td> 
                           <b class=" badge badge-secondary">{{ $item->jabatan }}</b>
                        </td>
                    @endif

                    <td>
                        <div class="btn-group">
                        <a href="{{ route('jabatan.edit',$item->id,'edit') }}" class="btn">
                            <i class="fa fa-edit mr-3"></i>
                        </a>
                        <div class="btn">
                            <form action="{{ route('jabatan.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash" onclick="return confirm('Yakin Ingin Menghapus Data {{ $item->jabatan }}?')"></button>
                            </form>
                        </div>
                        </div>
                    </td>
                @empty
                    <td class="text-center" colspan="6"></td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="row">
            <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jabatan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                       <form action="{{ route('jabatan.store') }}" method="post">
                                @csrf 
                                <div class="form-group">
                                    <label for="jabatan">Nama Jabatan</label>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}">
                                    @error('jabatan')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send message</button>
                                </div>
                        </form>
                    </div>         
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection