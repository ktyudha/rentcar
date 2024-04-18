<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.index') }}">Aksamedia</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.index') }}">AM</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->hasAnyPermission(['users read']) or auth()->user()->hasRole('superadmin'))
                <li class="menu-header">Master</li>
            @endif

            @can('settings')
                <li class="nav-item nav-dropdown @if (@$menuActive === 'settings') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="fas fa-cog"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="@if (@$subMenuActive === 'basic-info') active @endif">
                            <a class="nav-link" href="{{ route('admin.settings.basic-info.edit') }}">
                                Basic Info
                            </a>
                        </li>
                        <li class="@if (@$subMenuActive === 'logo') active @endif">
                            <a class="nav-link" href="{{ route('admin.settings.logo.edit') }}">
                                Logo
                            </a>
                        </li>
                        <li class="@if (@$subMenuActive === 'breadcrumb') active @endif">
                            <a class="nav-link" href="{{ route('admin.settings.breadcrumb.edit') }}">
                                Breadcrumb
                            </a>
                        </li>
                        <li class="@if (@$subMenuActive === 'about') active @endif">
                            <a class="nav-link" href="{{ route('admin.settings.about.index') }}">
                                About
                            </a>
                        </li>
                        <li class="@if (@$subMenuActive === 'social-media') active @endif">
                            <a class="nav-link" href="{{ route('admin.social.index') }}">
                                Social Media
                            </a>
                        </li>
                        <li class="@if (@$subMenuActive === 'popup') active @endif">
                            <a class="nav-link" href="{{ route('admin.settings.popup.index') }}">
                                Pop Up
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @if (auth()->user()->hasAnyPermission([
                        'sliders read',
                        'clients read',
                        'services read',
                        'keunggulan read',
                        'teams read',
                        'testimoni read',
                        'menu read',
                        'submenu read',
                    ]) or auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'landing-page') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="fas fa-map"></i>
                        <span>Landing Page</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('sliders read')
                            <li class="@if (@$subMenuActive === 'sliders') active @endif">
                                <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                                    Intro
                                </a>
                            </li>
                        @endcan
                        {{--  @can('services read')
                            <li class="@if (@$subMenuActive === 'services') active @endif">
                                <a class="nav-link" href="{{ route('admin.services.index') }}">
                                    Service
                                </a>
                            </li>
                        @endcan  --}}
                        @can('keunggulan read')
                            <li class="@if (@$subMenuActive === 'keunggulan') active @endif">
                                <a class="nav-link" href="{{ route('admin.keunggulan.index') }}">
                                    Keunggulan
                                </a>
                            </li>
                        @endcan
                        <!-- @can('portofolio read')
    <li class="@if (@$subMenuActive === 'portofolio') active @endif">
                                                                                                                                                                                                                                                                                            <a class="nav-link" href="{{ route('admin.portofolio.index') }}">
                                                                                                                                                                                                                                                                                    Portofolio</a></li>
