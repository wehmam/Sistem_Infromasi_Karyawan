@extends('layouts.master')
@section('title','Status')
@section('status','active')
@section('content')

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <button type="button" data-target="#tambahData" class="btn btn-primary mb-2 float-right" data-toggle="modal"><i class="fa fa-plus"> Add data</i></button>
        </div>
    </div>
    <hr>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content">
    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($status as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <div class="btn-group">
                        <a href="{{ route('status.edit',$item->id,'edit') }}" class="btn">
                            <i class="fa fa-edit mr-3"></i>
                        </a>
                        <div class="btn">
                            <form action="{{ route('status.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash" onclick="return confirm('Yakin Ingin Menghapus Data {{ $item->status }}?')"></button>
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
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Status</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('status.store') }}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="status">Nama status</label>
                                <select name="status" id="status" class="form-control">
                                    @foreach($daftar as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                       </form>
                    </div>         
                  </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection