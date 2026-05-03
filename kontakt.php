<?php

require_once __DIR__ . '/includes/layout.php';

$theme = getThemeFromQuery();

renderHeader('kontakt', 'Kontakt', $theme, ['css/form.css']);
?>
<section class="banner">
    <div class="container text-white">
        <h1>Kontakt</h1>
    </div>
</section>
<section>
    <div class="container">
        <div class="col-100 text-center">
            <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em></strong></p>
        </div>
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-50">
            <h3>Mate otazky?</h3>
            <p>Incididunt mollit quis eiusmod tempor voluptate duis eu enim amet excepteur cupidatat magna velit.</p>
            <p>Velit id ad laborum velit commodo.</p>
            <p>Consectetur laborum aliqua nulla anim cupidatat consectetur est veniam cupidatat.</p>
        </div>
        <div class="col-50 text-right">
            <h3>Napiste nam</h3>
            <form id="contact" action="<?php echo htmlspecialchars(buildThemeUrl('thankyou.php', $theme), ENT_QUOTES, 'UTF-8'); ?>" method="post">
                <input type="text" placeholder="Vase meno" id="meno" name="meno" required><br>
                <input type="email" placeholder="Vas email" id="email" name="email" required><br>
                <textarea placeholder="Vasa sprava" id="sprava" name="sprava"></textarea><br>
                <input type="checkbox" id="consent" required>
                <label for="consent"> Suhlasim so spracovanim osobnych udajov.</label><br>
                <input type="submit" value="Odoslat">
            </form>
        </div>
    </div>
</section>
<?php
renderFooter($theme);
