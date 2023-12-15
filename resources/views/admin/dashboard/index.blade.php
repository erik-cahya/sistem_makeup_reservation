@extends('admin.layouts.main')
@section('page_content')
    <!-- Page content -->
    <div id="page-content">


        <!-- Customer Content -->
        <div class="row">
            <div class="col-lg-4">
                <!-- Customer Info Block -->
                <div class="block">
                    <!-- Customer Info Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-file-o"></i> <strong>Customer</strong> Info</h2>
                    </div>
                    <!-- END Customer Info Title -->

                    <!-- Customer Info -->
                    <div class="block-section text-center">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('vendor/admin') }}/img/placeholders/avatars/avatar4@2x.jpg" alt="avatar"
                                class="img-circle">
                        </a>
                        <h3>
                            <strong>{{ Auth::user()->name }}</strong><br><small></small>
                        </h3>
                    </div>
                    <table class="table table-borderless table-striped table-vcenter">
                        <tbody>
                            <tr>
                                <td class="text-right" style="width: 50%;"><strong>Email</strong></td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Registration</strong></td>
                                <td> {{ date('d-m-Y H:m:d', strtotime(Auth::user()->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Registrations</strong></td>
                                <td><span class="label label-primary">{{ Auth::user()->status }}</span></td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Status</strong></td>
                                <td><span class="label label-success"><i class="fa fa-check"></i> Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- END Customer Info -->
                </div>
                <!-- END Customer Info Block -->

            </div>
            <div class="col-lg-8">
                <!-- Orders Block -->
                <div class="block">
                    <!-- Orders Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-truck"></i> <strong>Orders</strong></h2>
                    </div>
                    <!-- END Orders Title -->

                    <!-- Orders Content -->
                    <table class="table table-bordered table-striped table-vcenter">
                        <tbody>

                            @foreach ($data_orders as $orders)
                                <tr>
                                    <td class="text-center" style="width: 30px;">
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>
                                        {{ $orders->customer_name }}
                                    </td>
                                    <td class="text-center" style="width: 15%;">
                                        <strong>{{ $orders->no_telp }}</strong>
                                    </td>
                                    <td>{{ $orders->paket }}</td>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($orders->booking_date)) }}
                                    </td>
                                    <td>
                                        <span
                                            class="label label-{{ $orders->status === 'pending' ? 'warning' : ($orders->status === 'terima' ? 'success' : 'danger') }}">{{ $orders->status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-xs">
                                            <a href="page_ecom_order_view.html" data-toggle="tooltip" title=""
                                                class="btn btn-default" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>

                                            <form name="myForm" method="POST" action="/dashboard/{{ $orders->id }}"
                                                style="display: inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger btn-xs " type="submit"
                                                    onclick="return confirm('Yakin Ingin Menghapus Data Paket ?')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- END Orders Content -->
                </div>
                <!-- END Orders Block -->




                <!-- Quick Stats Block -->
                <div class="block">
                    <!-- Quick Stats Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-line-chart"></i> <strong>Quick</strong> Stats</h2>
                    </div>
                    <!-- END Quick Stats Title -->

                    <div class="row">

                        <div class="col-md-6">
                            <!-- Quick Stats Content -->
                            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-right themed-background">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <h4 class="text-left">
                                        <strong>{{ $count_orders }}</strong><br><small>Orders in Total</small>
                                    </h4>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-right themed-background-success">
                                        <i class="fa fa-usd"></i>
                                    </div>
                                    <h4 class="text-left text-success">
                                        <strong>{{ $count_orders_terima }}</strong><br><small>Booking Diterima</small>
                                    </h4>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-right themed-background-warning">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <h4 class="text-left text-warning">
                                        <strong>{{ $count_orders_pending }}</strong><br><small>Booking Pending</small>
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-right themed-background-danger">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <h4 class="text-left text-danger">
                                        <strong>{{ $count_orders_tolak }}</strong><br><small>Booking Ditolak</small>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Quick Stats Content -->
                </div>
                <!-- END Quick Stats Block -->


            </div>
        </div>
        <!-- END Customer Content -->
    </div>
    <!-- END Page Content -->
@endsection
