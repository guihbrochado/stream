<aside class="sidebar sidebar-base sidebar-white sidebar-default navs-rounded-all " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ url('/') }}" class="navbar-brand">

            <!--Logo start-->
            <img class="logo-normal" src="assets/dashboard/images/logo.png" alt="#">
            <img class="logo-normal logo-white" src="assets/dashboard/images/logo-white.png" alt="#">
            <img class="logo-full" src="assets/dashboard/images/logo-full.png" alt="#">
            <img class="logo-full logo-full-white" src="assets/dashboard/images/logo-full-white.png" alt="#">
            <!--logo End--> </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="chevron-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" viewBox="0 0 512 512" fill="white">
                    <path d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                </svg>
            </i>
            <i class="chevron-left">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" viewBox="0 0 512 512" fill="white" transform="rotate(180)">
                    <path d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z" />
                </svg>
            </i>
        </div>
    </div>


    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('manage.index')}}">
                        <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Dashboard" data-bs-original-title="Dashboard">
                            <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="dashboard/app/user-list.html">
                        <i class="icon" data-bs-toggle="tooltip" title="User" data-bs-placement="right" aria-label="User" data-bs-original-title="User">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-courses" role="button" aria-expanded="false" aria-controls="sidebar-courses">
                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M22 12.0048C22 17.5137 17.5116 22 12 22C6.48842 22 2 17.5137 2 12.0048C2 6.48625 6.48842 2 12 2C17.5116 2 22 6.48625 22 12.0048Z" fill="currentColor"></path>
                            <path d="M16 12.0049C16 12.2576 15.9205 12.5113 15.7614 12.7145C15.7315 12.7543 15.5923 12.9186 15.483 13.0255L15.4233 13.0838C14.5881 13.9694 12.5099 15.3011 11.456 15.7278C11.456 15.7375 10.8295 15.9913 10.5312 16H10.4915C10.0341 16 9.60653 15.7482 9.38778 15.34C9.26847 15.1154 9.15909 14.4642 9.14915 14.4554C9.05966 13.8712 9 12.9769 9 11.9951C9 10.9657 9.05966 10.0316 9.16903 9.45808C9.16903 9.44836 9.27841 8.92345 9.34801 8.74848C9.45739 8.49672 9.65625 8.2819 9.90483 8.14581C10.1037 8.04957 10.3125 8 10.5312 8C10.7599 8.01069 11.1875 8.15553 11.3565 8.22357C12.4702 8.65128 14.598 10.051 15.4134 10.9064C15.5526 11.0425 15.7017 11.2087 15.7415 11.2467C15.9105 11.4605 16 11.723 16 12.0049Z" fill="currentColor"></path>
                        </svg>
                        <span class="item-name">Cursos</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-courses" data-bs-parent="#sidebar-courses">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('courses.index')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Cursos" data-bs-placement="right" aria-label="Cursos" data-bs-original-title="Cursos">
                                    <i class="fas fa-th"></i>
                                </i>
                                <span class="item-name">Cursos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('coursesmodules.index')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="Modulos" data-bs-original-title="Modulos">
                                    <i class="fas fa-th-large"></i>
                                </i>
                                <span class="item-name">Modulos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('courseslessons.index')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Aulas" data-bs-placement="right" aria-label="Aulas" data-bs-original-title="Aulas">
                                <i class="far fa-square"></i>
                                                            </i>

                                <span class="item-name">Aulas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-blog" role="button" aria-expanded="false" aria-controls="sidebar-blog">
                        <i class="icon" data-bs-toggle="tooltip" title="Blog" data-bs-placement="right" aria-label="Blog" data-bs-original-title="Blog">
                            <i class="fas fa-blog"></i> </i>
                        <span class="item-name">Blog</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-blog" data-bs-parent="#sidebar-blog">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('blogstream.index')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Blog" data-bs-placement="right" aria-label="Blog" data-bs-original-title="Blog">
                                    <i class="fas fa-blog"></i> </i>
                                <span class="item-name">Blog</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('blogcategory.index')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Categorias" data-bs-placement="right" aria-label="Categorias" data-bs-original-title="Categorias">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Categorias</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('blogimage.index')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Imagens" data-bs-placement="right" aria-label="Imagens" data-bs-original-title="Categorias">
                                    <i class="fas fa-images"></i> </i>
                                <span class="item-name">Imagens</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-lives" role="button" aria-expanded="false" aria-controls="sidebar-lives">
                        <i class="fas fa-video"></i>
                        <span class="item-name">Sala ao vivo</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-lives" data-bs-parent="#sidebar-lives">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('rooms.all') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="lives" data-bs-placement="right" aria-label="lives" data-bs-original-title="lives">
                                    <i class="fas fa-video"></i>
                                </i>
                                <span class="item-name">Sala ao vivo</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="dashboard/widget/widgetchart.html">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="Modulos" data-bs-original-title="Modulos">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Categoria</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-store" role="button" aria-expanded="false" aria-controls="sidebar-store">
                        <i class="fas fa-store-alt"></i>
                        <span class="item-name">Loja</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-store" data-bs-parent="#sidebar-store">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('product.index') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="lives" data-bs-placement="right" aria-label="lives" data-bs-original-title="lives">
                                    <i class="fas fa-shopping-bag"></i>
                                </i>
                                <span class="item-name">Produtos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('category.index') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="Modulos" data-bs-original-title="Modulos">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Categoria</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('subcategory.index') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="Modulos" data-bs-original-title="Modulos">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Subcategorias</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-pages" role="button" aria-expanded="false" aria-controls="sidebar-pages">
                        <i class="fab fa-pagelines"></i>
                        <span class="item-name">Páginas</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-pages" data-bs-parent="#sidebar-pages">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('about.all') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="lives" data-bs-placement="right" aria-label="pages" data-bs-original-title="pages">
                                    <i class="fas fa-house-user"></i>
                                </i>
                                <span class="item-name">Sobre</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="dashboard/widget/widgetchart.html">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="pages" data-bs-original-title="pages">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Contato</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('faq.index_admin') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="pages" data-bs-original-title="pages">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Faq</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link " href="dashboard/widget/widgetchart.html">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="pages" data-bs-original-title="pages">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Politicas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="dashboard/widget/widgetchart.html">
                                <i class="icon" data-bs-toggle="tooltip" title="Modulos" data-bs-placement="right" aria-label="pages" data-bs-original-title="pages">
                                    <i class="fas fa-bars"></i>
                                </i>
                                <span class="item-name">Planos</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>