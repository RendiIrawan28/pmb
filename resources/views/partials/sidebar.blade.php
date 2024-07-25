<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a ><img src="{{ asset('assets/compiled/png/uim.png') }}"
                        style="width:230px;height:100px;" alt="Logo" srcset=""></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <h3>Halo {{ Auth::user()->name }}!</h3>
                {{-- <li class="sidebar-item" style="border-top: 1px solid #ccc; margin: 10px 0;"></li> --}}
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item ">
                    <a href="{{ route('pendaftaran') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Pendaftaran</span>
                    </a>
                    <a href="{{ route('fileUpload') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Upload data</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-person"></i>
                        <span>Profile Settings</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item  ">
                            <a href="{{ route('profile.edit') }}" class="submenu-link">Profile</a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="submenu-item">
                                <a href="table-datatable.html" class="submenu-link"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </li>
                        </form>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
