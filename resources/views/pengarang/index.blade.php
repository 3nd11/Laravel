@extends('layouts.index')
@section('content')
@php
    $ar_judul = ['No','Nama','Email','HP','Foto','Action'];
    $no = 1;
@endphp
    <h3>Daftar Pengarang</h3>
    <a class="btn btn-primary btn-md" href="{{ route('pengarang.create') }}" role="button">Tambah Data</a>
    <br/>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($ar_judul as $jud)
                    <th>{{ $jud }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_pengarang as $pg)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pg->nama }}</td>
                    <td>{{ $pg->email }}</td>
                    <td>{{ $pg->hp }}</td>
                    <td width="15%" align="center">
                        @php
                        if(!empty($pg->foto)) {
                        @endphp
                            <img src="{{ asset('img')}}/{{ $pg->foto }}" width="50%" />
                        @php
                        } else {
                        @endphp
                            <img src="{{ asset('img')}}/kosong.png" width="50%" />
                        @php
                        }
                        @endphp
                    </td>
                    <td>
                        <form method="POST" action="{{ route('pengarang.destroy',$pg->id) }}">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info" href="{{ route('pengarang.show',$pg->id) }}">Detail</a>
                            <a class="btn btn-warning" href="{{ route('pengarang.edit',$pg->id) }}">Ubah</a>
                            <button class="btn btne-danger" onclick="return confirm('Data ini akan hilang, Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection