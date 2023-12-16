<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->status === 'admin') {

            $data['data_orders'] = CustomerModel::get();
            $data['count_orders'] = CustomerModel::count();
            $data['count_orders_pending'] = CustomerModel::where('status', 'pending')->count();
            $data['count_orders_terima'] = CustomerModel::where('status', 'terima')->count();
            $data['count_orders_tolak'] = CustomerModel::where('status', 'tolak')->count();
        } else {
            $data['data_orders'] = CustomerModel::where('id_user', Auth::user()->id)->get();
            $data['count_orders'] = CustomerModel::where('id_user', Auth::user()->id)->count();
            $data['count_orders_pending'] = CustomerModel::where('id_user', Auth::user()->id)->where('status', 'pending')->count();
            $data['count_orders_terima'] = CustomerModel::where('id_user', Auth::user()->id)->where('status', 'terima')->count();
            $data['count_orders_tolak'] = CustomerModel::where('id_user', Auth::user()->id)->where('status', 'tolak')->count();
        }
        return view('admin.dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerModel::destroy($id);
        return redirect('/dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
