<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', Auth::user()->id)->get();

        return view('report.index', compact('reports'));
    }

    public function show()
    {
        $services = Service::all();

        return view('report.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'address' => 'string',
            'contact' => 'string',
            'date' => 'date',
            'time' => 'string',
            'payment' => 'string',
            'service' => 'string',
            'path_img' => 'image|mimes:png,jpg,jpeg,gif|max:800'
        ]);

        $imageName = time() . '.png'; // f[f[f[f]]]

        $data['path_img']->move(public_path('images'), $imageName);

        Report::create([
            'address' => $data['address'],
            'contact' => $data['contact'],
            'date' => $data['date'],
            'time' => $data['time'],
            'payment' => $data['payment'],
            'path_img' => $imageName,
            'service_id' => $request['service'],
            'user_id' => Auth::user()->id,
            'status' => 'новая'
        ]);
        return redirect()->route('dashboard');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'status' => ['required'],
            'id' => ['required'],
        ]);
        Report::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
}
