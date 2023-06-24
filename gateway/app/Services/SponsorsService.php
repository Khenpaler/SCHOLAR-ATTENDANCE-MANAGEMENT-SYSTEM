<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class SponsorsService
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

    public function obtainSponsors()
    {
        return $this->performRequest('GET', '/sponsors');
    }

   public function createSponsors($data)
    {
        return $this->performRequest('POST', '/sponsors', $data);
    }


    public function showSponsors($id)
    {
    return $this->performRequest('GET', "/sponsors/{$id}");
    }
    public function updateSponsors($data, $id)
    {
        return $this->performRequest('PUT', "sponsors/{$id}", $data);
    }
    public function deleteSponsors($id)
    {
        return $this->performRequest('DELETE', "/sponsors/{$id}");
    }

}
