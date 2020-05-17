<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class CoordinatesToAddressService
{
    public function convert(string $location): string
    {
        $key = getenv('GOOGLE_API_KEY');
        $client = HttpClient::create();

        try {
            $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$location.'&key='.$key);
            $content = $response->getContent();
            $content = $response->toArray();
            $address = $content['results'][0]['formatted_address'];
        } catch (\Exception $e) {
            return $location;
        }
        
        return $address;
    }
}
