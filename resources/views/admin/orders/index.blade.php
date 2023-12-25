@extends('admin.layouts.main')
@section('page_content')
    <div id="page-content">

        <!-- Quick Stats -->
        <div class="row text-center">

            <div class="col-sm-6 col-lg-6">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-danger">
                        <h4 class="widget-content-light"><strong>Total Customer</strong> Pending</h4>
                    </div>
                    <div class="widget-extra-full"><span
                            class="h2 text-danger animation-expandOpen">{{ $count_customer_pending }}</span></div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-6">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-dark">
                        <h4 class="widget-content-light"><strong>Total</strong> Customer</h4>
                    </div>
                    <div class="widget-extra-full"><span
                            class="h2 themed-color-dark animation-expandOpen">{{ $count_customer }}</span></div>
                </a>
            </div>
        </div>
        <!-- END Quick Stats -->

        <!-- All Products Block -->
        <div class="block full">
            <!-- All Products Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip"
                        title="Settings"><i class="fa fa-cog"></i></a>
                </div>
                <h2><strong>All</strong> Products</h2>
            </div>
            <!-- END All Products Title -->

            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                <thead>
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
                </thead>
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
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Verifikasi Pembayaran"
                                            class="btn btn-primary btn-xs"><i class="fa fa-cogs"
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
                                        <form name="myForm" method="POST" action="/dashboard/{{ $orders->id_customers }}"
                                            style="display: inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-xs " type="submit" data-toggle="tooltip"
                                                title="Delete"
                                                onclick="return confirm('Yakin Ingin Menghapus Data Paket ?')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    @endif

                                    @if (Auth::user()->status === 'admin' && $orders->status_order === 'On Progress')
                                        <form method="POST" action="/orders/orderComplete/{{ $orders->id_customers }}"
                                            style="display: inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-success btn-xs " type="submit" data-toggle="tooltip"
                                                title="Order Selesai  "
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
            <!-- END All Products Content -->
        </div>
        <!-- END All Products Block -->
    </div>
@endsection


{{-- @section('modals')
    @foreach ($orders as $ord)
        <div id="modal-order-setting-{{ $ord->id }}" class="modal fade" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Setting Orders</h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="/orders/{{ $ord->id }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal form-bordered">
                            @method('PUT')
                            @csrf

                            <fieldset>
                                <legend>Customer Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Nama Customer</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">{{ $ord->customer_name }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ $ord->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="no_telp">No Telp</label>
                                    <div class="col-md-8">
                                        <input type="text" id="no_telp" name="no_telp" class="form-control"
                                            value="{{ $ord->no_telp }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="paket">Paket</label>
                                    <div class="col-md-8">
                                        <input type="text" id="paket" name="paket" class="form-control"
                                            value="{{ $ord->paket }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="date_booking">Datepicker</label>
                                    <div class="col-md-4 ">
                                        <input type="text" id="date_booking" name="date_booking"
                                            class="form-control input-datepicker" data-date-format="dd-mm-yyyy"
                                            placeholder="dd-mm-yyyy"
                                            value="{{ date('d-m-Y', strtotime($ord->booking_date)) }}" readonly>
                                    </div>
                                    <div class="col-md-4 ">
                                        <input type="text" id="example-datepicker3" name="booking_time"
                                            class="form-control input-datepicker" data-date-format="dd-mm-yyyy"
                                            placeholder="dd-mm-yyyy" value="{{ $ord->booking_time }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-textarea-input">Alamat</label>
                                    <div class="col-md-8">
                                        <textarea id="example-textarea-input" name="alamat" rows="9" class="form-control" placeholder="Content.."
                                            readonly>{{ $ord->alamat }}</textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Accept Orders</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="val_skill">Accept Order</label>
                                    <div class="col-md-6">
                                        <select id="val_skill" name="status" class="form-control">
                                            <option value="{{ $ord->status }}">Please select</option>
                                            <option value="terima">Terima</option>
                                            <option value="pending">Pending</option>
                                            <option value="tolak">Tolak</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Modal Body -->
                </div>
            </div>
        </div>
    @endforeach
@endsection --}}

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

<!-- Load and execute javascript code used only in this page -->
@section('page_js')
    <script src="{{ asset('vendor/admin') }}/js/pages/ecomProducts.js"></script>
    <script>
        $(function() {
            EcomProducts.init();
        });
    </script>
@endsection
