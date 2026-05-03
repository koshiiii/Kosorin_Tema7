<?php

require_once __DIR__ . '/includes/layout.php';

$theme = getThemeFromQuery();

renderHeader('portfolio', 'Portfolio', $theme, ['css/portfolio.css']);
?>
<section class="banner">
    <div class="container text-white">
        <h1>Portfolio</h1>
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-25 portfolio text-white text-center" id="portfolio-1">
            Web stranka 1
        </div>
        <div class="col-25 portfolio text-white text-center" id="portfolio-2">
            Web stranka 2
        </div>
        <div class="col-25 portfolio text-white text-center" id="portfolio-3">
            Web stranka 3
        </div>
        <div class="col-25 portfolio text-white text-center" id="portfolio-4">
            Web stranka 4
        </div>
    </div>
    <div class="row">
        <div class="col-25 portfolio text-white text-center" id="portfolio-5">
            Web stranka 5
        </div>
        <div class="col-25 portfolio text-white text-center" id="portfolio-6">
            Web stranka 6
        </div>
        <div class="col-25 portfolio text-white text-center" id="portfolio-7">
            Web stranka 7
        </div>
        <div class="col-25 portfolio text-white text-center" id="portfolio-8">
            Web stranka 8
        </div>
    </div>
</section>
<?php
renderFooter($theme);
