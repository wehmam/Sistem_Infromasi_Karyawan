@extends('layouts.master')
@section('title','home')
@section('Pendidikan','active')
@section('content')

@include('includes.admin.header')

<!-- Content Header (Page header) -->
<section class="content">
    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <a href="{{ route('pendidikan.create') }}" class="btn btn-primary mb-2">Add Data</a>
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
    </div>
</section>
@endsection