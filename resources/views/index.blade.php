@extends('master')
@section('title', 'Halaman Utama Portal - Kabar Burung')

@section('body')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Portal - Kabar Burung</h1>
        <a href="{{ route('post.create') }}" class="btn btn-success">+ Tambah Post</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th>Title</th>
                    <th style="width: 12%">Published</th>
                    <th style="width: 15%">Tanggal</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->published }}</td>
                    <td>{{ $item->created_at ? $item->created_at->format('M d, Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('post.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('post.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('post.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
@stop