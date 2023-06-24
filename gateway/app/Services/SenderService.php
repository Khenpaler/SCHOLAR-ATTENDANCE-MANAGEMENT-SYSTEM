<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class SenderService
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
        $this->baseUri = config('services.notification.base_uri');
        $this->secret = config('services.notification.secret');
    }

    public function obtainSender()
    {
        return $this->performRequest('GET', '/sender');
    }

   public function createSender($data)
    {
        return $this->performRequest('POST', '/sender', $data);
    }


    public function showSender($id)
    {
    return $this->performRequest('GET', "/sender/{$id}");
    }
    public function updateSender($data, $id)
    {
        return $this->performRequest('PUT', "/sender/{$id}", $data);
    }
    public function deleteSender($id)
    {
        return $this->performRequest('DELETE', "/sender/{$id}");
    }

}
