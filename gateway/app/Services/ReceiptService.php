<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class ReceiptService
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

    public function obtainReceipt()
    {
        return $this->performRequest('GET', '/receipt');
    }

   public function createReceipt($data)
    {
        return $this->performRequest('POST', '/receipt', $data);
    }


    public function showReceipt($id)
    {
    return $this->performRequest('GET', "/receipt/{$id}");
    }
    public function updateReceipt($data, $id)
    {
        return $this->performRequest('PUT', "/receipt/{$id}", $data);
    }
    public function deleteReceipt($id)
    {
        return $this->performRequest('DELETE', "/receipt/{$id}");
    }

}
