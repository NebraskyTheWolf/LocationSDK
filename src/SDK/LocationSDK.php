<?php

namespace Fluffici\SDK;

use Fluffici\SDK\Geo\Location;

class LocationSDK
{

    private string $endpoint = 'https://api.fluffici.eu/api';
    private string $bearerToken = '';


    /**
     * Set the bearer token for authentication.
     *
     * @param string $bearerToken The bearer token to be set.
     * @return LocationSDK Returns the LocationSDK object for method chaining.
     */
    public function setBearerToken(string $bearerToken): LocationSDK
    {
        $this->bearerToken = $bearerToken;

        return $this;
    }

    /**
     * Sets the endpoint for the LocationSDK.
     *
     * @param string $endpoint The endpoint to be set for the LocationSDK.
     * @return LocationSDK Returns an instance of the LocationSDK.
     */
    public function setEndpoint(string $endpoint): LocationSDK
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Get the bearer token for authentication.
     *
     * @return string The bearer token.
     */
    public function getBearerToken(): string
    {
        return $this->bearerToken;
    }


    /**
     * Retrieve the endpoint for API calls.
     *
     * @return string The endpoint for API calls.
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Builds an Location object.
     *
     * @return Location The built Location object.
     */
    public function build(): Location
    {
        return new Location($this);
    }
}
