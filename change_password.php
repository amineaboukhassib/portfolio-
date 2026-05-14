<?php
use Illuminate\Support\Facades\Hash;
use App\Models\User;

$admin = User::where('name', 'Admin')->first();
if ($admin) {
    $admin->password = Hash::make('112233Aa5957');
    $admin->save();
    echo "Password updated successfully.";
} else {
    echo "Admin user not found.";
}
