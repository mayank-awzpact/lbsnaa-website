<div class="sidebar-area" id="sidebar-area">
        <div class="logo position-relative">
            <a href="index.html" class="d-block text-decoration-none">
                <img src="{{ asset('admin_assets/images/logo.png') }}" alt="logo-icon">
            </a>
            <button
                class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
                id="sidebar-burger-menu">
                <i data-feather="x"></i>
            </button>
        </div>
        
        <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar="">
            <ul class="menu-inner">
                <li class="menu-title small text-uppercase">
                    <span class="menu-title-text">Main Website</span>
                </li>
                <li class="menu-item open">
                    <a href="{{ route('admin.index') }}" class="menu-link active">
                        <i data-feather="grid" class="menu-icon tf-icons"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item open">
                    <a href="javascript:void(0);" class="menu-link">
                        <i data-feather="grid" class="menu-icon tf-icons"></i>
                        <span class="title">View Profile</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                        <span class="title">User Management</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage User
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="documents.html" class="menu-link">
                                Manage Role
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="media.html" class="menu-link">
                                Designation Management
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                        <span class="title">CMS Page</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('admin.menus.index') }}" class="menu-link">
                                Manage Menu
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Organization Module</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Organization Chart
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.faculty.index') }}" class="menu-link">
                                Manage Faculty
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.staff.index') }}" class="menu-link">
                                Manage Staff
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('sections.index') }}" class="menu-link">
                                Manage Sections
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                        <span class="title">Training Master Management</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Organiser
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Coordinator
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Venue
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Founder
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Cadre
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Category
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Country
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage State
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Districts
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Exam
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Middle Section</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Latest Updates</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.news.index') }}" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage News</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Events</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Tender</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Feedback</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="mail" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Souvenir Module</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Master Categories
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Academy Souvenir
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="mail" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Course Module</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Course Category/Subcategory
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Course
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Course CMS
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Survey List</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Vacancy</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage RTI</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage FAQ's</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Social Media</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.footer_images.index') }}" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Logo</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="printer" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Media Center</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('admin.slider_list') }}" class="menu-link">
                                Home Banner
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Audio Gallery
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Photo Gallery
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Video Gallery
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Photo Gallery/ Video Gallery
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="chat.html" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Audit</span>
                    </a>
                </li>
                <li class="menu-title small text-uppercase">
                    <span class="menu-title-text">Micro-Website</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                        <span class="title">CMS Page</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Manage Menu
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage What's New / Quick Links</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage News</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Training Programs</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Organization Setup</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Vacancy</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle active">
                        <i data-feather="printer" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Media Center</span>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Home Banner
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Photo Gallery
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Video Gallery
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                Photo Gallery/ Video Gallery
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="chat.html" class="menu-link">
                        <i data-feather="message-square" class="menu-icon tf-icons"></i>
                        <span class="title">Manage Audit</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="bg-white z-1 admin">
            <div class="d-flex align-items-center admin-info border-top">
                <div class="flex-shrink-0">
                    <a href="profile.html" class="d-block">
                        <img src="{{ asset('admin_assets/images/avatar-14.jpg') }}" class="rounded-circle wh-54" alt="admin">
                    </a>
                </div>
                <div class="flex-grow-1 ms-3 info">
                    <a href="profile.html" class="d-block name">Adison Jeck</a>
                    <a href="logout.html">Log Out</a>
                </div>
            </div>
        </div>
        
    </div>