@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Szczegóły Zwierzaka</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nazwa: {{ $pet['name'] }}</h5>
                <p class="card-text"><strong>ID:</strong> {{ $pet['id'] }}</p>
                <p class="card-text"><strong>Status:</strong> {{ ucfirst($pet['status']) }}</p>

                <a href="{{ route('pets.edit', $pet['id']) }}" class="btn btn-warning">Edytuj</a>

                <form action="{{ route('pets.destroy', $pet['id']) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Czy na pewno chcesz usunąć tego zwierzaka?')">Usuń</button>
                </form>
            </div>
        </div>
    </div>
@endsection
