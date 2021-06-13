@extends('layouts.index')
@section('content')
    <h3>Form Edit Pengarang</h3>
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('pengarang.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Pengarang</label>
                <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Email Pengarang</label>
                <input type="text" name="email" value="{{ $rs->email }}" class="form-control"/>
            </div>
            <div class="form-group">
                <label>HP Pengarang</label>
                <input type="text" name="hp" value="{{ $rs->hp }}" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Foto Pengarang</label>
                <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Edit</button>
            <button type="reset" class="btn btn-danger" name="proses">Cancel</button>
        </form>
    @endforeach
@endsection