<?php include 'header.php'; ?>

<style type="text/css">
.typeahead,
.tt-query,
.tt-hint {
  width: 396px;
  height: 30px;
  padding: 8px 12px;
  font-size: 24px;
  line-height: 30px;
  border: 2px solid #ccc;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  border-radius: 8px;
  outline: none;
}

.typeahead {
  background-color: #fff;
}

.typeahead:focus {
  border: 2px solid #0097cf;
}

.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-dropdown-menu {
  width: 422px;
  margin-top: 12px;
  padding: 8px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  border-radius: 8px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  font-size: 18px;
  line-height: 24px;
}

.tt-suggestion.tt-is-under-cursor {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
.gist {
  font-size: 14px;
}

.tt-suggestion {
  padding: 8px 20px;
}

.tt-suggestion + .tt-suggestion {
  border-top: 1px solid #ccc;
}

.repo-promotion {
  float: right;
  font-style: italic;
}

.repo-name {
  font-weight: bold;
  text-align: left;
}

.repo-id {
  font-size: 14px;
  text-align: left;
}

</style>



<?php

if($_GET['step'] == 1):

?>

    <h1>Association</h1>
    <hr />

    <p style="text-align: center;"><input class="test" /></p>
    <script>
    var autocomplete = $('input.test').typeahead({
      name: 'students',
      prefetch: 'data.json',
      template: [                                                                 
      '<p class="repo-promotion">{{promotion}}</p>',                              
      '<p class="repo-name">{{value}}</p>',                                      
      '<p class="repo-id">{{id}}</p>'                         
      ].join(''),                                                                 
      engine: Hogan  
    });

    autocomplete.on('typeahead:selected', function(evt,data){
      window.location.replace("associate.php?step=3&file=<?php echo $_GET['file']; ?>&id=" + data.id);
    });

    </script>
     <p style="text-align: center;">
      <a href="associate.php?step=2&amp;file=<?php echo basename($file); ?>" class="btn btn-default">Pas dans la base de donnée ?</a></p>

     <p><br /></p>

    <p style="text-align: center;"><img src="input/<?php echo $_GET['file']; ?>" alt="" style="width: 500px;" class="img-thumbnail"/></p>

<?php elseif($_GET['step'] == 2): ?>

<?php elseif($_GET['step'] == 3): 

include 'students.php';
if(rename('input/'.$_GET['file'], 'output/'.$studentsById[$_GET['id']]['promotion'].'/'.$_GET['id'].'.jpg')):
?>

<script>window.location.replace("index.php");</script>

<?php endif; ?>

<?php endif; ?>
<?php include 'footer.php'; ?>