<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Return projects as JSON (AJAX endpoint).
     * Replaces php/get_projects.php
     */
    public function index(Request $request)
    {
        $category = $request->input('category', 'all');
        $featured = $request->boolean('featured');

        $query = Project::orderBy('created_at', 'desc');

        if ($featured) {
            $query->where('featured', true);
        } elseif ($category !== 'all') {
            $query->where('category', $category);
        }

        $projects = $query->get();

        return response()->json([
            'success' => true,
            'data'    => $projects,
        ]);
    }
}
