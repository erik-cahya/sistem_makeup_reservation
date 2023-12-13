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
                                    <input type="text" id="example-timepicker24" name="time_booking"
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

        </div>
    </div>
    <!-- END Page Content -->
@endsection
