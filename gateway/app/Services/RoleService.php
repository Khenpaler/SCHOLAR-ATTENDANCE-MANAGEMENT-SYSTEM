<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class RoleService
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

    public function obtainRole()
    {
        return $this->performRequest('GET', '/role');
    }

   public function createRole($data)
    {
        return $this->performRequest('POST', '/role', $data);
    }


    public function showRole($id)
    {
    return $this->performRequest('GET', "/role/{$id}");
    }
    public function updateRole($data, $id)
    {
        return $this->performRequest('PUT', "/role/{$id}", $data);
    }
    public function deleteRole($id)
    {
        return $this->performRequest('DELETE', "/role/{$id}");
    }

}
