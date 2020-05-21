@extends('layouts.master')
@section('title','edit')
@section('Pendidikan','active')

@section('content')
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Form Edit Data Pendidikan</h3>
            </div>
        </div>
       <hr>
       <div class="row">
           <div class="col-md-5">
               <form action="{{ route('pendidikan.update',$pendidikan->id) }}" method="post">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <label for="pendidikan">Nama pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                            @foreach($daftar as $item)
                                <option value="{{ $item }}" {{ old('pendidikan') ?? $pendidikan->pendidikan === $item ? 'selected' : '' }}>{{ $item }}</option>
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
</section>
@endsection