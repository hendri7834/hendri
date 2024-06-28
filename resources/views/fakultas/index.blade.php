<!-- resources/views/fakultas/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Fakultas')

@section('content_header')
    <h1>Fakultas</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('fakultas.create') }}" class="btn btn-light mb-3">Tambah Fakultas</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Fakultas</th>
                        <th>Pimpinan Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fakultas as $f)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $f->nama_fakultas }}</td>
                        <td>{{ $f->pimpinan_fakultas }}</td>
                        <td>
                            <a href="{{ route('fakultas.edit', $f->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('fakultas.destroy', $f->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection