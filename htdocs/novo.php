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
<?php
if( isset($_POST['nome']) &&("" != trim($_POST['nome'])) )
{
 $conexao = new MongoDB\Driver\Manager("mongodb://localhost:27017");
 $bulk = new MongoDB\Driver\BulkWrite;
 $personagens =array($_POST['personagem1'],$_POST['personagem2'],$_POST['personagem3'],$_POST['personagem4'],$_POST['personagem5'],$_POST['personagem6']);
 $documento = array('_id' => new MongoDB\BSON\ObjectID,"nome" => $_POST['nome'],"personagens" => $personagens);
 $bulk->insert($documento);
 // var_dump($documento);
 $conexao->executeBulkWrite('test.seriados', $bulk);
 echo "<br/><div class=\"alert alert-warning\">Seriado cadastrado!</div>";
}
?>
  <div class="alert alert-success" role="alert">Novo seriado</div>
   <form method="post" action="novo.php">
   <p>
    <div class="input-group">
     <span class="input-group-addon">Nome</span>
     <input type="text" name="nome" id="nome" class="form-control" placeholder="nome do seriado ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 1</span>
     <input type="text" name="personagem1" id="personagem1" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 2</span>
     <input type="text" name="personagem2" id="personagem2" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 3</span>
     <input type="text" name="personagem3" id="personagem3" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 4</span>
     <input type="text" name="personagem4" id="personagem4" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 5</span>
     <input type="text" name="personagem5" id="personagem5" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 6</span>
     <input type="text" name="personagem6" id="personagem6" class="form-control" placeholder="nome de um personagem ?">
    </div>
    </p>
   <p>
    <input class="btn btn-primary btn-lg" type="submit" value="cadastrar !" />
   </p>
  </form>
  <form method="post" action="index.php">
   <input class="btn btn-primary btn-lg" type="submit" value="lista de seriados" />
  </form>
  </div>
</body>
</html>