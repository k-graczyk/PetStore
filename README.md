# Laravel PetStore API Client

Ta aplikacja Laravel jest klientem do interakcji z API PetStore. Umożliwia zarządzanie zwierzętami przez tworzenie, przeglądanie, aktualizowanie oraz usuwanie rekordów. Aplikacja komunikuje się z zewnętrznym API ([Swagger PetStore API](https://petstore.swagger.io)), aby wykonać te operacje.

## Wymagania wstępne

- **Laravel**: Projekt wymaga Laravel 8 lub nowszego.
- **PHP**: Upewnij się, że system posiada PHP w wersji 7.4 lub wyższej.
- **Composer**: Zainstaluj Composer do zarządzania zależnościami PHP.

## Konfiguracja

1. Sklonuj repozytorium:
   ```bash
   git clone https://github.com/k-graczyk/PetStore.git
   cd PetStore
   ```

2. Zainstaluj zależności:
   ```bash
   composer install
   ```

3. Skopiuj plik konfiguracyjny `.env`:
   ```bash
   cp .env.example .env
   ```

4. Skonfiguruj klucz aplikacji:
   ```bash
   php artisan key:generate
   ```

5. **WAŻNE**: Skonfiguruj następujące zmienne w pliku `.env`:
   ```env
   PETSTORE_TOKEN="special-key"
   PETSTORE_URL="https://petstore.swagger.io/v2/"
   ```

6. Uruchom migracje:
   ```bash
   php artisan migrate
   ```

7. Uruchom serwer deweloperski:
   ```bash
   php artisan serve
   ```

## Funkcjonalność aplikacji

Aplikacja umożliwia użytkownikowi:

- Dodawanie nowego zwierzaka.
- Przeglądanie listy zwierząt.
- Wyświetlanie szczegółów wybranego zwierzaka.
- Aktualizowanie danych zwierzaka.
- Usuwanie zwierzaka.
- Wyszukiwanie zwierząt po statusie lub ID.

## Dokumentacja API

### Endpoints

#### 1. Pobranie listy zwierząt po statusie
- **Endpoint**: `/pets`
- **Metoda**: `GET`
- **Parametry zapytania**: `status` (dostępne wartości: `available`, `pending`, `sold`)
- **Opis**: Zwraca listę zwierząt o podanym statusie.

#### 2. Wyświetlenie szczegółów zwierzaka
- **Endpoint**: `/pets/{id}`
- **Metoda**: `GET`
- **Parametry**: `id` (ID zwierzaka)
- **Opis**: Zwraca szczegóły wybranego zwierzaka.

#### 3. Dodanie nowego zwierzaka
- **Endpoint**: `/pets`
- **Metoda**: `POST`
- **Parametry**:
  - `name` (string) - Nazwa zwierzaka
  - `status` (string) - Status zwierzaka (`available`, `pending`, `sold`)
- **Opis**: Dodaje nowego zwierzaka.

#### 4. Aktualizacja danych zwierzaka
- **Endpoint**: `/pets/{id}`
- **Metoda**: `PUT`
- **Parametry**:
  - `name` (string) - Nazwa zwierzaka
  - `status` (string) - Status zwierzaka (`available`, `pending`, `sold`)
- **Opis**: Aktualizuje dane wybranego zwierzaka.

#### 5. Usunięcie zwierzaka
- **Endpoint**: `/pets/{id}`
- **Metoda**: `DELETE`
- **Parametry**: `id` (ID zwierzaka)
- **Opis**: Usuwa zwierzaka o podanym ID.

#### 6. Wyszukiwanie zwierzaka
- **Endpoint**: `/pets/search`
- **Metoda**: `GET`
- **Parametry**:
  - `id` (optional, integer) - ID zwierzaka
  - `status` (optional, string) - Status zwierzęcia (`available`, `pending`, `sold`)
- **Opis**: Umożliwia wyszukiwanie zwierząt po ID lub statusie.

## Uwagi

Aby aplikacja działała poprawnie, upewnij się, że konfiguracja API w `.env` jest prawidłowa:
```env
PETSTORE_TOKEN="special-key"
PETSTORE_URL="https://petstore.swagger.io/v2/"
```
