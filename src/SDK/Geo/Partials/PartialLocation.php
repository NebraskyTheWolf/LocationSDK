<?php

namespace Fluffici\SDK\Geo\Partials;

class PartialLocation
{
    private string $country;
    private string $postalCode;
    private string $city;
    private string $district;
    private mixed $longitude;
    private mixed $latitude;

    public function __construct(string $country, string $postalCode, string $city, string $district, mixed $longitude, mixed $latitude)
    {
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->district = $district;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    /**
     * Retrieves the country of the current object.
     *
     * @return string The country of the current object.
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Retrieves the postal code of the object.
     *
     * @return string The postal code.
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * Retrieves the city of the object.
     *
     * @return string The city of the object.
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Retrieves the district of the object.
     *
     * @return string The district of the object.
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * Get the longitude.
     *
     * @return mixed The longitude value.
     */
    public function getLongitude(): mixed
    {
        return $this->longitude;
    }

    /**
     * Get the latitude.
     *
     * @return mixed The latitude value.
     */
    public function getLatitude(): mixed
    {
        return $this->latitude;
    }
}
