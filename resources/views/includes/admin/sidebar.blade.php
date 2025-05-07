<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
<!--begin::Sidebar Brand-->
<div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="{{ route('admin.index') }}" class="brand-link">
    <!--begin::Brand Text-->
    <span class="m-0 brand-text fw-light">Админ-панель</span>
    <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
</div>
<!--end::Sidebar Brand-->
<!--begin::Sidebar Wrapper-->
<div class="sidebar-wrapper">
    <nav class="mt-2">
    <!--begin::Sidebar Menu-->
    <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false"
    >
        <li class="nav-header">Посты</li>

        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
                <i class="nav-icon bi bi-newspaper"></i>
                <p>
                    Посты <span class="nav-badge badge text-bg-secondary me-3">{{ $postsCount }}</span>
                </p>
            </a>
        </li>


    </ul>
    <!--end::Sidebar Menu-->
    </nav>
</div>
<!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->