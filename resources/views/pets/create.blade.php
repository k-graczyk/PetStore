@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dodaj Nowego Zwierzaka</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">ID Zwierzaka:</label>
                <input type="number" name="id" id="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="available">Dostępny</option>
                    <option value="pending">Oczekujący</option>
                    <option value="sold">Sprzedany</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Dodaj Zwierzaka</button>
        </form>
    </div>
@endsection
