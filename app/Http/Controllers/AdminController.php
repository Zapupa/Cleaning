<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::all();

        return view('admin.index', compact('reports'));
    }
}
