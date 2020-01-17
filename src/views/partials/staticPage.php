<style>
#edit-link {
    position: absolute;
    bottom: 5;
    right: 5;
}
</style>
<h1><?=$page->getHeadline()?></h1>
<?=$page->getContent()?>


<?php

if (App::get("user")->getRole() > 0) {
    echo "<a id='edit-link' href='/admin/pages/{$page->getSlug()}'>Edit this page</a>";
}
?>

