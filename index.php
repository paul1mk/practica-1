<?php include('view/header.php'); ?>
<?php include('service/api.php'); ?>
<?php 
   session_start();
   
   if (isset($_SESSION['all'])) 
   { 
     $source = $_SESSION['all'];
   }
   else
   {
     $source = API();
     $_SESSION['all'] = $source;
   }
   
   if (isset($_SESSION['generate'])) 
   {
     $json_string = json_encode($source);
     $file = 'Respuesta1.json';
     file_put_contents($file, $json_string);
   }
   ?>
<main class="container p-4">
   <div class="row">
      <div class="col-md-4">
         <!-- MESSAGES -->
         <?php if (isset($_SESSION['message'])) { ?>
         <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?php session_unset(); } ?>
         <div class="card card-body">
            <form action="action.php" method="POST">
               <div class="form-group">
                  <textarea name="description" rows="25" class="form-control" placeholder="<?php print_r ($source); ?>"></textarea>
               </div>
               <input type="submit" name="mostrar" class="btn btn-success btn-block" value="Mostrar todo">
               <input type="submit" name="generar" class="btn btn-danger btn-block" value="Generar json">
            </form>
         </div>
      </div>
      <div class="col-md-8">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>id</th>
                  <th>type</th>
                  <th>color</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach ($source as $key => $value) { ?>
               <tr>
                  <td><?php echo $value['id']; ?></td>
                  <td><?php echo $value['type']; ?></td>
                  <td><?php echo $value['color']; ?></td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</main>
<?php include('view/footer.php'); ?>