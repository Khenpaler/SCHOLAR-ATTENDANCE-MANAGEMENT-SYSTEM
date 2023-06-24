<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class VenueService
{
    use ConsumesExternalService;

    public $baseUri;
    /**
     * The secret to consume the User1 Service
     * @var string
     */
    
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.event.base_uri');
        $this->secret = config('services.event.secret');
    }

    public function obtainVenue()
    {
        return $this->performRequest('GET', '/venue');
    }

   public function createVenue($data)
    {
        return $this->performRequest('POST', '/venue', $data);
    }


    public function showVenue($id)
    {
    return $this->performRequest('GET', "/venue/{$id}");
    }
    public function updateVenue($data, $id)
    {
        return $this->performRequest('PUT', "/venue/{$id}", $data);
    }
    public function deleteVenue($id)
    {
        return $this->performRequest('DELETE', "/venue/{$id}");
    }

}
