<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Work::orderBy('created_at', 'desc')->get();
        return view('works.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('works.create', compact('users', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:works',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'project_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);
        $data = $request->all();
        $status = Work::create($data);
        if ($status) {
            return redirect()->route('works.index')->with('success', 'Thêm mới công việc thành công');
        } else {
            return back()->with('error', 'Lỗi thêm mới công việc');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('works.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
