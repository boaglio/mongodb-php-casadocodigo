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

function mostra($campo) {
  if (isset($campo)  ) {
  	echo $campo;
  }	else {
    echo '';
  }
}

$conexao = new MongoClient();
$collection = $conexao->test->seriados;

if( isset($_GET['id']) &&("" != trim($_GET['id'])) )
{
 $id = $_GET['id'];
 $cursor = $collection->find( array('_id' => new MongoId($id)));
 $documento= $cursor->getNext();
}
if( isset($_POST['id']) &&("" != trim($_POST['id'])))
{
  $id = $_POST['id'];

  if ($_POST['opt'] == "alterar") {

   $personagens =array($_POST['personagem1'],$_POST['personagem2'],$_POST['personagem3'],$_POST['personagem4'],$_POST['personagem5'],$_POST['personagem6']);
   $documento = array( "nome" => $_POST['nome'], "personagens" => $personagens);
   $collection->update(array('_id' => new MongoId($id)),$documento, array('upsert'=>true));

   echo "<br/><div class=\"alert alert-warning\">Seriado alterado!</div>";
  }

  if( $_POST['opt'] == "remover")
  {
	$collection->remove(array('_id' => new MongoId($id)));
	echo "<br/><div class=\"alert alert-warning\">Seriado removido!</div>";
  }

} else {
?>
  <div class="alert alert-success" role="alert">Alterar seriado</div>
   <form method="post" action="detalhe.php">
   <p>
    <div class="input-group">
     <span class="input-group-addon">Nome</span>
     <input type="text" name="nome" id="nome" class="form-control" value="<?php mostra($documento['nome']); ?>" placeholder="nome do seriado ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 1</span>
     <input type="text" name="personagem1" id="personagem1" value="<?php mostra($documento['personagens'][0]); ?>" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 2</span>
     <input type="text" name="personagem2" id="personagem2" value="<?php mostra($documento['personagens'][1]); ?>" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 3</span>
     <input type="text" name="personagem3" id="personagem3" value="<?php mostra($documento['personagens'][2]); ?>" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 4</span>
     <input type="text" name="personagem4" id="personagem4" value="<?php mostra($documento['personagens'][3]); ?>" class="form-control" placeholder="nome de um personagem ?">
    </div>
        <div class="input-group">
     <span class="input-group-addon">Personagem 5</span>
     <input type="text" name="personagem5" id="personagem5" value="<?php mostra($documento['personagens'][4]); ?>" class="form-control" placeholder="nome de um personagem ?">
    </div>
    <div class="input-group">
     <span class="input-group-addon">Personagem 6</span>
     <input type="text" name="personagem6" id="personagem6" value="<?php mostra($documento['personagens'][5]); ?>" class="form-control" placeholder="nome de um personagem ?">
    </div>
    </p>
   <p>
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <input type="hidden" name="opt" value="alterar"/>
    <input class="btn btn-primary btn-lg" type="submit" value="alterar !" />
   </p>
  </form>
  <form method="post" action="detalhe.php">
   <input type="hidden" name="id" value="<?php echo $id; ?>"/>
   <input type="hidden" name="opt" value="remover"/>
   <input class="btn btn-primary btn-lg" type="submit" value="remover !" />
  </form>
 <?php  } ?>
  <form method="post" action="index.php">
   <input class="btn btn-primary btn-lg" type="submit" value="lista de seriados" />
  </form>
  </div>
</body>
</html>