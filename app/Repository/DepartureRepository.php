<?php

namespace App\Repository;

use App\RepositoryInterface\DepartureRepositoryInterface;
use Illuminate\Support\Facades\Http;

/**
 * Clase encargada de realizar las interacciones con la API 
 */
class DepartureRepository implements DepartureRepositoryInterface
{

    const DEPARTURE_PATH = '/locations/query';
    public string $apiUrl;
    protected string $token;



    public function __construct()
    {
        $this->apiUrl = env('APP_API_URL', "https://digi-api.com/api/v1/digimon");
        $this->token = env('APP_API_TOKEN');
    }

    /**
     * Generate the Headers
     *
     * @return array
     */
    private function generateHeaders()
    {
        return [
            'apikey' => $this->token,
            'accept' => 'application/json',
        ];
    }

    /**
     * Extrae el listado de digimons de acuerdo a la pagina solicitada
     *
     * @param integer $page
     * @return array
     */
    public function query(string $query = '')
    {
        $response = Http::withHeaders($this->generateHeaders())->get($this->apiUrl . self::DEPARTURE_PATH,  [
            'term' => $query,
            'locale' => 'es-ES',
            'location_types' => 'city'
        ]);



        if ($response->successful()) {
            return $response->json('locations');
        }

        return [];
    }
}
