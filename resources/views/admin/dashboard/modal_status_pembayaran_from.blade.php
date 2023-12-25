@foreach ($data_orders as $ord)
    <div id="modal-upload-pembayaran-{{ $ord->id_customers }}" class="modal fade" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title">
                        <h2>Upload Bukti Pembayaran Anda</h2>
                        {{-- <h2>{{ $ord->id_customers }}</h2> --}}
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="/orders/{{ $ord->id_customers }}" method="post" enctype="multipart/form-data"
                        class="form-horizontal form-bordered">
                        @method('PUT')
                        @csrf

                        @if (Auth::user()->status === 'client')
                            @if (
                                $ord->status_pembayaran === 'Pembayaran Ditolak' ||
                                    $ord->status_pembayaran === 'Menunggu Pembayaran' ||
                                    $ord->status_pembayaran === 'Pembayaran DP')
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="bukti_pembayaran">Upload Bukti
                                        Bayar</label>
                                    <div class="col-md-8">
                                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran"
                                            onchange="previewImage()">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="bukti_pembayaran">Status Pembayaran</label>
                                <div class="col-md-8">
                                    <p>{{ $ord->status_pembayaran }}</p>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="val_skill">Verifikasi Pembayaran</label>
                                <div class="col-md-6">
                                    <select id="val_skill" name="verifikasi_pembayaran" class="form-control"
                                        data-placeholder="">
                                        <option label="Verifikasi Pembayaran Client.." selected disabled>Verifikasi
                                            Pembayaran Client..</option>
                                        <option value="Pembayaran DP"
                                            {{ $ord->status_pembayaran === 'Pembayaran DP' ? 'selected' : '' }}>
                                            Pembayaran DP</option>
                                        <option value="Pembayaran Lunas"
                                            {{ $ord->status_pembayaran === 'Pembayaran Lunas' ? 'selected' : '' }}>
                                            Pembayaran Lunas</option>
                                        <option value="Pembayaran Ditolak"
                                            {{ $ord->status_pembayaran === 'Pembayaran Ditolak' ? 'selected' : '' }}>
                                            Tolak Pembayaran</option>
                                    </select>
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bukti_pembayaran">Bukti Transfer</label>
                            <div class="col-md-8">
                                <img src="{{ $ord->bukti_pembayaran == null ? '' : asset('storage/img/' . $ord->bukti_pembayaran) }}"
                                    class="img-preview" width="200px">
                            </div>
                        </div>

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
