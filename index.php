<?php include 'header.php'; ?>

<h1>Photos à traiter</h1>

<hr />

<div class="row">


  <?php
  $files = glob('input/*.jpg');

  foreach($files as $file):
  ?>
  <div class="col-md-3">
    <div class="thumbnail">
      <img src="<?php echo $file; ?>" alt="" style="width: 200px;" class="img-rounded">
      <div class="caption">
        <h3><?php echo basename($file); ?></h3>
        <p style="text-align: center;"><a href="associate.php?step=1&amp;file=<?php echo basename($file); ?>" class="btn btn-primary">Associer</a> <a href="delete.php?file=<?php echo basename($file); ?>" class="btn btn-danger">Supprimer</a></p>
      </div>
    </div>
    <p><br /></p>
  </div>

<?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>