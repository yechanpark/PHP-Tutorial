<ul>
    <?php
    foreach ($topics as $entry) {?>
        <li><a href="/foo/index.php/testcontroller/getDBWithId/<?= $entry->id?>"><?= $entry->title?></a></li>
        <?php
    }
    ?>
    <form action="/foo/index.php/testcontroller/form">
    	<input type="submit" value="항목추가"/>
    </form>
</ul>