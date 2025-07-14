<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;


class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::orderBy('id','DESC')->paginate(10);
        return view('pages.agents.index', compact('agents'));
    }

    public function create()
    {

        return view('pages.agents.create', [
            'mode' => 'create',
            'agent' => new Agent(),

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Agent::create($data);
        return redirect()->route('agents.index')->with('success', 'Successfully created!');
    }

    public function show(Agent $agent)
    {
        return view('pages.agents.view', compact('agent'));
    }

    public function edit(Agent $agent)
    {

        return view('pages.agents.edit', [
            'mode' => 'edit',
            'agent' => $agent,

        ]);
    }

    public function update(Request $request, Agent $agent)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $agent->update($data);
        return redirect()->route('agents.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Successfully deleted!');
    }
}