<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SADashboardController extends Controller
{
    public function index()
    {
        return view('superAdmin.dashboard-sa');
    }
}
