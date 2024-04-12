<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Risk;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Risk::orderBy('created_at', 'desc')->get();
        return view('risks.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('risks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:risks',
            'name' => 'required',
            'note' => 'required',
            'project_id' => 'required',
        ]);
        $data = $request->all();
        $status = Risk::create($data);
        if ($status) {
            return redirect()->route('risks.index')->with('success', 'Thêm mới rủi ro thành công');
        } else {
            return back()->with('error', 'Lỗi thêm mới rủi ro');
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
        $item = Risk::findOrFail($id);
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('risks.edit', compact('item', 'projects'));
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