@endcan -->
                        @can('clients read')
                            <li class="@if (@$subMenuActive === 'clients') active @endif">
                                <a class="nav-link" href="{{ route('admin.clients.index') }}">
                                    Clients
                                </a>
                            </li>
                        @endcan
                        @can('teams read')
                            <li class="@if (@$subMenuActive === 'teams') active @endif">
                                <a class="nav-link" href="{{ route('admin.teams.index') }}">
                                    Teams
                                </a>
                            </li>
                        @endcan
                        @can('testimoni read')
                            <li class="@if (@$subMenuActive === 'testimoni') active @endif">
                                <a class="nav-link" href="{{ route('admin.testimoni.index') }}">
                                    Testimoni
                                </a>
                            </li>
                        @endcan
                        @can('pages read')
                            <li class="@if (@$subMenuActive === 'pages') active @endif">
                                <a class="nav-link" href="{{ route('admin.pages.index') }}">
                                    Halaman Statis
                                </a>
                            </li>
                        @endcan
                        @can('menus read')
                            <li class="@if (@$subMenuActive === 'menus') active @endif">
                                <a class="nav-link" href="{{ route('admin.menus.update') }}">
                                    Menu
                                </a>
                            </li>
                        @endcan

                        @can('submenus read')
                            <li class="@if (@$subMenuActive === 'submenus') active @endif">
                                <a class="nav-link" href="{{ route('admin.submenus.update') }}">
                                    Sub Menu
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasAnyPermission(['product categories read', 'product posts read']) or auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'product') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="far fa-file-alt"></i>
                        <span>Product</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('product categories read')
                            <li class="@if (@$subMenuActive === 'product-categories') active @endif">
                                <a class="nav-link" href="{{ route('admin.product.categories.index') }}">
                                    Category
                                </a>
                            </li>
                        @endcan
                        @can('product posts read')
                            <li class="@if (@$subMenuActive === 'product-posts') active @endif">
                                <a class="nav-link" href="{{ route('admin.product.posts.index') }}">
                                    Posts
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasAnyPermission([
                        'portofolio info read',
                        'portofolio categories read',
                        'portofolio posts read',
                        'portofolio sliders read',
                    ]) or auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'portofolio') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="far fa-image"></i>
                        <span>Portofolio</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('portofolio info read')
                            <li class="@if (@$subMenuActive === 'portofolio-info') active @endif">
                                <a class="nav-link" href="{{ route('admin.portofolio.info.index') }}">
                                    Management Info
                                </a>
                            </li>
                        @endcan
                        @can('portofolio sliders read')
                            <li class="@if (@$subMenuActive === 'portofolio-sliders') active @endif">
                                <a class="nav-link" href="{{ route('admin.portofolio.sliders.index') }}">
                                    Sliders
                                </a>
                            </li>
                        @endcan
                        @can('portofolio categories read')
                            <li class="@if (@$subMenuActive === 'portofolio-categories') active @endif">
                                <a class="nav-link" href="{{ route('admin.portofolio.categories.index') }}">
                                    Category
                                </a>
                            </li>
                        @endcan
                        @can('portofolio posts read')
                            <li class="@if (@$subMenuActive === 'portofolio-post') active @endif">
                                <a class="nav-link" href="{{ route('admin.portofolio.posts.index') }}">
                                    Portofolio
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasAnyPermission(['people info read', 'people team read', 'people sliders read']) or
                    auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'people') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="far fa-user"></i>
                        <span>People</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('people info read')
                            <li class="@if (@$subMenuActive === 'people-info') active @endif">
                                <a class="nav-link" href="{{ route('admin.people.info.index') }}">
                                    Management Info
                                </a>
                            </li>
                        @endcan
                        @can('people team read')
                            <li class="@if (@$subMenuActive === 'people-team') active @endif">
                                <a class="nav-link" href="{{ route('admin.people.teams.index') }}">
                                    Teams
                                </a>
                            </li>
                        @endcan
                        @can('people sliders read')
                            <li class="@if (@$subMenuActive === 'people-sliders') active @endif">
                                <a class="nav-link" href="{{ route('admin.people.sliders.index') }}">
                                    Sliders
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasAnyPermission(['service info read']) or auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'services') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="far fa-file-alt"></i>
                        <span>Services</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('service info read')
                            <li class="@if (@$subMenuActive === 'services-info') active @endif">
                                <a class="nav-link" href="{{ route('admin.services.info.index') }}">
                                    Management Info
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasAnyPermission(['blog categories read', 'blog posts read']) or auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'blog') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="far fa-clone"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('blog categories read')
                            <li class="@if (@$subMenuActive === 'blog-categories') active @endif">
                                <a class="nav-link" href="{{ route('admin.blog.categories.index') }}">
                                    Category
                                </a>
                            </li>
                        @endcan
                        @can('blog posts read')
                            <li class="@if (@$subMenuActive === 'blog-posts') active @endif">
                                <a class="nav-link" href="{{ route('admin.blog.posts.index') }}">
                                    Posts
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasAnyPermission(['gallery images read', 'gallery videos read', 'gallery file manager access']) or
                    auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'galleries') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="fas fa-images"></i>
                        <span>Galleries</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('gallery images read')
                            <li class="@if (@$subMenuActive === 'images') active @endif">
                                <a class="nav-link" href="{{ route('admin.gallery.index') }}">
                                    Image
                                </a>
                            </li>
                        @endcan
                        @can('gallery videos read')
                            <li class="@if (@$subMenuActive === 'videos') active @endif">
                                <a class="nav-link" href="{{ route('admin.gallery_video.index') }}">
                                    Video
                                </a>
                            </li>
                        @endcan
                        @can('gallery file manager access')
                            <li class="@if (@$subMenuActive === 'file-manager') active @endif">
                                <a class="nav-link" href="{{ route('admin.gallery.file-manager.index') }}">
                                    File Manager
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasAnyPermission(['tamu read', 'jam read']) or auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'tamu') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="far fa-file-alt"></i>
                        <span>Tamu</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('jam read')
                            <li class="@if (@$subMenuActive === 'jam') active @endif">
                                <a class="nav-link" href="{{ route('admin.jam.index') }}">
                                    Jam Kehadiran
                                </a>
                            </li>
                        @endcan
                        @can('tamu read')
                            <li class="@if (@$subMenuActive === 'undangan') active @endif">
                                <a class="nav-link" href="{{ route('admin.tamu.index') }}">
                                    Tamu Undangan
                                </a>
                            </li>
                            <li class="@if (@$subMenuActive === 'undangan') active @endif">
                                <a class="nav-link" href="{{ route('admin.undangan.confirm') }}">
                                    Konfirmasi Kehadiran
                                </a>
                            </li>
                            <li class="@if (@$subMenuActive === 'undangan') active @endif">
                                <a class="nav-link" href="{{ route('admin.undangan.coming') }}">
                                    Tamu Datang
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            <li class="menu-header">Others</li>

            @if (auth()->user()->hasAnyPermission('inboxes read', 'subscribes read') or auth()->user()->hasRole('superadmin'))
                <li class="nav-item dropdown @if (@$menuActive === 'inboxes') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="fas fa-envelope"></i>
                        <span>Inbox</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('inboxes read')
                            <li class="nav-item @if (@$subMenuActive === 'inboxes') active @endif">
                                <a class="nav-link" href="{{ route('admin.inboxes.index') }}">
                                    <span>Inbox</span>
                                </a>
                            </li>
                        @endcan
                        @can('subscribes read')
                            <li class="nav-item @if (@$subMenuActive === 'subscribes') active @endif">
                                <a class="nav-link" href="{{ route('admin.subscribes.index') }}">
                                    <span>Subscribe</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @can('users read')
                <li class="nav-item dropdown @if (@$menuActive === 'users') active @endif">
                    <a class="nav-link has-dropdown" href="#">
                        <i class="fas fa-user"></i>
                        <span>Users</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="@if (@$subMenuActive === 'users') active @endif">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">Users Data</a>
                        </li>
                        @if (auth()->user()->hasRole('superadmin'))
                            <li class="@if (@$subMenuActive === 'roleAndPermissions') active @endif">
                                <a class="nav-link" href="{{ route('admin.roles.index') }}">Role & Permissions</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.auth.logout') }}">
                    <i class="fas fa-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
