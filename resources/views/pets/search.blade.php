@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Wyszukaj Zwierzaka</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pets.search') }}" method="GET">
            <div class="form-group">
                <label for="id">Wyszukaj po ID:</label>
                <input type="number" name="id" id="id" class="form-control" placeholder="Podaj ID zwierzaka">
            </div>

            <div class="form-group">
                <label for="status">Wyszukaj po statusie:</label>
                <select name="status" id="status" class="form-control">
                    <option value="">Wybierz status</option>
                    <option value="available">Dostępny</option>
                    <option value="pending">Oczekujący</option>
                    <option value="sold">Sprzedany</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Wyszukaj</button>
        </form>
    </div>
@endsection
