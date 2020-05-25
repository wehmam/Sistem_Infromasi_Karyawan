@extends('layouts.master')
@section('title','edit')
@section('status','active')

@section('content')
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Form Edit Data Status</h3>
            </div>
        </div>
       <hr>
       <div class="row">
           <div class="col-md-5">
               <form action="{{ route('status.update',$status->id) }}" method="post">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Nama status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            @foreach($daftar as $item)
                                <option value="{{ $item }}" {{ old('status') ?? $status->status  == $item ? 'selected' : '' }}>{{ $item }}</option>
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
</section>
@endsection