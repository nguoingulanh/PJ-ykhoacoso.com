<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('admin.home')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Feature</span></li>
                <li class="sidebar-item {{ Request::is('admin/category*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="grid" class="feather-icon"></i>
                        <span class="hide-menu">Category </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('category.index')}}" class="sidebar-link">
                                <span class="hide-menu"> All Category </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('category.create')}}" class="sidebar-link">
                                <span class="hide-menu"> Add Category </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Request::is('admin/post*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="tag" class="feather-icon"></i>
                        <span class="hide-menu">Posts </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('post.index')}}" class="sidebar-link">
                                <span class="hide-menu"> All Posts </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('post.create')}}" class="sidebar-link">
                                <span class="hide-menu"> Add Posts </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Request::is('admin/product*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="package" class="feather-icon"></i>
                        <span class="hide-menu">Product </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('product.index')}}" class="sidebar-link">
                                <span class="hide-menu"> All Product </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('product.create')}}" class="sidebar-link">
                                <span class="hide-menu"> Add Product </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Request::is('admin/user*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu">User </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('user.index')}}" class="sidebar-link">
                                <span class="hide-menu"> All User </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.create')}}" class="sidebar-link">
                                <span class="hide-menu"> Add User </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('order.index')}}" aria-expanded="false">
                        <i data-feather="shopping-bag" class="feather-icon"></i>
                        <span class="hide-menu">Order</span><span class="float-right">({{$order}})</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Application</span></li>
                <li class="sidebar-item {{ Request::is('admin/slider*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="sliders" class="feather-icon"></i>
                        <span class="hide-menu">Slider </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('slider.index')}}" class="sidebar-link">
                                <span class="hide-menu"> All Slider </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('slider.create')}}" class="sidebar-link">
                                <span class="hide-menu"> Add Slider </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('social.index')}}" aria-expanded="false">
                        <i data-feather="command" class="feather-icon"></i>
                        <span class="hide-menu">Social</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('custom.get')}}" aria-expanded="false">
                        <i data-feather="box" class="feather-icon"></i>
                        <span class="hide-menu">Custom JS, CSS</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('admin/media*') ? 'selected' : '' }}">
                    <a class="sidebar-link sidebar-link {{ Request::is('admin/media*') ? 'active' : '' }}" href="{{route('media.index')}}" aria-expanded="false">
                        <i data-feather="file" class="feather-icon"></i>
                        <span class="hide-menu">File Manager</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Site Administrator</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="settings" class="feather-icon"></i>
                        <span class="hide-menu">Setting</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('setting.get.general')}}" class="sidebar-link">
                                <span class="hide-menu"> General </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('setting.get.permalink')}}" class="sidebar-link">
                                <span class="hide-menu"> Permalink </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('setting.get.fields')}}" class="sidebar-link">
                                <span class="hide-menu"> Custom fields </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('setting.get.identify')}}" aria-expanded="false">
                        <i data-feather="globe" class="feather-icon"></i>
                        <span class="hide-menu">Site identify</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('requestlogs.index')}}" aria-expanded="false">
                        <i data-feather="link-2" class="feather-icon"></i>
                        <span class="hide-menu">Request Logs</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
