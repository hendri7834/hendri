@extends('adminlte::page')

@section('title', 'Edit Fakultas')

@section('content_header')
    <h1>Edit Fakultas</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                    <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="{{ $fakultas->nama_fakultas }}" required>
                </div>
                <div class="mb-3">
                    <label for="pimpinan_fakultas" class="form-label">Pimpinan Fakultas</label>
                    <input type="text" class="form-control" id="pimpinan_fakultas" name="pimpinan_fakultas" value="{{ $fakultas->pimpinan_fakultas }}" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection