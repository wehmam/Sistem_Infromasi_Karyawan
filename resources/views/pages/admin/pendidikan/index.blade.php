@extends('layouts.master')
@section('title','home')
@section('Pendidikan','active')
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
                    <th>Pendidikan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendidikan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>
                        <div class="btn-group">
                        <a href="{{ route('pendidikan.edit',$item->id,'edit') }}" class="btn">
                            <i class="fa fa-edit mr-3"></i>
                        </a>
                        <div class="btn">
                            <form action="{{ route('pendidikan.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash" onclick="return confirm('Yakin Ingin Menghapus Data {{ $item->pendidikan }}?')"></button>
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
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pendidikan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('pendidikan.store') }}" method="post">
                            @csrf 
                            <div class="form-group">
                                <label for="pendidikan">Nama pendidikan</label>
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    @foreach($daftar as $pendidikan)
                                        <option value="{{ $pendidikan }}">{{ $pendidikan }}</option>
                                    @endforeach
                                </select>
                                @error('pendidikan')
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