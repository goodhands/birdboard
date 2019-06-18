<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;

class ProjectsController extends Controller
{
    public function index(){
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function store(Request $request){

        //validate description
        $attributes = request()->validate([
            'title' => 'required', 
            'description' => 'required',
        ]);

        //persist
        auth()->user()->projects()->create($attributes);

        //redirect
        return redirect('/projects');

    }

    public function create(){
        return view('projects.create');
    }

    public function show(Projects $project){

        if(auth()->user()->isNot($project->owner)){
            abort(403);
        }

        return view('projects.show', compact('project'));
    }
}
