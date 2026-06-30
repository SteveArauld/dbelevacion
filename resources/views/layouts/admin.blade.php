<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! trim(View::yieldContent('title') . ' | ' . data_get($appSettings, 'site_name', 'Medjobs')) !!}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #4e73df;
            --secondary-color: #6c757d;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --dark-color: #5a5c69;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #wrapper {
            display: flex;
        }

        /* Sidebar */
        #sidebar-wrapper {
            min-height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            color: white;
            transition: all 0.3s;
            position: fixed;
            z-index: 1000;
        }

        .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            font-weight: 700;
            text-align: center;
            background: rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            padding: 1rem 1.25rem;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .list-group-item:hover,
        .list-group-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: #f8f9fc;
        }

        .list-group-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }

        /* Content */
        #page-content-wrapper {
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }

        .page-header {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 20px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 700;
            padding: 1rem 1.35rem;
            border-radius: 10px 10px 0 0 !important;
        }

        /* Stats Cards */
        .stat-card {
            border-left: 4px solid;
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.primary {
            border-left-color: var(--primary-color);
        }

        .stat-card.success {
            border-left-color: var(--success-color);
        }

        .stat-card.info {
            border-left-color: var(--info-color);
        }

        .stat-card.warning {
            border-left-color: var(--warning-color);
        }

        .stat-card.danger {
            border-left-color: var(--danger-color);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #5a5c69;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #858796;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Badges */
        .badge-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-active {
            background: #d1e7dd;
            color: #0f5132;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .badge-expired {
            background: #e2e3e5;
            color: #383d41;
        }

        /* Tables */
        .table th {
            font-weight: 700;
            color: #4e73df;
            border-bottom: 2px solid #e3e6f0;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fc;
        }

        /* Buttons */
        .btn-admin {
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -var(--sidebar-width);
            }

            #page-content-wrapper {
                width: 100%;
                margin-left: 0;
            }

            body.sb-sidenav-toggled #sidebar-wrapper {
                margin-left: 0;
            }

            body.sb-sidenav-toggled #page-content-wrapper {
                margin-left: var(--sidebar-width);
            }
        }
    </style>

    @stack('styles')
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading">
            <i class="fas fa-hospital-alt me-2"></i>
            MedJobs237 Admin
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-tachometer-alt"></i>
                Tableau de bord
            </a>

            <!-- Abonnements -->
            <a href="#subscriptionMenu" class="list-group-item list-group-item-action" data-bs-toggle="collapse">
                <i class="fas fa-crown"></i>
                Abonnements
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse show" id="subscriptionMenu">
                <a href="{{ route('admin.subscriptions.index') }}" class="list-group-item list-group-item-action ps-5">
                    <i class="fas fa-list"></i>
                    Tous les abonnements
                </a>
                <a href="{{ route('admin.subscriptions.plans.index') }}"
                   class="list-group-item list-group-item-action ps-5">
                    <i class="fas fa-box"></i>
                    Plans d'abonnement
                </a>
                <a href="{{ route('admin.subscriptions.reports') }}"
                   class="list-group-item list-group-item-action ps-5">
                    <i class="fas fa-chart-bar"></i>
                    Rapports
                </a>
            </div>

            <!-- Utilisateurs -->
            <a href="#userMenu" class="list-group-item list-group-item-action" data-bs-toggle="collapse">
                <i class="fas fa-users"></i>
                Utilisateurs
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <div class="collapse" id="userMenu">
                <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action ps-5">
                    <i class="fas fa-user-friends"></i>
                    Tous les utilisateurs
                </a>
                <a href="" class="list-group-item list-group-item-action ps-5">
                    <i class="fas fa-user-md"></i>
                    Candidats
                </a>
                <a href="" class="list-group-item list-group-item-action ps-5">
                    <i class="fas fa-hospital"></i>
                    Organisations
                </a>
            </div>

            <!-- Offres d'emploi -->
            <a href="{{ route('admin.jobs.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-briefcase"></i>
                Offres d'emploi
            </a>

            <!-- Support -->
            <a href="" class="list-group-item list-group-item-action">
                <i class="fas fa-headset"></i>
                Support
                <span class="badge bg-danger float-end mt-1">3</span>
            </a>

            <!-- Paramètres -->
            <a href="{{ route('admin.settings') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-cog"></i>
                Paramètres
            </a>

            <!-- Déconnexion -->
            <a href="{{ route('logout') }}" class="list-group-item list-group-item-action mt-4"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded mb-4">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle fa-lg me-2"></i>
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="">
                                <i class="fas fa-user-edit me-2"></i>Mon profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-5 pt-4 border-top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 ">
                        © {{ date('Y') }} MedJobs237. Tous droits réservés.
                    </div>
                    <div class="col-md-6 text-md-end">
                            <span class="">
                                Version 1.0.0 •
                                <i class="fas fa-server me-1"></i>{{ gethostname() }}
                            </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Toggle sidebar
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.body.classList.toggle('sb-sidenav-toggled');
    });

    // Initialize DataTables
    $(document).ready(function () {
        $('.datatable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
            },
            pageLength: 25,
            responsive: true
        });
    });

    // Auto-dismiss alerts
    setTimeout(function () {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>

@stack('scripts')
</body>
</html>