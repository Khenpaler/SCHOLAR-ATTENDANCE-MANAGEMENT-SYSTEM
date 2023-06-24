<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class CoursesService
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

    public function obtainCourses()
    {
        return $this->performRequest('GET', '/courses');
    }

   public function createCourses($data)
    {
        return $this->performRequest('POST', '/courses', $data);
    }


    public function showCourses($id)
    {
    return $this->performRequest('GET', "/courses/{$id}");
    }
    public function updateCourses($data, $id)
    {
        return $this->performRequest('PUT', "/courses/{$id}", $data);
    }
    public function deleteCourses($id)
    {
        return $this->performRequest('DELETE', "/courses/{$id}");
    }

}
