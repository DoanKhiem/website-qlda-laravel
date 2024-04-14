<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\Risk;
use App\Models\User;
use App\Models\Work;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        $issues = Issue::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();
        $risks = Risk::orderBy('created_at', 'desc')->get();
        $statusCountProjects = Project::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');
        $statusCountWork = Work::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');
        $statusCountIssues = Issue::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');
        return view('dashboard', compact('projects', 'issues', 'users', 'risks', 'statusCountProjects', 'statusCountWork', 'statusCountIssues'));
    }
}
