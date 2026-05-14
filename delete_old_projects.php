<?php
use App\Models\Project;

// Delete all projects except 'Sunside — Live Sun Exposure Finder for Cafes'
$deleted = Project::where('title', '!=', 'Sunside — Live Sun Exposure Finder for Cafes')->delete();

echo "Deleted {$deleted} old projects.\n";
