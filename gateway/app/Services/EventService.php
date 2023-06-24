<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class EventService
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

    public function obtainEvent()
    {
        return $this->performRequest('GET', '/event');
    }

   public function createEvent($data)
    {
        return $this->performRequest('POST', '/event', $data);
    }


    public function showEvent($id)
    {
    return $this->performRequest('GET', "/event/{$id}");
    }
    public function updateEvent($data, $id)
    {
        return $this->performRequest('PUT', "event/{$id}", $data);
    }
    public function deleteEvent($id)
    {
        return $this->performRequest('DELETE', "/event/{$id}");
    }
    
}
