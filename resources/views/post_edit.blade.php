@extends('master')
@section('title', 'Edit Post - Kabar Burung')

@section('body')
<div class="mt-4 mb-4">
    <h1>Edit Post</h1>
    <hr>

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib ada untuk proses update/put di Laravel -->

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label for="published" class="form-label">Published (Status)</label>
            <select class="form-control" id="published" name="published" required>
                <option value="Yes" {{ $post->published == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ $post->published == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@stop