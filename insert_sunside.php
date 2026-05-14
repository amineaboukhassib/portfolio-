<?php
use App\Models\Project;

$project = Project::create([
    'title' => 'Sunside — Live Sun Exposure Finder for Cafes',
    'category' => 'API',
    'description' => 'A live interactive web app that calculates real-time sun exposure for 20+ cafes in Cihangir, Istanbul. Combines solar positioning, live weather data, and Google Maps to show which cafes have sunny outdoor seating right now.',
    'tech_stack' => 'JavaScript, HTML5, CSS3, Vite, SunCalc, Open-Meteo API, Google Maps API',
    'github_link' => 'https://github.com/amineaboukhassib/Sunside',
    'live_link' => '',
    'image_path' => 'https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&q=80&w=600&h=400' // A sunny cafe placeholder
]);

echo "Project Sunside added with ID: " . $project->id . "\n";
