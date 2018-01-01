<ul>
    <?php
    foreach ($topics as $entry) {?>
        <li><a href="/index.php/testcontroller/getDBWithId/<?= $entry->id?>"><?= $entry->title?></a></li>
        <?php
    }
    ?>
</ul>