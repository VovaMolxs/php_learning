<?php require_once $_SERVER['DOCUMENT_ROOT']  . '/data/portfolioData.php'; ?>
<div class="container portfolio">
    <div class="image-item">
        <?php
            if (!empty($portfolioData)) :
                foreach ($portfolioData as $id => $image): ?>
                    <img src="<?=$image['link'] ?>" alt="<?=$image['name'] ?>">
        <?php endforeach;
        endif; ?>
    </div>
</div>