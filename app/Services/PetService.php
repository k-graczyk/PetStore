<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PetService
{
    public function getPetsByStatus(string $status): ?array
    {
        $response = Http::apiClient()->get('pet/findByStatus', ['status' => $status]);
        return $response->successful() ? $response->json() : null;
    }

    public function getPetById(int $id): ?array
    {
        $response = Http::apiClient()->get("pet/{$id}");
        return $response->successful() ? $response->json() : null;
    }

    public function createPet(array $data): bool
    {
        $response = Http::apiClient()->post('pet', $data);
        return $response->successful();
    }

    public function updatePet(int $id, array $data): bool
    {
        $data['id'] = $id;
        $response = Http::apiClient()->put("pet", $data);
        return $response->successful();
    }

    public function deletePet(int $id): bool
    {
        $response = Http::apiClient()->delete("pet/{$id}");
        return $response->successful();
    }
}
