<?php

if(unlink('input/'.$_GET['file'])):
?>

<script>window.location.replace("index.php");</script>

<?php endif; ?>