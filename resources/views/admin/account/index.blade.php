@extends('admin.layouts.main')
@section('page_content')
    <div id="page-content">

        <!-- Quick Stats -->
        <div class="row text-center">


            <div class="col-sm-12 col-lg-12">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-dark">
                        <h4 class="widget-content-light"><strong>Total</strong> Account</h4>
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
                <h2><strong>All</strong> Account</h2>
            </div>
            <!-- END All Products Title -->

            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 70px;">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $ord)
                        <tr>
                            <td class="text-center"><strong>{{ $loop->iteration }}</strong></td>
                            <td class="text-center">{{ $ord->name }}</td>
                            <td class="text-center">{{ $ord->email }}</td>
                            <td class="text-center">
                                <span
                                    class="label
                                label-{{ $ord->status === 'admin' ? 'warning' : ($ord->status === 'client' ? 'success' : 'danger') }}">
                                    {{ $ord->status }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">

                                    <form method="POST" action="/profile/{{ $ord->id }}" style="display: inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-danger btn-xs " name="archive" type="submit"
                                            onclick="return confirm('Yakin Ingin Menghapus Data User ?')">
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
