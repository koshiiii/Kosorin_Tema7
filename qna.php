<?php

require_once __DIR__ . '/includes/layout.php';
require_once __DIR__ . '/classes/QnA.php';

use otazkyodpovede\QnA;

$theme = getThemeFromQuery();

$qnaManager = new QnA();
$qnaData = $qnaManager->getQnAData();

renderHeader('qna', 'Q&A', $theme, ['css/accordion.css']);
?>
<section class="banner">
    <div class="container text-white">
        <h1>Q&A</h1>
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-100 text-center">
            <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em></strong></p>
        </div>
    </div>
</section>
<section class="container">
    <?php foreach ($qnaData as $item): ?>
        <div class="accordion">
            <div class="question"><?php echo htmlspecialchars((string) ($item['question'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
            <div class="answer"><?php echo htmlspecialchars((string) ($item['answer'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
    <?php endforeach; ?>
</section>
<?php
renderFooter($theme, ['js/accordion.js']);
