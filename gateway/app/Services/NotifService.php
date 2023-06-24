<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class NotifService
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

    public function obtainNotif()
    {
        return $this->performRequest('GET', '/notif');
    }

   public function createNotif($data)
    {
        return $this->performRequest('POST', '/notif', $data);
    }


    public function showNotif($id)
    {
    return $this->performRequest('GET', "/notif/{$id}");
    }
    public function updateNotif($data, $id)
    {
        return $this->performRequest('PUT', "/notif/{$id}", $data);
    }
    public function deleteNotif($id)
    {
        return $this->performRequest('DELETE', "/notif/{$id}");
    }

}
