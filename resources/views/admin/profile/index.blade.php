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
                        <h2><i class="fa fa-file-o"></i> <strong>Profile</strong> Info</h2>
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
                <!-- Meta Data Block -->
                <div class="block">
                    <!-- Meta Data Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-user"></i> <strong>Profile</strong> Edit</h2>
                    </div>
                    <!-- END Meta Data Title -->

                    <!-- Meta Data Content -->
                    <form action="/profile/{{ Auth::user()->id }}" method="post" class="form-horizontal form-bordered">
                        @csrf
                        @method('PUT')

                        @foreach ($data_profile as $profile)
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="product-meta-title">Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter meta title.." value="{{ $profile->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Email</label>
                                <div class="col-md-9">
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="keyword1, keyword2, keyword3" value="{{ $profile->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password"> Change Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Change your password..">
                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i>
                                        Save</button>
                                    <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i>
                                        Reset</button>
                                </div>
                            </div>
                        @endforeach
                    </form>
                    <!-- END Meta Data Content -->
                </div>
                <!-- END Meta Data Block -->


            </div>
        </div>
        <!-- END Customer Content -->
    </div>
    <!-- END Page Content -->
@endsection
