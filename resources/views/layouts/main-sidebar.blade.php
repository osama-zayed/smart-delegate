<div class="container-fluid">
    <div class="row">
        <div class="side-menu-fixed">
            <div class="scrollbar">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- Profile Section (قسم الملف الشخصي) -->
                    <div class="d-flex justify-content-center align-items-center mt-10">
                        <div class="rounded-circle mb-20" style="width: 100px; height: 100px; overflow: hidden;">
                            <img class="img-fluid" src="{{ asset('assets/images/favicon.ico') }}" alt="profile" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div class="text-center mb-20">
                        <h6 class="text-white">{{ session('name', 'Guest') }}
                        </h6>
                    </div>

                    <!-- Dashboard (الصفحة الرئيسية) -->
                    <li>
                        <a href="{{ route('home') }}">
                            <div class="pull-left">
                                <i class="ti-dashboard"></i>
                                <span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- User Management (إدارة المستخدمين) -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">User Management</li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text">Users</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('user.index') }}">User List</a> <!-- (قائمة المستخدمين) --></li>
                            <li><a href="{{ route('user.create') }}">Add User</a> <!-- (إضافة مستخدم) --></li>
                        </ul>
                    </li>

                    <!-- Room Management (إدارة الغرف) -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#rooms">
                            <div class="pull-left">
                                <i class="ti-home"></i>
                                <span class="right-nav-text">Rooms</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="rooms" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('rooms.index') }}">Room List</a> <!-- (عرض الغرف) --></li>
                        </ul>
                    </li>

                    <!-- Content Management (إدارة المحتوى) -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#content">
                            <div class="pull-left">
                                <i class="ti-pencil-alt"></i>
                                <span class="right-nav-text">Content</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="content" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('posts.index') }}">Add Post</a> <!-- (عرض المنشورات) --></li>
                            <li><a href="{{ route('posts.index') }}">Post List</a> <!-- (عرض المنشورات) --></li>
                        </ul>
                    </li>

                    <!-- Notifications (الإشعارات) -->
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#notifications">
                            <div class="pull-left">
                                <i class="ti-bell"></i>
                                <span class="right-nav-text">Notifications</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="notifications" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('notifications.create') }}">Send Notification</a> <!-- (إرسال إشعار) --></li>
                    <li><a href="{{ route('notifications.index') }}">Notification Log</a> <!-- (سجل الإشعارات) --></li>
                </ul>
                </li> --}}

                <!-- proposals (إدارة الاستبيانات) -->
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#proposals">
                        <div class="pull-left">
                            <i class="ti-list"></i>
                            <span class="right-nav-text">Poposals</span>
                        </div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="proposals" class="collapse" data-parent="#sidebarnav">
                        {{-- <li><a href="{{ route('proposals.create') }}">Add proposal</a> <!-- (إضافة استبيان) -->
                </li> --}}
                <li><a href="{{ route('proposals.index') }}">proposal List</a> <!-- (قائمة الاستبيانات) --></li>
                </ul>
                </li>

                <!-- Settings (الإعدادات) -->
                {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings">
                            <div class="pull-left">
                                <i class="ti-settings"></i>
                                <span class="right-nav-text">Settings</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="settings" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('settings.profile') }}">Profile Settings</a> <!-- (الإعدادات الشخصية) --></li>
                <li><a href="{{ route('settings.password.update') }}">Change Password</a> <!-- (تغيير كلمة المرور) --></li>
                </ul>
                </li> --}}
                </ul>
            </div>
        </div>