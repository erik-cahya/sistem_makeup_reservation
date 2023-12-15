<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['data_orders'] = CustomerModel::where('id_user', Auth::user()->id)->get();
        return view('admin.dashboard.index', $data);
    }
}
