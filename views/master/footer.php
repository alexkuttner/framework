<script type="text/javascript" src="<?php echo View::url('tutorials/testing/public/js/jQuery-1.11.3.js'); ?>"></script>
<script type="text/javascript" src="<?php echo View::url('tutorials/testing/public/js/bootstrap.min.js'); ?>"></script>

<?php
//Load any view dependenat Javascript files here
if(isset($jsFiles))
{
    foreach($jsFiles as $file)
    {
        echo '<script type="text/javascript" src=" '.View::url($file).' "></script><br>';
    }
}
?>

</body>
</html>