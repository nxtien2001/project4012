<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        <a href="{{route('admin.index')}}" class="logo text-center mb-4">
            <span class="logo-lg">
                <img src="{{asset('backend\images\logo-dark.png')}}" alt="" height="20">
            </span>
            <span class="logo-sm">
                <img src="{{asset('backend\images\logo-sm.png')}}" alt="" height="24">
            </span>
        </a>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Tùy chọn</li>
                <li>
                    <a href="{{route('admin.categories.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Danh mục sản phẩm </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.products.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Sản phẩm </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.attributes.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Thuộc tính </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.posts.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Bài viết </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.comments.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Bình luận </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Thành viên </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.invoices.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Đơn hàng </span>
                    </a>
                </li>
            </ul>

        </div>

        <div class="clearfix"></div>

    </div>

</div>