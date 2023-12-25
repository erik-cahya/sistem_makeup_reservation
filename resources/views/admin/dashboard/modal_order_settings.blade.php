@foreach ($data_orders as $ord)
    {{-- Modal Setting Order --}}
    <div id="modal-order-setting-{{ $ord->id_customers }}" class="modal fade" tabindex="-1" role="dialog"
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
                    <form action="/orders/{{ $ord->id_customers }}" method="post" enctype="multipart/form-data"
                        class="form-horizontal form-bordered">
                        @method('PUT')
                        @csrf

                        <fieldset>
                            <legend>Customer Info</legend>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Customer</label>
                                <div class="col-md-8">
                                    <input type="customer_name" id="customer_name" name="customer_name"
                                        class="form-control" value="{{ $ord->customer_name }}"
                                        {{ Auth::user()->status == 'admin' ? 'readonly' : '' }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-8">
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ $ord->email }}"
                                        {{ Auth::user()->status == 'admin' ? 'readonly' : '' }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="no_telp">No Telp</label>
                                <div class="col-md-8">
                                    <input type="no_telp" id="no_telp" name="no_telp" class="form-control"
                                        value="{{ $ord->no_telp }}"
                                        {{ Auth::user()->status == 'admin' ? 'readonly' : '' }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="paket">Paket</label>
                                <div class="col-md-8">
                                    <input type="text" id="paket" name="paket" class="form-control"
                                        value="{{ $ord->paket }}"
                                        {{ Auth::user()->status == 'admin' ? 'readonly' : '' }}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="date_booking">Tanggal Booking</label>
                                <div class="col-md-4 ">
                                    <input type="text" id="date_booking" name="date_booking"
                                        class="form-control input-datepicker" data-date-format="dd-mm-yyyy"
                                        placeholder="dd-mm-yyyy"
                                        value="{{ date('d-m-Y', strtotime($ord->booking_date)) }}"
                                        {{ Auth::user()->status == 'admin' ? 'readonly' : '' }}>
                                </div>
                                <div class="col-md-4 ">
                                    <input type="text" id="example-datepicker3" name="booking_time"
                                        class="form-control input-datepicker" data-date-format="dd-mm-yyyy"
                                        placeholder="dd-mm-yyyy" value="{{ $ord->booking_time }}"
                                        {{ Auth::user()->status == 'admin' ? 'readonly' : '' }}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="example-textarea-input">Alamat</label>
                                <div class="col-md-8">
                                    <textarea id="example-textarea-input" name="alamat" rows="9" class="form-control" placeholder="Content.."
                                        {{ Auth::user()->status == 'admin' ? 'readonly' : '' }}>{{ $ord->alamat }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        @if (Auth::user()->status == 'admin')
                            <fieldset>
                                <legend>Accept Orders</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="val_skill">Accept Order</label>
                                    <div class="col-md-6">
                                        <select id="val_skill" name="status" class="form-control">
                                            <option value="{{ $ord->status_booking }}">Please select</option>
                                            <option value="Terima"
                                                {{ $ord->status_booking == 'Terima' ? 'selected' : '' }}>
                                                Terima</option>
                                            <option value="Pending"
                                                {{ $ord->status_booking == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="Tolak"
                                                {{ $ord->status_booking == 'Tolak' ? 'selected' : '' }}>
                                                Tolak</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        @endif
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
