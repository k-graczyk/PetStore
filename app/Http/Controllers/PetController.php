<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Requests\SearchPetRequest;
use App\Services\PetService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PetController extends Controller
{
    protected PetService $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function index(): RedirectResponse|View
    {
        $pets = $this->petService->getPetsByStatus('available');

        if ($pets !== null) {
            return view('pets.index', compact('pets'));
        }

        return back()->withErrors('Nie udało się pobrać listy zwierząt.');
    }

    public function show(int $id): RedirectResponse|View
    {
        $pet = $this->petService->getPetById($id);

        if ($pet !== null) {
            return view('pets.show', compact('pet'));
        }

        return redirect()->route('pets.index')->withErrors('Nie udało się pobrać danych zwierzaka.');
    }

    public function create(): View
    {
        return view('pets.create');
    }

    public function store(StorePetRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($this->petService->createPet($data)) {
            return redirect()->route('pets.index')->with('status', 'Zwierz dodany pomyślnie.');
        }

        return back()->withErrors('Nie udało się dodać zwierzaka.');
    }

    public function edit(int $id): RedirectResponse|View
    {
        $pet = $this->petService->getPetById($id);

        if ($pet !== null) {
            return view('pets.edit', compact('pet'));
        }

        return redirect()->route('pets.index')->withErrors('Nie udało się pobrać danych zwierzaka.');
    }

    public function update(UpdatePetRequest $request, int $id): RedirectResponse
    {
        $data = $request->validated();

        if ($this->petService->updatePet($id, $data)) {
            return redirect()->route('pets.index')->with('status', 'Zwierz zaktualizowany pomyślnie.');
        }

        return back()->withErrors('Nie udało się zaktualizować zwierzaka.');
    }

    public function destroy(int $id): RedirectResponse
    {
        if ($this->petService->deletePet($id)) {
            return redirect()->route('pets.index')->with('status', 'Zwierz usunięty pomyślnie.');
        }

        return back()->withErrors('Nie udało się usunąć zwierzaka.');
    }

    public function searchForm(): View
    {
        return view('pets.search');
    }

    public function search(SearchPetRequest $request): RedirectResponse|View
    {
        $request->validated();
        $id = $request->input('id');
        $status = $request->input('status');

        if ($id) {
            $result = $this->petService->getPetById($id);

            if ($result !== null) {
                return view('pets.search_results', compact('result', 'id'));
            }

            return back()->withErrors('Nie znaleziono zwierzaka o podanym ID.');
        } elseif ($status) {
            $result = $this->petService->getPetsByStatus($status);

            if ($result !== null) {
                return view('pets.search_results', compact('result', 'status'));
            }

            return back()->withErrors('Nie udało się znaleźć zwierząt o podanym statusie.');
        } else {
            return back()->withErrors('Wprowadź ID lub wybierz status.');
        }
    }
}
