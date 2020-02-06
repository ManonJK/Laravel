<?php

namespace App\Http\Controllers;

use App\Skill_user;
use Illuminate\Http\Request;

class Skill_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill_user = Skill_user::latest()->paginate(5);

        return view('skills.index',compact('skill_user'))
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

        Skill_user::create($request->all());

        return redirect()->route('skills.index')
            ->with('success','Skill created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill_user  $skill_user
     * @return \Illuminate\Http\Response
     */
    public function show(Skill_user $skill_user)
    {
        return view('skills.show',compact('skill_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill_user  $skill_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill_user $skill_user)
    {
        return view('skills.edit',compact('skill_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill_user  $skill_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill_user $skill_user)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $skill_user->update($request->all());

        return redirect()->route('skills.index')
            ->with('success','Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill_user  $skill_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill_user $skill_user)
    {
        $skill_user->delete();

        return redirect()->route('skills.index')
            ->with('success','Skill deleted successfully');
    }
}
