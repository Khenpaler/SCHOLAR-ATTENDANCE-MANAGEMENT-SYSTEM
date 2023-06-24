<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class ScholarsService
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
        $this->baseUri = config('services.scholars.base_uri');
        $this->secret = config('services.scholars.secret');
    }

    public function obtainScholars()
    {
        return $this->performRequest('GET', '/scholars');
    }

   public function createScholars($data)
    {
        return $this->performRequest('POST', '/scholars', $data);
    }


    public function showScholars($id)
    {
    return $this->performRequest('GET', "/scholars/{$id}");
    }
    public function updateScholars($data, $id)
    {
        return $this->performRequest('PUT', "/scholars/{$id}", $data);
    }
    public function deleteScholars($id)
    {
        return $this->performRequest('DELETE', "/scholars/{$id}");
    }

}
