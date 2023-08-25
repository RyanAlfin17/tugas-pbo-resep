    @extends('index')

    @section('title', 'Edit Resep')
    @section('content-title', 'Edit Resep')

    @section('editresep')
        <main>
            <div class="container">
                <form action="{{ route('updateresep', ['id' => $recipe->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Nama Resep:</label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="{{ $recipe->title }}" max="50" required>
                        </div>
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Foto Makanan:</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label">Deskripsi:</label>
                            <textarea id="description" name="description" rows="4" class="form-control" required>{{ $recipe->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="ingredient" class="form-label">Bahan-bahan:</label>
                            <textarea id="ingredient" name="ingredient" rows="4" class="form-control" required>{{ $recipe->ingredient }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="instruction" class="form-label">Langkah-langkah:</label>
                            <textarea id="instruction" name="instruction" rows="6" class="form-control" required>{{ $recipe->instruction }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    @endsection
