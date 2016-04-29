<?php require_once View::inc('views/master/header.php'); ?>

<h1>Customers</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($names as $row) { ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['age'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<p>
    <?php echo $string[0]; ?>
</p>

<?php require_once View::inc('views/master/footer.php'); ?>
