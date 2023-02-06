<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>
<!-- 
<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a class="btn btn-primary" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </a>
            </li>&nbsp;
            <li>
                <a class="btn btn-primary" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                </a>
            </li>&nbsp;
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="active"' : '' ?>>
                <a href="<?= $link['uri'] ?>" class="btn btn-primary">
                    <?= $link['title'] ?>
                </a>
            </li>&nbsp;
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a class="btn btn-primary" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                </a>
            </li>&nbsp;
            <li>
                <a class="btn btn-primary" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li>&nbsp;
        <?php endif ?>
    </ul>
</nav> -->

<nav aria-label="Page navigation">
    <ul class="pagination push">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">
                    <span aria-hidden="true">First</span>
                    <span class="visually-hidden">First</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
                    <span aria-hidden="true">Previous</span>
                    <span class="visually-hidden">Previous</span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Next">
                    <span aria-hidden="true">Next</span>
                    <span class="visually-hidden">Next</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">
                    <span aria-hidden="true">Last</span>
                    <span class="visually-hidden">Last</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>