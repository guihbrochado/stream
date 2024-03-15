<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('/') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/OFLOGOpng.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/OFLOGOpng.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{ url('/') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/OFLOGOpng.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/OFLOGOpng.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if (auth()->user()->can('admin') || auth()->user()->can('user') || auth()->user()->can('client'))
                <li>
                    <a href="{{ route('conta_investimento.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-moneybag"></i>
                        <span>Conta Investimento</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('deals.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-list-ul"></i>
                        <span>Histórico de posições</span>
                    </a>
                </li>
                <!--li>
                    <a href="{{ route('cockpit.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-arrow-growth"></i>
                        <span>Cockpit</span>
                    </a>
                </li-->
                <li>
                    <a href="{{ route('page.calendar.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-calender"></i>
                        <span>Calendário</span>
                    </a>
                </li>
                <!--li>
                    <a href="{{ route('page.economic_calendar') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-newspaper"></i>
                        <span>Calendário Econômico</span>
                    </a>
                </li-->
                <li>
                    <a href="{{ route('traders_courses.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-question-circle"></i>
                        <span>Cursos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('faq.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-question-circle"></i>
                        <span>Perguntas Frequentes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('usage_policy.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-document-layout-left"></i>
                        <span>Política de Uso</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('store.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-store"></i>
                        <span>Loja Trader</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('suporte.index') }}" class="waves-effect mb-2 rounded-5">
                        <i class="uil-comment"></i>
                        <span>Suporte</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->can('admin') ||
                        auth()->user()->can('user'))
                    <li class="menu-title">Administração</li>
                    @if (auth()->user()->can('admin'))
                        <li>
                            <a href="{{ route('customer.index') }}" class="waves-effect mb-2 rounded-5">
                                <i class="uil-user-check"></i>
                                <span>Clientes Ativos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ticket.index') }}" class="waves-effect mb-2 rounded-5">
                                <i class="uil-comments-alt"></i>
                                <span>Ticket</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pagamento.index') }}" class="waves-effect mb-2 rounded-5">
                                <i class="uil-dollar-alt"></i>
                                <span>Identificação de pagamento</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('customer_grid.index') }}" class="waves-effect mb-2 rounded-5">
                                <i class="uil-user-circle"></i>
                                <span>Lista de Usuários</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('order_error.index') }}" class="waves-effect mb-2 rounded-5">
                                <i class="uil-exclamation-triangle"></i>
                                <span>Log Erros de Ordens</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('status_copy.index') }}" class="waves-effect mb-2 rounded-5">
                            <i class="uil-dashboard"></i>
                            <span>Status do Copy</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('expert_advisor.index_config') }}" class="waves-effect">
                            <i class="uil-robot"></i>
                            <span>Gestão de EAs</span>
                        </a>
                    </li>

                    @if (auth()->user()->can('admin'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect mb-2 rounded-5">
                                <i class="uil-clipboard-blank"></i>
                                <span>Cadastros</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('calendar.index') }}">Canlendário</a></li>
                                <li><a href="{{ route('account.index') }}">Contas MT5</a></li>
                                <li><a href="{{ route('broker.index') }}">Corretoras</a></li>
                                <li><a href="{{ route('expert_advisor.index') }}">Expert Advisors</a></li>
                                <li><a href="{{ route('faq_category.index') }}">Faq - Categorias</a></li>
                                <li><a href="{{ route('faq.index_admin') }}">Faq - Questões</a></li>
                                <li><a href="{{ route('license.index') }}">Licenças</a></li>
                                <li><a href="{{ route('usage_policy_category.index') }}">Política de Uso - Categorias</a></li>
                                <li><a href="{{ route('usage_policy.index_admin') }}">Política de Uso - Tópicos</a></li>
                                <li><a href="{{ route('user.index') }}">Usuários</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-users-alt"></i>
                                <span>Grupos de Supervisão</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('supervisor_group.index') }}">Grupos</a></li>
                                <li><a href="{{ route('supervisor_group_expert.index') }}">Experts</a></li>
                                <li><a href="{{ route('supervisor.index') }}">Supervisores</a></li>
                                <li><a href="{{ route('supervisor_group_member.index') }}">Membros</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-store"></i>
                                <span>Loja</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('store_company.index') }}">Empresas</a></li>
                                <li><a href="{{ route('store_trader.index') }}">Traders</a></li>
                            </ul>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
