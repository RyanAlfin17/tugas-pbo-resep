@extends('index')

@section('title', 'Detail Resep')
@section('content-title', 'Detail Resep')

@section('detailresep')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $recipe->photo }}" class="img-fluid rounded-start" alt="Foto Resep">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="mt-4">Judul</h6>
                        <h2 class="card-title">{{ $recipe->title }}</h2>
                        <h6 class="mt-4">Deskripsi</h6>
                        <p class="card-text">{{ $recipe->description }}</p>
                        <h6 class="mt-4">Bahan</h6>
                        <ul class="list-group">
                            @foreach (explode(',', $recipe->ingredient) as $ingredient)
                                <li class="list-group-item">{{ $ingredient }}</li>
                            @endforeach
                        </ul>
                        <h6 class="mt-4" lang="en">Langkah-langkah</h6>
                        <ol class="list-group">
                            @foreach (explode('.', $recipe->instruction) as $step)
                                <li class="list-group-item">{{ $step }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('indexresep') }}" class="btn btn-secondary mt-4">Kembali</a>
    </div>
@endsection
