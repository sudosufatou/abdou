
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Add file Agency</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
  </head>

  <body class="bg-light" style="background-image: url('http://192.168.180.222/app-charge-data-nokia/src/view/logo_white.png'); opacity:1; background-size: cover; background-position: center center;">
    
  <nav class="navbar navbar-expand-lg " style="background-color: #8f7dcf;" >
    <img alt="" src="logo_white.png" width="30px" src="logo_white.png">
    <a class="navbar-brand" href="#" style=" color: white;">
        <strong>
            Upload data in oracle from csv file</a>
    </strong>
</nav>

    <main role="main" class="container"> 
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        
        <div class="lh-100">
          <h2 class="mb-0 lh-100">EXPRESSO-NOKIA</h2>
          <small>Since 2019</small>
        </div>
      </div>
      <?php if((isset($data['bad_file']) && $data['bad_file']) || isset($data['number_column'])):?>
          <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Bad format file</h4>
              <?php if($data['number_column']) :?>
                  <p>The column number must be 10</p>
              <?php endif; ?>
              <hr>
              <?php if (isset($data['bad_file']) && $data['bad_file']): ?>
                <p class="mb-0">
                  <h5>Here are the columns list that you must have in your csv file</h5>
                    <?php foreach($data['good_columns'] as $column):?>
                    
                        <?=$column.'<b>,</b> '; ?>

                    <?php endforeach; ?>
                </p>
              <?php endif; ?>  
          </div>
      <?php endif;?>  

      <?php if(isset($data['bad_extension']) && $data['bad_extension']):?>
        <div class="alert alert-danger" style="width: 50%;" role="alert">
              <h4 class="alert-heading">Bad extension</h4>
              <p>Choose a .csv file extension</p>
              <hr>
              <p class="mb-0">The file must have the .csv extension</p>
        </div>
      <?php elseif(isset($data['added']) && $data['added']):?>
          <div class="alert alert-success" style="width: 50%;" role="alert">
                <h4 class="alert-heading">Data added successfuly</h4>
                <p>Your data are added in the oracle DB</p>
                <hr>
                <p class="mb-0">
                  <a target="_blank" href="http://eabiselfservice/ReportsESN/powerbi/NETWORK/NOKIA%20INCIDENT" >Click here to view in the dashboard</a>
                </p>
          </div>
      <?php endif;?> 

      <div class="my-3 p-3 bg-white rounded box-shadow" style="width: 50%; background-color: rgba(250,250,250, .92);">
        <h4 class="border-bottom border-gray pb-2 mb-0">Upload a csv file</h4>
          <form action="add" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Choose</label>
                    <input type="file" name="path_file" class="form-control-file" id="exampleFormControlFile1"><br>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
      </div>

    
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="offcanvas.js"></script>
    
  </body>
</html>
