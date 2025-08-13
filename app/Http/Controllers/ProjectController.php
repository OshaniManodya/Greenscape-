<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
{
    $projects = auth()->user()->projects()->latest()->get();
    return view('projects.index', compact('projects'));
}
}
