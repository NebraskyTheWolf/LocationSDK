<?php

namespace Fluffici\SDK\Geo;

use Exception;
use Fluffici\SDK\Geo\Partials\PartialLocation;
use Fluffici\SDK\Geo\Partials\PartialMatcher;
use Httpful\Request;
use Fluffici\SDK\LocationSDK;

class Location
{
    private LocationSDK $client;

    public function __construct(LocationSDK $client)
    {
        $this->client = $client;
    }

    /**
     * Method to match a postal code with an associated country.
     *
     * @param string $country The country to match the postal code against.
     * @param string $postalCode The postal code to match.
     * @return PartialMatcher The matching result. If a match is found, it returns a PartialMatcher object with the matching details.
     * If no match is found, it returns a PartialMatcher object with false as the matching result.
     */
    public function match(string $country, string $postalCode): PartialMatcher
    {
        $response = Request::get($this->buildUrlWithQueryParams($this->client->getEndpoint() . '/postal/match', [
            'country' => $country,
            'postal_code' => $postalCode,
        ]))->expectsJson()->send();

        if ($response->code === 200) {
            $body = json_decode(json_encode($response->body), true);

            return new PartialMatcher($body['matching']);
        }

        return new PartialMatcher(false);
    }

    /*
     *   public $fillable = [
        'country_code',
        'postal_code',
        'city',
        'district',
        'latitude',
        'longitude'
    ];

     */

    /**
     * Find a partial location based on the country and postal code.
     *
     * @param string $country The country of the location.
     * @param string $postalCode The postal code of the location.
     *
     * @return PartialLocation|null The found partial location, or null if not found.
     */
    public function find(string $country, string $postalCode): PartialLocation|null
    {
        $response = Request::get($this->buildUrlWithQueryParams($this->client->getEndpoint() . '/postal/find', [
            'country' => $country,
            'postal_code' => $postalCode,
        ]))->expectsJson()->send();

        if ($response->code === 200) {
            $body = json_decode(json_encode($response->body), true);

            return new PartialLocation(
                $body['country_code'],
                $body['postal_code'],
                $body['city'],
                $body['district'],
                $body['longitude'],
                $body['latitude'],
            );
        }

        return null;
    }

    /**
     * Build the URL from a string and add query parameters from an array.
     *
     * @param string $url The base URL.
     * @param array $queryParams An array of query parameters to add to the URL.
     *
     * @return string The resulting URL with query parameters added.
     */
    private function buildUrlWithQueryParams(string $url, array $queryParams): string
    {
        $queryString = http_build_query($queryParams);
        return $url . '?' . $queryString;
    }
}
