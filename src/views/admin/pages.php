<?php require "partials/sidebar.php"; ?>
    
    <div id="content">

        <?php require "partials/sidebar-toggle.php"; ?>
        

        <h1>Static pages</h1>


        <table class="table">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Headline</th>
                    <th>Link</th>
                    <th>Last edited</th>
                </tr>
            </thead>
            <?php foreach ($pages as $key => $page) : ?>

            <tr>
                <td>
                    <?= $page["slug"]; ?>
                </td>
                <td>
                    <?= $page["headline"]; ?>
                </td>
                <td>
                    <a href="/admin/pages/<?= $page["slug"]; ?>"><?= $page["slug"]; ?></a>
                </td>
                <td>
                    <?= $page["edited"]; ?>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>

        

    </div>
</div>
