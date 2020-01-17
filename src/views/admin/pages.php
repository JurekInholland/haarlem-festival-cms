<h1>Static pages</h1>


        <table class="table">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Headline</th>
                    <th>Link</th>
                    <th>Menu</th>
                    <th>Last edited</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php foreach ($pages as $key => $page) : ?>

            <tr>
                <td>
                    <?= $page->getSlug(); ?>
                </td>
                <td>
                    <?= $page->getHeadline(); ?>
                </td>
                <td>
                    <a href="/admin/pages/<?= $page->getSlug(); ?>"><?= $page->getSlug(); ?></a>
                </td>
                <td>
                    <?= $page->getMenuReadable(); ?>

                </td>
                <td>
                    <?= $page->getEdited(); ?>

                </td>
                <td>
                    <form action="/admin/deletePage" method="POST">
                        <input type="hidden" name="id" value="<?=$page->getId()?>">
                        <input type="submit" name="submit" value="Delete" method="POST">
                    </form>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>

        <form action="/admin/pages/new" method="POST">
            <input type="submit" name="submit" value="Add New" class="btn btn-primary">        
        </form>