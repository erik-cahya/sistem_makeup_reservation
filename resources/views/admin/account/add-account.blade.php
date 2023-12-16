@extends('admin.layouts.main')
@section('page_content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Forms General Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="gi gi-notes_2"></i>Add Data Account<br><small>Clean and professional forms for your
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
                        <h2><strong>Form Data</strong> Account</h2>
                    </div>
                    <!-- END Form Elements Title -->


                    <!-- Basic Form Elements Content -->
                    <form action="/account" method="POST" enctype="multipart/form-data"
                        class="form-horizontal form-bordered">
                        @csrf

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-text-input">Nama</label>
                            <div class="col-md-9">
                                <input type="text" id="example-text-input" name="name" class="form-control"
                                    placeholder="Masukkan Nama Pengguna">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-text-input">Email</label>
                            <div class="col-md-9">
                                <input type="email" id="example-text-input" name="email" class="form-control"
                                    placeholder="Masukkan Email Pengguna">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-email-input">Password</label>
                            <div class="col-md-9">
                                <input type="password" id="example-email-input" name="password" class="form-control"
                                    placeholder="Masukkan Password Pengguna">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status">Pilih Level Pengguna</label>
                            <div class="col-md-9">
                                <select id="example-select2" name="status" class="select-select2" style="width: 100%;"
                                    data-placeholder="Pilih level pengguna..">
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                    <option value ="client">Client</option>
                                    <option value ="admin">Admin</option>
                                </select>
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
