<nav aria-label="Breadcrumb" class="breadcrumb">
       <ol>

        <?php foreach($this->breadcrumb ?? [] as $item): ?>

            <li class="<?= $item['class'] ?? '' ?>">

                <?php if(isset($item['url'])): ?>

                    <a href="<?= $item['url'] ?>">

                        <?php if(isset($item['icono'])): ?>
                            <ion-icon name="<?= $item['icono'] ?>"></ion-icon>
                        <?php endif; ?>

                        <?= $item['title'] ?>

                    </a>

                <?php else: ?>

                    <span aria-current="page">
                        <?= $item['title'] ?>
                    </span>

                <?php endif; ?>

            </li>

        <?php endforeach; ?>

    </ol>
</nav>