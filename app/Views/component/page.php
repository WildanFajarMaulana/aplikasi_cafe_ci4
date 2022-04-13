<?php $pager->setSurroundCount(1) ?>

<nav aria-label="Page navigation" style="margin-right:7px">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
        <!-- <li>
            <a href="<?= $pager->getFirst() ?>" class="page-link" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><i class="fas fa-chevron-left"></i></a></span>
            </a>
        </li> -->
        <li>
            <a href="<?= $pager->getPrevious() ?>" class="page-link" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><i class="fas fa-chevron-left"></i></a></a></span>
            </a>
        </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link): ?>
        <li <?= $link['active'] ? 'class="active"' : '' ?>>
            <a class="page-link" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
        <li>
            <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><i class="fas fa-chevron-right"></i></a></span>
            </a>
        </li>
        <!-- <li>
            <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><i class="fas fa-chevron-right"></i></a></span>
            </a>
        </li> -->
        <?php endif ?>
    </ul>
</nav>