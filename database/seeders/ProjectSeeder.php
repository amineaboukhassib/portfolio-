<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'E-Commerce Platform',
                'description' => 'A full-featured online store with cart, checkout, and payment integration. Built with a clean product catalogue and admin dashboard.',
                'tech_stack'  => 'PHP, MySQL, JavaScript, CSS3',
                'live_url'    => '#',
                'github_url'  => 'https://github.com',
                'category'    => 'Web',
                'featured'    => true,
            ],
            [
                'title'       => 'Task Manager App',
                'description' => 'A productivity tool supporting real-time task creation, drag-and-drop reordering, priority labels, and deadline reminders.',
                'tech_stack'  => 'JavaScript, LocalStorage, HTML5, CSS3',
                'live_url'    => '#',
                'github_url'  => 'https://github.com',
                'category'    => 'App',
                'featured'    => true,
            ],
            [
                'title'       => 'Weather Dashboard',
                'description' => 'A responsive weather app that fetches live data from OpenWeatherMap API and renders 7-day forecasts with animated icons.',
                'tech_stack'  => 'JavaScript, Fetch API, CSS Grid',
                'live_url'    => '#',
                'github_url'  => 'https://github.com',
                'category'    => 'API',
                'featured'    => false,
            ],
            [
                'title'       => 'Blog CMS',
                'description' => 'A lightweight content management system for writing, editing, and publishing blog posts with Markdown support and tag filtering.',
                'tech_stack'  => 'PHP, MySQL, Markdown, Bootstrap',
                'live_url'    => '#',
                'github_url'  => 'https://github.com',
                'category'    => 'Web',
                'featured'    => false,
            ],
            [
                'title'       => 'Student Grade Tracker',
                'description' => 'A MySQL-backed grade tracking tool for students and instructors with role-based access, CSV export, and chart visualisations.',
                'tech_stack'  => 'PHP, MySQL, Chart.js, HTML5',
                'live_url'    => '#',
                'github_url'  => 'https://github.com',
                'category'    => 'App',
                'featured'    => true,
            ],
            [
                'title'       => 'Portfolio Website',
                'description' => 'This very portfolio — a full-stack web application showcasing projects, skills, and contact capabilities with an admin dashboard.',
                'tech_stack'  => 'HTML5, CSS3, JavaScript, PHP, MySQL',
                'live_url'    => '#',
                'github_url'  => 'https://github.com',
                'category'    => 'Web',
                'featured'    => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
