@extends('adminlte::page')

@section('title', 'Program Studi')

@section('content_header')
    <h1>Program Studi</h1>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('program-studi.create') }}" class="btn btn-light mb-3">Tambah Program Studi</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Prodi</th>
                        <th>Nama Prodi</th>
                        <th>Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programStudis as $ps)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ps->kode_prodi }}</td>
                        <td>{{ $ps->nama_prodi }}</td>
                        <td>{{ $ps->fakultas->nama_fakultas }}</td>
                        <td>
                            <a href="{{ route('program-studi.edit', $ps->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('program-studi.destroy', $ps->id) }}" method="POST" class="d-inline">
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


@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop