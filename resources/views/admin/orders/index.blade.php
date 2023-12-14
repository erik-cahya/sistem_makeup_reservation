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
                        <th>Customer Name</th>
                        <th class="text-right hidden-xs">Alamat</th>
                        <th class="hidden-xs text-center">Tanggal & Jam Booking</th>
                        <th class="hidden-xs text-center">Paket</th>
                        <th class="hidden-xs">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $ord)
                        <tr>
                            <td class="text-center"><a
                                    href="page_ecom_product_edit.html"><strong>{{ $loop->iteration }}</strong></a></td>
                            <td><a href="page_ecom_product_edit.html">{{ $ord->customer_name }}</a></td>
                            <td class="text-right hidden-xs"><strong>{{ $ord->alamat }}</strong></td>
                            <td class="hidden-xs text-center">{{ date('d-m-Y', strtotime($ord->booking_date)) }} |
                                <strong>{{ $ord->booking_time }}</strong>
                            </td>
                            <td class="hidden-xs text-center">{{ $ord->paket }}
                            </td>
                            <td class="hidden-xs">
                                <span
                                    class="label label-{{ $ord->status === 'pending' ? 'warning' : ($ord->status === 'terima' ? 'success' : 'danger') }}">{{ $ord->status }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">

                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit"
                                        class="btn btn-default"><i class="fa fa-cogs"
                                            onclick="$('#modal-order-setting-{{ $ord->id }}').modal('show');"></i></a>


                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                    <link rel="stylesheet" type="text/css"
                                        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

                                    <form name="myForm" method="POST" action="/orders/{{ $ord->id }}"
                                        style="display: inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-danger btn-xs " name="archive" type="submit"
                                            onclick="return confirm('Yakin Ingin Menghapus Data Paket ?')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
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


@section('modals')
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
                                    <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" id="user-settings-email" name="user-settings-email"
                                            class="form-control" value="{{ $ord->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-email">Paket</label>
                                    <div class="col-md-8">
                                        <input type="text" id="user-settings-email" name="user-settings-email"
                                            class="form-control" value="{{ $ord->paket }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="example-datepicker">Datepicker</label>
                                    <div class="col-md-4 ">
                                        <input type="text" id="example-datepicker3" name="date_booking"
                                            class="form-control input-datepicker" data-date-format="dd-mm-yyyy"
                                            placeholder="dd-mm-yyyy"
                                            value="{{ date('d-m-Y', strtotime($ord->booking_date)) }}" readonly>
                                    </div>
                                    <div class="col-md-4 ">
                                        <input type="text" id="example-datepicker3" name="date_booking"
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
