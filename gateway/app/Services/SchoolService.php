<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class SchoolService
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

    public function obtainSchool()
    {
        return $this->performRequest('GET', '/school');
    }

   public function createSchool($data)
    {
        return $this->performRequest('POST', '/school', $data);
    }


    public function showSchool($id)
    {
    return $this->performRequest('GET', "/school/{$id}");
    }
    public function updateSchool($data, $id)
    {
        return $this->performRequest('PUT', "/school/{$id}", $data);
    }
    public function deleteSchool($id)
    {
        return $this->performRequest('DELETE', "/school/{$id}");
    }

}
