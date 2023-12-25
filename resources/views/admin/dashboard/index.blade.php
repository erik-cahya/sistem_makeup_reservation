@extends('admin.layouts.main')
@section('page_content')
    <!-- Page content -->
    <div id="page-content">

        @if (Auth::user()->status === 'client')
            <div class="row">
                <div class="col-md-12">

                    @foreach ($data_orders_diterima as $terima)
                        @if ($terima->status_pembayaran == 'Verifikasi Pembayaran')
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="fa fa-check-circle"></i> Pemberitahuan</h4>
                                Pembayaran paket booking <a href="javascript:void(0)"
                                    class="alert-link">{{ $terima->customer_name }} :
                                    {{ $terima->paket }}</a> sedang di verifikasi oleh admin!
                            </div>
                        @elseif ($terima->status_pembayaran == 'Menunggu Pembayaran')
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h4><i class="fa fa-check-circle"></i> Pemberitahuan</h4>
                                Data Booking <a href="javascript:void(0)" class="alert-link">{{ $terima->customer_name }} :
                                    {{ $terima->paket }}</a> telah
                                diterima, silahkan lakukan pembayaran DP, dan kirim bukti pembayaran!
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        @endif

        <!-- Customer Content -->
        <div class="row">
            <div class="col-lg-3">
                <!-- Customer Info Block -->
                <div class="block">
                    <!-- Customer Info Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-file-o"></i> <strong>User</strong> Info</h2>
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
            <div class="col-lg-9">
                <!-- Orders Block -->
                <div class="block">
                    <!-- Orders Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-truck"></i> <strong>Orders</strong></h2>
                    </div>
                    <!-- END Orders Title -->

                    <!-- Orders Content -->
                    <table class="table table-bordered table-striped table">
                        <tr>
                            <th class="text-center" style="width: 70px;">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Nama Paket</th>
                            <th class="text-center">Tanggal Order</th>
                            <th class="text-center">Status Booking</th>
                            <th class="text-center">Status Pembayaran</th>
                            <th class="text-center">Status Order</th>
                            <th class="text-center">Action</th>
                        </tr>

                        <tbody>

                            @foreach ($data_orders as $orders)
                                <tr>
                                    <td class="text-center" style="width: 30px;">
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>
                                        {{-- {{ $orders->id_customers }} --}}
                                        {{ $orders->customer_name }}
                                    </td>
                                    <td class="text-center" style="width: ;">
                                        <strong>{{ $orders->no_telp }}</strong>
                                    </td>

                                    {{-- Nama Paket --}}
                                    <td>{{ $orders->paket }}</td>

                                    {{-- Tanggal Order --}}
                                    <td class="text-center">{{ date('d-m-Y', strtotime($orders->booking_date)) }}</td>

                                    {{-- Status Booking --}}
                                    <td class="text-center">
                                        <span
                                            class="label label-{{ $orders->status_booking === 'Pending' ? 'warning' : ($orders->status_booking === 'Terima' ? 'success' : 'danger') }}">{{ $orders->status_booking }}</span>
                                    </td>

                                    {{-- Status Pembayaran --}}
                                    <td width="200px">

                                        @if ($orders->status_booking === 'Terima')
                                            @if (Auth::user()->status === 'client')
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upload Pembayaran"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-upload"
                                                        onclick="$('#modal-upload-pembayaran-{{ $orders->id_customers }}').modal('show');"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" data-toggle="tooltip"
                                                    title="Verifikasi Pembayaran" class="btn btn-primary btn-xs"><i
                                                        class="fa fa-cogs"
                                                        onclick="$('#modal-upload-pembayaran-{{ $orders->id_customers }}').modal('show');"></i>
                                                </a>
                                            @endif
                                        @endif


                                        <span
                                            class="label 
                                        
                                        @if ($orders->status_pembayaran == 'Menunggu Pembayaran') {{ 'label-warning' }}
                                        @elseif ($orders->status_pembayaran === 'Menunggu Approve') {{ 'label-warning' }}
                                        @elseif ($orders->status_pembayaran === 'Verifikasi Pembayaran') {{ 'label-info' }}
                                        @elseif ($orders->status_pembayaran === 'Pembayaran DP') {{ 'label-primary' }}
                                        @elseif ($orders->status_pembayaran === 'Pembayaran Lunas') {{ 'label-success' }}
                                        @else {{ 'label-danger' }} @endif">
                                            {{ $orders->status_pembayaran }}
                                        </span>
                                    </td>

                                    {{-- Status Orders --}}
                                    <td class="text-center">
                                        <span
                                            class="label 
                                        @if ($orders->status_pembayaran == 'Menunggu Approve') {{ 'label-warning' }}
                                        @elseif ($orders->status_pembayaran === 'Menunggu Pembayaran') {{ 'label-warning' }} 
                                        @elseif ($orders->status_pembayaran === 'Verifikasi Pembayaran') {{ 'label-info' }}
                                        @elseif ($orders->status_pembayaran === 'Pembayaran Lunas') {{ 'label-success' }} 
                                        @elseif ($orders->status_pembayaran === 'Pembayaran DP') {{ 'label-warning' }} 
                                        @else {{ 'label-danger' }} @endif">
                                            {{ $orders->status_order }}
                                        </span>
                                    </td>

                                    {{-- Action --}}
                                    <td class="text-center" width="80px">
                                        <div class="btn-group btn-group-xs">

                                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit"
                                                class="btn btn-default"><i class="fa fa-cogs"
                                                    onclick="$('#modal-order-setting-{{ $orders->id_customers }}').modal('show');"></i></a>

                                            @if ($orders->status_booking === 'Pending')
                                                <form name="myForm" method="POST"
                                                    action="/dashboard/{{ $orders->id_customers }}"
                                                    style="display: inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-xs " type="submit"
                                                        data-toggle="tooltip" title="Delete"
                                                        onclick="return confirm('Yakin Ingin Menghapus Data Paket ?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            @if (Auth::user()->status === 'admin' && $orders->status_order === 'On Progress')
                                                <form method="POST"
                                                    action="/orders/orderComplete/{{ $orders->id_customers }}"
                                                    style="display: inline">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-success btn-xs " type="submit"
                                                        data-toggle="tooltip" title="Order Selesai  "
                                                        onclick="return confirm('Anda yakin bahwa orderan ini telah selesai ?')">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

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
                            <a href="javascript:void(0)"
                                class="widget widget-hover-effect2 themed-background-muted-light">
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
                            <a href="javascript:void(0)"
                                class="widget widget-hover-effect2 themed-background-muted-light">
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
                            <a href="javascript:void(0)"
                                class="widget widget-hover-effect2 themed-background-muted-light">
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
                            <a href="javascript:void(0)"
                                class="widget widget-hover-effect2 themed-background-muted-light">
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

@section('modals')
    {{-- Modal Setting Orders --}}
    @include('admin.dashboard.modal_order_settings')

    {{-- Modal Upload Pembayaran --}}
    @include('admin.dashboard.modal_status_pembayaran_from')

    <script>
        // untuk membuat preview gambar
        function previewImage() {
            const image = document.querySelector('#bukti_pembayaran');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
