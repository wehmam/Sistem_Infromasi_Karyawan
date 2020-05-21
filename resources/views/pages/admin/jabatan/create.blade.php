@extends('layouts.master')
@section('title','create')
@section('jabatan','active')

@section('content')
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Form Tambah Data Jabatan</h3>
            </div>
        </div>
       <hr>
       <div class="row">
           <div class="col-md-5">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
               </form>
           </div>
       </div>
    </div>
</section>
@endsection