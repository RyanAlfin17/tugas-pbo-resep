@extends('index')

@section('title', 'Resep')
@section('content-title', 'Data Resep')

@section('resepinput')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('tambahresep') }}" class="btn btn-primary">Tambah Resep Baru</a>
        </div>

        <div class="row">
            @foreach ($reseps as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <div class="button-container">
                                <a href="{{ route('showresep', ['id' => $item->id]) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('editresep', ['id' => $item->id]) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('deleteresep', ['id' => $item->id]) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this recipe?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
@endsection
