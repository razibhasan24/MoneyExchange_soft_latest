<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;


class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::orderBy('id','DESC')->paginate(10);
        return view('pages.statuses.index', compact('statuses'));
    }

    public function create()
    {

        return view('pages.statuses.create', [
            'mode' => 'create',
            'status' => new Status(),

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Status::create($data);
        return redirect()->route('statuses.index')->with('success', 'Successfully created!');
    }

    public function show(Status $status)
    {
        return view('pages.statuses.view', compact('status'));
    }

    public function edit(Status $status)
    {

        return view('pages.statuses.edit', [
            'mode' => 'edit',
            'status' => $status,

        ]);
    }

    public function update(Request $request, Status $status)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $status->update($data);
        return redirect()->route('statuses.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index')->with('success', 'Successfully deleted!');
    }
}