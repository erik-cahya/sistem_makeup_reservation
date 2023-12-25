<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data_orders'] = DB::table('customers')->join('bookings', 'bookings.id_customers', 'customers.id')->get();
        $data['count_customer_pending'] = BookingModel::where('status_booking', 'pending')->count();
        $data['count_customer'] = CustomerModel::count();

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
        dd($request->all());
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
        // dd($id);
        // dd($request->all());

        // Jika user upload bukti bayar
        if ($request->file()) {
            $filename = 'bukti_transfer_' . time() . '.' . $request->bukti_pembayaran->extension();
            $request->bukti_pembayaran->move(public_path('storage/img'), $filename);

            BookingModel::where('id_customers', $id)->update([
                'status_pembayaran' => 'Verifikasi Pembayaran',
                'status_order' => 'Verifikasi Pembayaran',
                'bukti_pembayaran' => $filename,
            ]);

            return redirect('/dashboard')->with('success', 'Data Berhasil Disimpan');
        }

        // Verifikasi Pembayaran Oleh Admin
        if ($request->verifikasi_pembayaran) {
            BookingModel::where('id_customers', $id)->update([
                'status_pembayaran' => $request->verifikasi_pembayaran,
                'status_order' => ($request->verifikasi_pembayaran === 'Pembayaran Lunas' ? 'On Progress' : ($request->verifikasi_pembayaran === 'Pembayaran DP' ? 'On Progress & Pelunasan' : 'Pembayaran Ditolak'))
            ]);

            return redirect('/dashboard')->with('success', 'Data Berhasil Disimpan');
        }



        CustomerModel::find($id)->update([
            'paket' => $request->paket,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        BookingModel::where('id_customers', $id)->update([
            'status_booking' => $request->status == null ? CustomerModel::where('id', $id)->value('status') : $request->status,
            'status_pembayaran' => ($request->status == null ? BookingModel::where('id', $id)->value('status_pembayaran') : ($request->status == 'Terima' ? 'Menunggu Pembayaran' : ($request->status == 'Pending' ? 'Menunggu Approve' : 'Ditolak'))),
            'status_order' => ($request->status == null ? BookingModel::where('id', $id)->value('status_order') : ($request->status == 'Terima' ? 'Menunggu Pembayaran' : ($request->status == 'Pending' ? 'Menunggu Approve' : 'Ditolak'))),

            'booking_date' => date('Y-m-d', strtotime($request->date_booking)),
            'booking_time' => $request->booking_time,
        ]);

        return redirect('/dashboard')->with('success', 'Data Berhasil Disimpan');
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

    public function orderComplete($id)
    {

        BookingModel::where('id_customers', $id)->update([
            'status_order' => 'Order Selesai'
        ]);

        return redirect('/dashboard')->with('success', 'Order Telah Diselesaikan');
    }
}
