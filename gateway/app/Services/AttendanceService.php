<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class AttendanceService
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
        $this->baseUri = config('services.attendance.base_uri');
        $this->secret = config('services.attendance.secret');
    }

    public function obtainAttendance()
    {
        return $this->performRequest('GET', '/attendance');
    }

   public function createAttendance($data)
    {
        return $this->performRequest('POST', '/attendance', $data);
    }


    public function showAttendance($id)
    {
    return $this->performRequest('GET', "/attendance/{$id}");
    }
    public function updateAttendance($data, $id)
    {
        return $this->performRequest('PUT', "/attendance/{$id}", $data);
    }
    public function deleteAttendance($id)
    {
        return $this->performRequest('DELETE', "/attendance/{$id}");
    }

}
