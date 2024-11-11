@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista Zwierząt</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">Dodaj Nowego Zwierzaka</a>

        @if (count($pets) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th>Status</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td>{{ $pet['id'] }}</td>
                            <td>{{ $pet['name'] ?? '' }}</td>
                            <td>{{ ucfirst($pet['status']) }}</td>
                            <td>
                                <a href="{{ route('pets.show', $pet['id']) }}" class="btn btn-info btn-sm">Szczegóły</a>
                                <a href="{{ route('pets.edit', $pet['id']) }}" class="btn btn-warning btn-sm">Edytuj</a>

                                <form action="{{ route('pets.destroy', $pet['id']) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Czy na pewno chcesz usunąć tego zwierzaka?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Brak dostępnych zwierząt.</p>
        @endif
    </div>
@endsection
