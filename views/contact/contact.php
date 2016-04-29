<?php require_once View::inc('views/master/header.php'); ?>

<form action="ajaxContact.php" id="contactForm" method="post">
    <input type="text" name="fullName">
    <input type="submit">
</form>

<?php
//Will get added to /master/footer.php
$jsFiles[] = 'tutorials/testing/public/js/AjaxContact.js';
?>

<?php require_once View::inc('views/master/footer.php'); ?>
