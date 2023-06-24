<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class UserService
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
        $this->baseUri = config('services.user.base_uri');
        $this->secret = config('services.user.secret');
    }

    public function obtainUser()
    {
        return $this->performRequest('GET', '/user');
    }

   public function createUser($data)
    {
        return $this->performRequest('POST', '/user', $data);
    }


    public function showUser($id)
    {
    return $this->performRequest('GET', "/user/{$id}");
    }
    public function updateUser($data, $id)
    {
        return $this->performRequest('PUT', "/user/{$id}", $data);
    }
    public function deleteUser($id)
    {
        return $this->performRequest('DELETE', "/user/{$id}");
    }

}
