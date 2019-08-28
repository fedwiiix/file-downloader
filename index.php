<h1>Download</h1>

<div align="center">
	<form method="get" class="form-style">
		<input type="text" name="code" placeholder="Code" />
		<input type="submit" class="submit" name="submit" value="Connexion" />
	</form>
</div>	

<?php

$globalCode="azerty"

$txt = file_get_contents('files.json');
$files = json_decode($txt, true);

foreach($files as $key => $val){
    
  if($_GET['code']==$val['code']){
    $j=0;
    $directory="./files";
    $dir = scandir($directory) or die($directory.' Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
    foreach ($dir as $element) {   
      if($element != '.' && $element != '..') {
        if (!is_dir($directory.'/'.$element)) {	
        $extension = pathinfo($element, PATHINFO_EXTENSION);
        $file=$directory.'/'.$element;
          if(in_array($element, $val['files'])){
            echo '<a href="'.$file.'">'.substr($element, 0, -1-strlen($extension)).'</a>';
          }
        }
      }
    }
  }
}

if($_GET['code']==$globalCode){
  $j=0;
  $directory="./files";
  $dir = scandir($directory) or die($directory.' Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
  foreach ($dir as $element) {   
    if($element != '.' && $element != '..') {
      if (!is_dir($directory.'/'.$element)) {	
      $extension = pathinfo($element, PATHINFO_EXTENSION);
      $file=$directory.'/'.$element;
          echo '<a href="'.$file.'">'.substr($element, 0, -1-strlen($extension)).'</a>';
      }
    }
  }
}

?>

<style>
  
  *{
    font-family: sans-serif;
  }
  h1{
    display:block;
    width:100%;
    text-align:center;
    color:#e0e0e0;
    margin: 30px 0;
  }
  input{
    border:1px solid #e0e0e0;
    padding: 10px;
  }
  input[type="text"]{
    border-right:0;
    background:#fff;
  }
  input[type="submit"]{
    position:relative;
    left:-5px;
    border-left:0;
    cursor:pointer;
  }
  a{
    display:block;
    width:100%;
    text-decoration:none;
    color:black;
    background-color: #fff;
    line-height: 1.5rem;
    padding: 10px 20px;
    margin: 0;
    border-bottom: 1px solid #e0e0e0;
  }
 
</style>
