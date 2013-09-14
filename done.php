<?php 

include 'header.php';
include 'students.php';

?>

<h1>Photos déjà traitées</h1>
<hr />

<?php

$folders = glob('output/*', GLOB_ONLYDIR);

foreach($folders as $folder) {
	$files = glob($folder.'/*');
	if(count($files) != 0) {
?>

<h2>Promotion : <strong><?php echo basename($folder); ?></strong></h2>


	<div class="row">
		<?php foreach($files as $file): ?>
		<div class="col-md-3">

			<div class="thumbnail">
				<img src="<?php echo $file; ?>" alt="" style="width: 200px;"  class="img-rounded">
				<div class="caption">
					<h5><?php echo $studentsById[basename($file, '.jpg')]['name']; ?></h5>
					<p>Promotion : <em><?php echo $studentsById[basename($file, '.jpg')]['promotion']; ?></em></p>
				</div>
			</div>		
			
		</div>
		<?php endforeach; ?>
	</div>


<?php 
	}
} 
?>


<?php include 'footer.php'; ?>