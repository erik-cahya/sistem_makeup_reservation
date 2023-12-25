<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $data['data_orders'] = DB::table('customers')->join('bookings', 'bookings.id_customers', 'customers.id')->get();
            $data['count_orders'] = CustomerModel::count();
            $data['count_orders_pending'] = BookingModel::where('status_booking', 'pending')->count();
            $data['count_orders_terima'] = BookingModel::where('status_booking', 'terima')->count();
            $data['count_orders_tolak'] = BookingModel::where('status_booking', 'tolak')->count();

            // dd($data['data_orders']);
        } else {

            $data['data_orders'] = DB::table('customers')->join('bookings', 'bookings.id_customers', 'customers.id')->where('id_user', Auth::user()->id)->get();

            $data['data_orders_diterima'] = DB::table('customers')->join('bookings', 'bookings.id_customers', 'customers.id')->where('id_user', Auth::user()->id)->where('status_booking', 'terima')->get();

            // dd($data['data_orders_diterima']);

            $data['count_orders'] = CustomerModel::where('id_user', Auth::user()->id)->count();
            $data['count_orders_pending'] = DB::table('customers')->join('bookings', 'bookings.id_customers', 'customers.id')->where('id_user', Auth::user()->id)->where('status_booking', 'pending')->count();
            $data['count_orders_terima'] = DB::table('customers')->join('bookings', 'bookings.id_customers', 'customers.id')->where('id_user', Auth::user()->id)->where('status_booking', 'terima')->count();
            $data['count_orders_tolak'] = DB::table('customers')->join('bookings', 'bookings.id_customers', 'customers.id')->where('id_user', Auth::user()->id)->where('status_booking', 'tolak')->count();
        }

        // dd($data['data_orders']);
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
