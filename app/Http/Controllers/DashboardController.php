<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportingModel;

class DashboardController extends Controller
{
    public function index()
    {
        $data = ReportingModel::all();

        return view('dashboard.index');
    }
}
