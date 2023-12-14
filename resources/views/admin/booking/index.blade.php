@extends('admin.layouts.main')
@section('page_content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Forms General Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="gi gi-notes_2"></i>Form General Elements<br><small>Clean and professional forms for your
                        UI!</small>
                </h1>
            </div>
        </div>

        <ul class="breadcrumb breadcrumb-top">
            <li>Forms</li>
            <li><a href="">General</a></li>
        </ul>
        <!-- END Forms General Header -->

        <div class="row">
            <div class="col-md-6">
                <!-- Basic Form Elements Block -->
                <div class="block">
                    <!-- Basic Form Elements Title -->
                    <div class="block-title">
                        <h2><strong>Basic Form</strong> Elements</h2>
                    </div>
                    <!-- END Form Elements Title -->


                    <!-- Basic Form Elements Content -->
                    <form action="/booking" method="POST" enctype="multipart/form-data"
                        class="form-horizontal form-bordered">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-text-input">Nama Customer</label>
                            <div class="col-md-9">
                                <input type="text" id="example-text-input" name="customer_name" class="form-control"
                                    placeholder="Text">
                                <span class="help-block">This is a help text</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-text-input">No Telp</label>
                            <div class="col-md-9">
                                <input type="text" id="example-text-input" name="no_telp" class="form-control"
                                    placeholder="Text">
                                <span class="help-block">This is a help text</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-select2">Pilih Paket</label>
                            <div class="col-md-9">
                                <select id="example-select2" name="wedding_paket" class="select-select2"
                                    style="width: 100%;" data-placeholder="Pilih paket anda..">
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                    <optgroup label = "Paket Rias Wedding">
                                        <option value ="Rias Wedding | Paket Rias Agung">Paket Rias Agung</option>
                                        <option value ="Rias Wedding | Paket Rias Memadik">Paket Rias Memadik</option>
                                        <option value ="Rias Wedding | Paket Rias Resepsi">Paket Rias Resepsi</option>
                                    </optgroup>

                                    <optgroup label = "Paket Rias Metatah">
                                        <option value ="Rias Metatah | Paket Metatah Agung">Paket Metatah Agung</option>
                                        <option value ="Rias Metatah | Paket Metatah Madya">Paket Metatah Madya</option>
                                        <option value ="Rias Metatah | Paket Metatah Alit">Paket Metatah Alit</option>
                                    </optgroup>

                                    <optgroup label = "Paket Prewedding Indoor">
                                        <option value ="sydney">Paket Rias Agung Modifikasi</option>
                                        <option value ="sydney">Paket Hemat</option>
                                    </optgroup>

                                    <optgroup label = "Paket Prewedding Outdoor">
                                        <option value ="sydney">Paket Rias Premium</option>
                                        <option value ="sydney">Paket Rias Standard</option>
                                        <option value ="sydney">Paket Rias Hemat</option>
                                    </optgroup>

                                    <optgroup label = "Paket Prewedding Casual">
                                        <option value ="sydney">Paket Standard</option>
                                        <option value ="sydney">Paket Premium</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-email-input">Email Input</label>
                            <div class="col-md-9">
                                <input type="email" id="example-email-input" name="email" class="form-control"
                                    placeholder="Enter Email">
                                <span class="help-block">Please enter your email</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-timepicker24">Select Time (24h)</label>
                            <div class="col-md-9">
                                <div class="input-group bootstrap-timepicker">
                                    <input type="text" id="example-timepicker24" name="booking_time"
                                        class="form-control input-timepicker24">
                                    <span class="input-group-btn">
                                        <a href="javascript:void(0)" class="btn btn-primary"><i
                                                class="fa fa-clock-o"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-datepicker">Datepicker</label>
                            <div class="col-md-9 ">
                                <input type="text" id="example-datepicker3" name="date_booking"
                                    class="form-control input-datepicker" data-date-format="dd-mm-yyyy"
                                    placeholder="dd-mm-yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-textarea-input">Alamat</label>
                            <div class="col-md-9">
                                <textarea id="example-textarea-input" name="alamat" rows="9" class="form-control" placeholder="Content.."></textarea>
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i>
                                    Submit </button>

                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i>
                                    Reset</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Basic Form Elements Content -->
                </div>
                <!-- END Basic Form Elements Block -->
            </div>


            <div class="col-md-6">
                <!-- Interactive Block -->
                <div class="block">
                    <!-- Interactive Title -->
                    <div class="block-title">
                        <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary"
                                data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
                        </div>
                        <h2><strong>Paket</strong> Komala Santika Makeup</h2>
                    </div>
                    <!-- END Interactive Title -->

                    <!-- Interactive Content -->
                    <!-- The content you will put inside div.block-content, will be toggled -->
                    <div class="block-content">

                        <h4>Paket Wedding : </h4>
                        <ul class="fa-ul list-li-push">
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Rias Agung : </strong>
                                Paket
                                ini hadir dengan
                                nuansa kerjaan bali yang berisikan emas di setiap atributnya. Untuk pengantin cowok dan
                                cewek dihiasi dengan mahkota emas layaknya raja dan putri Bali. </li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong> Rias Memadik :</strong> Paket
                                ini
                                hamper sama
                                dengan paket rias agung namun dengan skala yang kecil dan ringan karena berfungsi untuk
                                membuat kenyamanan kepada para pengantin yang akan melaksanakan prosesi memadik
                            </li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Rias Resepsi: </strong>
                                Paket
                                ini bernuansa simple namun elegan yang memadukan paket rias agung ditambahkan dengan
                                nuansa
                                casual yang ringan.</li>
                        </ul>
                        <hr>
                        <h4>Paket Metatah : </h4>
                        <ul class="fa-ul list-li-push">
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Metatah Rias Agung : </strong>
                                Paket ini hadir dengan nuansa kerjaan bali yang disetiap
                                atributnya berisi emas. </li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Rias Madya : </strong>
                                Paket ini sama dengan paket metetatah rias agung namun menggunakan emas
                                yang lebih sedikit di setiap atributnya
                            </li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Metatah Alit : </strong>
                                Paket ini hadir untuk anak anak yang berusia 12 – 15 tahun yang dimana
                                paket ini menggunakan atribut emas namun dipadukan dengan nuansa casual yang simple namun
                                elegan </li>
                        </ul>
                        <hr>
                        <h4>Prewedding Indoor : </h4>
                        <ul class="fa-ul list-li-push">
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Rias Agung Modifikasi :
                                </strong>
                                Paket ini hadir dengan nuansa kerajaan Bali namun dimodifikasi dengan nuansa casual yang
                                penuh dengan warna membuat pengantin terlihat lebih berwarana dan elegan. Paket ini sudah
                                termasuk Photografi dan Videografi yang handal dibidangnya</li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Hemat : </strong>
                                Paket ini hadir dengan nuansa casual yang tetap terlihat elegan namun lebih hemat di
                                kantong. Paket ini sudah termasuk Photografi
                            </li>
                        </ul>
                        <hr>
                        <h4>Prewedding Outdoor : </h4>
                        <ul class="fa-ul list-li-push">
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Rias Premium :
                                </strong>
                                Paket ini hadir dengan kategori premium yang sudah termasuk Paket MUA dan wardrobe dari
                                Salon Komala Santika, Tempat Prewedding, Photograpi serta Viedografi yang handal dibidangnya
                            </li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Rias Standard : </strong>
                                Paket ini sama dengan Paket Rias Premium tetapi hadir dengan kategori Standard yang sudah
                                termasuk Paket Mua dan Wardrobe dari Salon Komala Santika dan Photograpi yang handal di
                                bidangnya. Paket ini tidak termasuk tempat prewedding dan Videografi
                            </li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Rias Hemat : </strong>
                                Paket ini hadir dengan kategori hemat yang sudah termasuk Paket MUA dan Wardrobe dari Salon
                                Komala Santika. Paket ini tidak termasuk Photografi, Videografi dan tempat prewedding
                            </li>
                        </ul>
                        <hr>
                        <h4>Prewedding Casual : </h4>
                        <ul class="fa-ul list-li-push">
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Premium :
                                </strong>
                                Pake ini hadir dengan nuansa prewedding yang casual dan elegan dengan kategori premium yang
                                sudah termasuk Paket MUA dan wardrobe dari Salon Komala Santika dan Photografi yang handal
                                di bidangnya.
                            </li>
                            <li><i class="fa fa-li fa-check text-success"></i> <strong>Paket Hemat : </strong>
                                Paket ini hadir dengan nuansa prewedding yang casual dan elegan yang sudah termasuk Paket
                                MUA dan Wardrobe dari Salon Komala Santika
                            </li>
                        </ul>
                    </div>
                    <p class="text-muted mt-4">You can also have content that ignores toggling..</p>
                    <!-- END Interactive Content -->
                </div>
                <!-- END Interactive Block -->
            </div>

        </div>
    </div>
    <!-- END Page Content -->
@endsection
