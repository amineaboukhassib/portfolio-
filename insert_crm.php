<?php
use App\Models\Project;

// Add Schools CRM v2.5
Project::create([
    'title' => 'Schools CRM v2.5 — School Pipeline & Relationship Management System',
    'category' => 'App',
    'description' => 'A lightweight CRM system built for managing school pipelines, tracking visits, and monitoring communication stages. Features a full dashboard with KPIs, smart filtering, multi-language support (Arabic, English, French), and local data backup/restore.',
    'tech_stack' => 'HTML5, CSS3, Vanilla JavaScript',
    'github_link' => '', // Assuming empty as not provided
    'live_link' => '',
    'image_path' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=600&h=400' // Placeholder for dashboard
]);

// Add Mr.Bit Academy Platform as well, since it's listed in the summary
$mrbitExists = Project::where('title', 'like', '%Mr.Bit%')->exists();
if (!$mrbitExists) {
    Project::create([
        'title' => 'Mr.Bit Academy Platform',
        'category' => 'Web',
        'description' => 'A comprehensive platform with Role-Based Access Control (RBAC), multi-language and multi-currency support, real-time live chat, recommendation engine, and a vendor commission system integrated with Stripe API.',
        'tech_stack' => 'Laravel, PHP 8, MySQL, Stripe API',
        'github_link' => '',
        'live_link' => '',
        'image_path' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&q=80&w=600&h=400'
    ]);
}

echo "New projects added successfully.\n";
