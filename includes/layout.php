<?php

require_once __DIR__ . '/bootstrap.php';

function renderHeader(string $currentPage, string $pageTitle, string $theme, array $extraStyles = []): void
{
    $menu = [
        'index' => ['label' => 'Domov', 'path' => 'index.php'],
        'portfolio' => ['label' => 'Portfolio', 'path' => 'portfolio.php'],
        'qna' => ['label' => 'Q&A', 'path' => 'qna.php'],
        'kontakt' => ['label' => 'Kontakt', 'path' => 'kontakt.php'],
    ];

    $toggleTheme = getOppositeTheme($theme);
    $toggleLabel = $theme === 'dark' ? 'Svetla tema' : 'Tmava tema';

    $currentPath = isset($menu[$currentPage]) ? $menu[$currentPage]['path'] : 'index.php';
    ?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/banner.css">
    <?php foreach ($extraStyles as $extraStyle): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($extraStyle, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="theme-<?php echo htmlspecialchars($theme, ENT_QUOTES, 'UTF-8'); ?>">
<header class="container main-header">
    <div class="logo-holder">
        <a href="<?php echo htmlspecialchars(buildThemeUrl('index.php', $theme), ENT_QUOTES, 'UTF-8'); ?>">
            <img src="img/logo.png" height="40" alt="Logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu">
            <?php foreach ($menu as $menuKey => $menuItem): ?>
                <li>
                    <a
                        class="<?php echo $menuKey === $currentPage ? 'active' : ''; ?>"
                        href="<?php echo htmlspecialchars(buildThemeUrl($menuItem['path'], $theme), ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($menuItem['label'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <li class="theme-switch">
                <a href="<?php echo htmlspecialchars(buildThemeUrl($currentPath, $toggleTheme), ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($toggleLabel, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </li>
        </ul>
        <a class="hamburger" id="hamburger" aria-label="Menu">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>
<main>
<?php
}

function renderFooter(string $theme, array $extraScripts = []): void
{
    ?>
</main>
<footer class="container bg-dark text-white">
    <div class="row">
        <div class="col-25">
            <h4>Kto sme</h4>
            <p>Laboris duis ut est fugiat et reprehenderit magna labore aute.</p>
            <p>Laboris duis ut est fugiat et reprehenderit magna labore aute.</p>
            <p>Laboris duis ut est fugiat et reprehenderit magna labore aute.</p>
        </div>
        <div class="col-25 text-left">
            <h4>Kontaktujte nas</h4>
            <p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:livia.kelebercova@gmail.com"> livia.kelebercova@gmail.com</a></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:0909500600"> 0909500600</a></p>
        </div>
        <div class="col-25">
            <h4>Rychle odkazy</h4>
            <p><a href="<?php echo htmlspecialchars(buildThemeUrl('index.php', $theme), ENT_QUOTES, 'UTF-8'); ?>">Domov</a></p>
            <p><a href="<?php echo htmlspecialchars(buildThemeUrl('qna.php', $theme), ENT_QUOTES, 'UTF-8'); ?>">Q&A</a></p>
            <p><a href="<?php echo htmlspecialchars(buildThemeUrl('kontakt.php', $theme), ENT_QUOTES, 'UTF-8'); ?>">Kontakt</a></p>
        </div>
        <div class="col-25">
            <h4>Najdete nas</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10614.839764656655!2d18.0910518!3d48.3084298!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xba2bad032d96b960!2sFakulta%20pr%C3%ADrodn%C3%BDch%20vied%20a%20informatiky!5e0!3m2!1ssk!2ssk!4v1669307792855!5m2!1ssk!2ssk" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="row">
        Created and designed by Livia
    </div>
</footer>
<script src="js/menu.js"></script>
<?php foreach ($extraScripts as $extraScript): ?>
    <script src="<?php echo htmlspecialchars($extraScript, ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endforeach; ?>
</body>
</html>
<?php
}
