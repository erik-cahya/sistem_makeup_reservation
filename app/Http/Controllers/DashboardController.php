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
        $data['count_orders'] = CustomerModel::where('id_user', Auth::user()->id)->count();
        $data['count_orders_pending'] = CustomerModel::where('id_user', Auth::user()->id)->where('status', 'pending')->count();
        $data['count_orders_terima'] = CustomerModel::where('id_user', Auth::user()->id)->where('status', 'terima')->count();
        $data['count_orders_tolak'] = CustomerModel::where('id_user', Auth::user()->id)->where('status', 'tolak')->count();
        return view('admin.dashboard.index', $data);
    }
}
