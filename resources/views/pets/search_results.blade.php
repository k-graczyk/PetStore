@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Wyniki Wyszukiwania</h2>
        @if (is_array($result) && $status)
            <!-- Wyświetlenie wyników wyszukiwania po statusie -->
            @if (count($result) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $pet)
                            <tr>
                                <td>{{ $pet['id'] }}</td>
                                <td>{{ $pet['name'] ?? 'N/A' }}</td>
                                <td>{{ ucfirst($pet['status']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Brak wyników dla wybranego statusu.</p>
            @endif
        @elseif($result && $id)
            <!-- Wyświetlenie wyników wyszukiwania po ID -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ID: {{ $result['id'] }}</h5>
                    <p class="card-text"><strong>Nazwa:</strong> {{ $result['name'] ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ ucfirst($result['status']) }}</p>
                </div>
            </div>
        @else
            <p>Brak wyników wyszukiwania.</p>
        @endif

        <a href="{{ route('pets.searchForm') }}" class="btn btn-secondary mt-3">Wróć do wyszukiwania</a>
    </div>
@endsection
