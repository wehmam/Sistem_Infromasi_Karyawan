@extends('layouts.master')
@section('title','home')
@section('jabatan','active')
@section('content')

@include('includes.admin.header')

<!-- Content Header (Page header) -->
<section class="content">
    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-2">Add Data</a>
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
                    @if($item->jabatan == 'Fullstack Dev')
                        <td>
                            <b class=" badge badge-info">{{ $item->jabatan }}</b>
                        </td>
                    @elseif($item->jabatan == 'Web Developer')
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
    </div>
</section>
@endsection