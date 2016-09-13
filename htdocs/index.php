<?php
 $conexao = new MongoDB\Driver\Manager("mongodb://localhost:27017");
 $query = new MongoDB\Driver\Query([]);
 $cursor = $conexao->executeQuery("test.seriados",$query);
?>
<html>
 <head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
 <br/>
 <div class="container">
  <div class="class="btn btn-primary btn-lg" role="alert"></div>
  <img src="tv.png" alt="logo" width="100"/>
  <h1>Meus seriados preferidos</h1>
  <br/>

<?php
 foreach ($cursor as $documento) {
 	echo "<a class=\"alert alert-success\" href=\"detalhe.php?id=".
 	      $documento->_id."\">".
 	      $documento->nome."</a>";
 }
 ?>

  <br/><br/>
  <a href="novo.php" class="btn btn-primary btn-lg" type="submit" >novo seriado</a>
 </div>
</body>
</html>
