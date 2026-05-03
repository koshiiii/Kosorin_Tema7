<?php

require_once __DIR__ . '/includes/layout.php';

$theme = getThemeFromQuery();

renderHeader('kontakt', 'Dakujeme', $theme);
?>
<section class="banner">
    <div class="container text-white">
        <h1>Dakujeme</h1>
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-100 text-center">
            <h2>Dakujeme za vyplnenie formulara</h2>
        </div>
    </div>
</section>
<?php
renderFooter($theme);
