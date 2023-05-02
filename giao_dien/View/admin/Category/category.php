<a href=index.php?controller=categoryAdmin&action=Add>Add Category</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($array['infor'] as $tl) {
            ?>
            <tr>
                <td>
                    <?= $tl['id_category'] ?>
                </td>
                <td>
                    <?= $tl['Category_name'] ?>
                </td>
                <td> <a href="index.php?controller=categoryAdmin&action=edit&id=<?= $tl['id_category'] ?>"><button
                            type="button" class="btn btn-info">Edit</button></a>
                    <a href="index.php?controller=categoryAdmin&action=destroy&id=<?= $tl['id_category'] ?>"><button
                            type="button" class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>