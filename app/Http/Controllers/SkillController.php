<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Skill::class, 'skill');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::latest()->paginate(5);

        return view('skills.index',compact('skills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')
            ->with('success','Skill created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        $this->authorize('view', $skill);
        return view('skills.show',compact('skill'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $this->authorize('update', $skill);
        return view('skills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {

        if($request->hasFile('logo')){
            $skill->logo = $request->logo->getClientOriginalname();
            $request->logo->storeAs(config('logo.path'), $skill->logo, 'public');
        }


        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')
            ->with('success','Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')
            ->with('success','Skill deleted successfully');
    }
}
