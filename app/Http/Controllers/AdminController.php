<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Message;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Handle admin login.
     */
    public function login(Request $request)
    {
        $username = trim($request->input('username', ''));
        $password = trim($request->input('password', ''));

        if (!$username || !$password) {
            return back()->with('error', 'Please fill in both fields.');
        }

        // Find user by name or email
        $user = User::where('email', $username)
                     ->orWhere('name', $username)
                     ->first();

        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_user', $user->name);

            // Remember me cookie (7 days)
            $cookie = cookie('admin_remember', base64_encode($username), 60 * 24 * 7);

            return redirect()->route('admin.dashboard')->cookie($cookie);
        }

        return back()->with('error', 'Invalid username or password.');
    }

    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        $messages = Message::orderBy('sent_at', 'desc')->limit(50)->get();
        $visitors = Visitor::orderBy('created_at', 'desc')->limit(200)->get();
        $unread   = Message::where('is_read', false)->count();

        return view('admin.dashboard', compact('projects', 'messages', 'visitors', 'unread'));
    }

    /**
     * Store a new project.
     */
    public function storeProject(Request $request)
    {
        Project::create([
            'title'       => trim($request->input('title', '')),
            'description' => trim($request->input('description', '')),
            'tech_stack'  => trim($request->input('tech_stack', '')),
            'live_url'    => trim($request->input('live_url', '#')),
            'github_url'  => trim($request->input('github_url', '#')),
            'category'    => trim($request->input('category', 'Web')),
            'featured'    => $request->has('featured') ? true : false,
        ]);

        return back()->with('msg', 'Project added successfully.');
    }

    /**
     * Update an existing project.
     */
    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->update([
            'title'       => trim($request->input('title', '')),
            'description' => trim($request->input('description', '')),
            'tech_stack'  => trim($request->input('tech_stack', '')),
            'live_url'    => trim($request->input('live_url', '#')),
            'github_url'  => trim($request->input('github_url', '#')),
            'category'    => trim($request->input('category', 'Web')),
            'featured'    => $request->has('featured') ? true : false,
        ]);

        return back()->with('msg', 'Project updated.');
    }

    /**
     * Delete a project.
     */
    public function destroyProject($id)
    {
        Project::findOrFail($id)->delete();

        return back()->with('msg', 'Project deleted.');
    }

    /**
     * Mark a message as read.
     */
    public function markRead($id)
    {
        Message::where('id', $id)->update(['is_read' => true]);

        return back()->with('msg', 'Message marked as read.');
    }

    /**
     * Logout the admin.
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_logged_in', 'admin_user']);

        // Clear remember cookie
        $cookie = cookie()->forget('admin_remember');

        return redirect()->route('admin.login')->cookie($cookie);
    }
}
