@extends('adminlte::page')

@section('title', 'Edit Program Studi')

@section('content_header')
    <h1>Edit Program Studi</h1>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('program-studi.update', $programStudi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode_prodi" class="form-label">Kode Prodi</label>
                    <input type="number" class="form-control" id="kode_prodi" name="kode_prodi" value="{{ $programStudi->kode_prodi }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_prodi" class="form-label">Nama Prodi</label>
                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="{{ $programStudi->nama_prodi }}" required>
                </div>
                <div class="mb-3">
                    <label for="kode_fakultas" class="form-label">Fakultas</label>
                    <select class="form-control" id="kode_fakultas" name="kode_fakultas" required>
                        @foreach ($fakultas as $f)
                            <option value="{{ $f->id }}" {{ $f->id == $programStudi->kode_fakultas ? 'selected' : '' }}>
                                {{ $f->nama_fakultas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('program-studi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection