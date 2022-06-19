<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Klaims Manager <?php echo $__env->yieldContent('title'); ?></title>
        <link rel="stylesheet" href="../resources/css/app.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.js" crossorigin="anonymous"></script>

        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                            <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                <span class="fs-5 d-none d-sm-inline">KLAIMS MANAGER</span>
                            </a>
                                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                        <li class="nav-item">
                                            <a href="accueil" class="nav-link align-middle px-0">
                                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard" class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Tableau de bord</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="performance" class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-graph-up-arrow"></i> <span class="ms-1 d-none d-sm-inline">Performance</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="finance" class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-currency-dollar"></i> <span class="ms-1 d-none d-sm-inline">Finance</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="calendrier" class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-calendar3"></i> <span class="ms-1 d-none d-sm-inline">Calendrier</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dossiers"class="nav-link px-0 align-middle ">
                                                <i class="fs-4 bi-folder-symlink"></i> <span class="ms-1 d-none d-sm-inline">Dossiers</span></a>
                                        </li>
                                        <li>
                                            <a href="contacts" class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Contacts</span> </a>
                                        </li>
                                        <li>
                                            <a href="parametres" class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-gear-wide-connected"></i> <span class="ms-1 d-none d-sm-inline">Paramètres</span> </a>
                                        </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
    </head>

    <body>

        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>
