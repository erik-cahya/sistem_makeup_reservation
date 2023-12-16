<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count_customer_pending'] = CustomerModel::where('status', 'pending')->count();
        $data['count_customer'] = CustomerModel::count();
        $data['orders'] = CustomerModel::get();

        return view('admin.orders.index', $data);
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
        dd($id);
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

        CustomerModel::find($id)->update([
            'customer_name' => $request->customer_name,
            'paket' => $request->paket,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'booking_date' => date('Y-m-d', strtotime($request->date_booking)),
            'booking_time' => $request->time_booking,
            'alamat' => $request->alamat,
            'status' => $request->status == null ? CustomerModel::where('id', $id)->value('status') : $request->status
        ]);
        return redirect('/orders')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        CustomerModel::destroy($id);
        return redirect('/orders')->with('success', 'Data Berhasil Dihapus');
    }
}
