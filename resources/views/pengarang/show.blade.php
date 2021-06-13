@extends('layouts.index')
@section('content')
    @foreach ($ar_pengarang as $pg)
        <div class="card" style="width: 22rem;">
            @php
            if(!empty($pg->foto)) {
            @endphp
                <img src="{{ asset('img')}}/{{ $pg->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('img')}}/kosong.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title">{{ $pg->nama }}</h5>
                <p class="card-text">
                    Email : {{ $pg->email }}
                    <br/>HP : {{ $pg->hp }}
                </p>
                <a href="{{ url('/pengarang') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    @endforeach
@endsection