<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models

use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->paginate(4); // Eager loading
        
        return response()->json([
            'success' => true,
            'code' => 200,
            'projects' => $projects
        ]);
    }
}
