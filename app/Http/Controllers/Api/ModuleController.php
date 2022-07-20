<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleController extends Controller
{
    protected $repository;

    public function  __construct(ModuleRepository $moduleRepository)
    {
        $this->repository = $moduleRepository;
    }

    public function index($CourseId)
    {
       $modules = $this->repository->getModulesByCourseId($CourseId);

       return ModuleResource::collection($modules);
    }
}
