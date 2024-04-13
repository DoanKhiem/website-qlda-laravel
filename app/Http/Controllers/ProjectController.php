<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Project::orderBy('created_at', 'desc')->get();
        return view('projects.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('projects.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:projects',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);
        $data = $request->all();
        $status = Project::create($data);
        if ($status) {
            $status->users()->sync($request->user_id);
            return redirect()->route('projects.index')->with('success', 'Thêm mới dự án thành công');
        } else {
            return back()->with('error', 'Lỗi thêm mới dự án');
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
        $item = Project::findOrFail($id);
        $users = User::orderBy('created_at', 'desc')->get();
        return view('projects.edit', compact('item', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Project::findOrFail($id);
        if($item) {
            $this->validate($request, [
                'code' => 'required|unique:projects,' . $id,
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'required',
                'user_id' => 'required'
            ]);
            $data = $request->all();
            $status = $item->update($data);
            if ($status) {
                $item->users()->sync($request->user_id);
                return redirect()->route('projects.index')->with('success', 'Cập nhật dự án thành công');
            } else {
                return back()->with('error', 'Lỗi cập nhật dự án');
            }
        } else {
            return back()->with('error', 'Không tồn tại dự án này!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Project::findOrFail($id);
        if ($item) {
            $status = $item->delete();
            if ($status) {
                return redirect()->route('projects.index')->with('success', 'Xóa dự án thành công!');
            } else {
                return back()->with('error', 'Lỗi xóa dự án!');
            }
        } else {
            return back()->with('error', 'Không tồn tại dự án này!');
        }
    }
}
