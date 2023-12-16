<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="index.html" class="sidebar-brand" style="font-size: 12px">
                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Komala Santika</strong>
                    Makeup</span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">

                <div class="sidebar-user-avatar">
                    <a href="page_ready_user_profile.html">
                        <img src="{{ asset('vendor/admin') }}/img/placeholders/avatars/avatar2.jpg" alt="avatar">
                    </a>
                </div>

                <div class="sidebar-user-name">{{ Auth::user()->name }}</div>

                <div class="sidebar-user-links">

                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings"
                        onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>

                    <form method="POST" id="logoutForm" action="{{ route('logout') }}" style="display: inline">
                        @csrf

                        <a href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit()"
                            data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i>
                        </a>
                        <form>
                </div>

            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="/dashboard" class="{{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                        <i class="gi gi-stopwatch sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Dashboard</span>
                    </a>
                </li>

                <li
                    class="{{ (request()->segment(1) == 'orders' ? 'active' : request()->segment(1) == 'booking') ? 'active' : '' }}">
                    <a href="#" class="sidebar-nav-menu"><i
                            class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                            class="gi gi-shopping_cart sidebar-nav-icon"></i><span
                            class="sidebar-nav-mini-hide">Booking</span></a>
                    <ul>
                        @if (Auth::user()->status == 'admin')
                            <li>
                                <a href="/orders"
                                    class="{{ request()->segment(1) == 'orders' ? 'active' : '' }}">Orders</a>
                            </li>
                        @endif
                        <li>
                            <a href="/booking"
                                class="{{ request()->segment(1) == 'booking' ? 'active' : '' }}">Booking</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-options clearfix">

                        <a href="javascript:void(0)" data-toggle="tooltip"
                            title="Create the most amazing pages with the widget kit!">
                            <i class="gi gi-lightbulb"></i></a></span>
                    <span class="sidebar-header-title">Profile Account</span>
                </li>

                @if (Auth::user()->status == 'admin')
                    <li class="{{ request()->segment(1) == 'account' ? 'active' : '' }}">
                        <a href="#" class="sidebar-nav-menu"><i
                                class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                                class="gi gi-group sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">User
                                Account</span></a>
                        <ul>
                            <li>
                                <a href="/account" class="{{ request()->segment(2) == '' ? 'active' : '' }}">User
                                    Account</a>
                            </li>
                            <li>
                                <a href="/account/create"
                                    class="{{ request()->segment(2) == 'create' ? 'active' : '' }}">Add
                                    Account</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class='{{ request()->segment(1) == 'profile' ? 'active' : '' }}'>
                    <a href="/profile"><i class="gi gi-user sidebar-nav-icon"></i><span
                            class="sidebar-nav-mini-hide">Profile</span></a>
                </li>
            </ul>

        </div>
    </div>
</div>
