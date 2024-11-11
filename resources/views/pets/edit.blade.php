@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edytuj Zwierzaka</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pets.update', $pet['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id">ID Zwierzaka:</label>
                <input type="number" name="id" id="id" class="form-control" value="{{ $pet['id'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $pet['name'] }}"
                    required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="available" {{ $pet['status'] == 'available' ? 'selected' : '' }}>Dostępny</option>
                    <option value="pending" {{ $pet['status'] == 'pending' ? 'selected' : '' }}>Oczekujący</option>
                    <option value="sold" {{ $pet['status'] == 'sold' ? 'selected' : '' }}>Sprzedany</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Zapisz Zmiany</button>
        </form>
    </div>
@endsection
