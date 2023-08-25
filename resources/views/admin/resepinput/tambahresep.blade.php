@extends('index')

@section('title', 'Tambah Resep')
@section('content-title', 'Tambah Resep')

@section('tambahresep')

    <main>
        <div class="container">
            <form id="recipe-form" method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Nama Resep:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="photo" class="form-label">Foto Makanan:</label>
                        <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="description" class="form-label">Deskripsi:</label>
                        <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="ingredient" class="form-label">Bahan-bahan:</label>
                        <textarea id="ingredient" name="ingredient" rows="4" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="instruction" class="form-label">Langkah-langkah:</label>
                        <textarea id="instruction" name="instruction" rows="6" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Tambah Resep</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
