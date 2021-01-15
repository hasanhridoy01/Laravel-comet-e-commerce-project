<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="">
                    <a href="{{ route('home') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
                   <ul style="display: none;">
                        <li><a href="{{ route('post.index') }}">All Posts</a></li>
                        <li><a href="{{ route('product.index') }}">Product</a></li>
                        <li><a href="{{ route('post-category.index') }}">Category</a></li>
                        <li><a href="{{ route('tag.index') }}">tag</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Home Settings </span> <span class="menu-arrow"></span></a>
                   <ul style="display: none;">
                        <li><a href="{{ route('slider.index') }}">Slider</a></li>
                        <li><a href="{{ route('wwa.index') }}">Who We Are</a></li>
                        <li><a href="{{ route('logo.index') }}">Testimonials</a></li>
                        <li><a href="{{ route('logo.index') }}">Vision</a></li>
                        <li><a href="{{ route('logo.index') }}">Home SetUp</a></li>
                   </ul>
                </li>

                 <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
                   <ul style="display: none;">
                        <li><a href="{{ route('logo.index') }}">Logo</a></li>
                        <li><a href="{{ route('social.index') }}">Social Icon</a></li>
                        <li><a href="{{ route('client.index') }}">Client</a></li>
                        <li><a href="{{ route('copyright.index') }}">CopyRight</a></li>
                        <li><a href="">Footer</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
