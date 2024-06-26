<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Issue::orderBy('created_at', 'desc')->get();
        return view('issues.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('issues.create', compact('users', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:issues',
            'name' => 'required',
            'project_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);
        $data = $request->all();
        $status = Issue::create($data);
        if ($status) {
            return redirect()->route('issues.index')->with('success', 'Thêm mới vấn đề thành công');
        } else {
            return back()->with('error', 'Lỗi thêm mới vấn đề');
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
        $item = Issue::findOrFail($id);
        $users = User::orderBy('created_at', 'desc')->get();
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('issues.edit', compact('item', 'users', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Issue::findOrFail($id);
        if($item) {
            $this->validate($request, [
                'code' => 'required|unique:issues,code,' . $id,
                'name' => 'required',
                'project_id' => 'required',
                'user_id' => 'required',
                'status' => 'required'
            ]);
            $data = $request->all();
            $status = $item->update($data);
            if ($status) {
                return redirect()->route('issues.index')->with('success', 'Cập nhật vấn đề thành công');
            } else {
                return back()->with('error', 'Lỗi cập nhật vấn đề');
            }
        } else {
            return back()->with('error', 'Không tồn tại vấn đề này!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Issue::findOrFail($id);
        if ($item) {
            $status = $item->delete();
            if ($status) {
                return redirect()->route('issues.index')->with('success', 'Xóa vấn đề thành công!');
            } else {
                return back()->with('error', 'Lỗi xóa vấn đề!');
            }
        } else {
            return back()->with('error', 'Không tồn tại vấn đề này!');
        }
    }
}
