<?php
   session_start();
   @$numCarteBancaire=$_POST["numCarteBancaire"];
   @$cot_opt=$_POST["cot_opt"];
   	
   @$contribuer=$_POST["contribuer"];
	
   $erreur="";
   
   $message="";
   
   $IdLaureat=$_SESSION['Id'];
   
   include("connexion.php");
    $req="SELECT * FROM Laureats where Id=$IdLaureat";
    $afftableLaureat = $pdo->prepare($req);
    $afftableLaureat->execute();
	$tableLaureat=$afftableLaureat->fetch();
	
	$req="SELECT * FROM Fonds where Id=$IdLaureat";
    $afftableFonds = $pdo->prepare($req);
    $afftableFonds->execute();
	$tableFonds=$afftableFonds->fetch();


	
	if(isset($contribuer))
	{ if($numCarteBancaire!=$tableFonds["numCarteBancaire"])
		$erreur="<li>Numéro de carte bancaire invalide</li>";
	 
	 if(empty($cot_opt))
		 $erreur.="<li>Contribution invalide</li>";
	 
	 if(empty($erreur))
	       {$table2=$pdo->prepare("insert into fonds(numCarteBancaire ,MontantContribution,Id,Date) values(".$numCarteBancaire.",".$cot_opt.",".$tableLaureat["Id"].",now())");
			$table2->execute(); 
			$message="Merci !";
		   }

	}


?>


<!DOCTYPE html>
<html>
	<head>
	<style>
	body
{ 
   margin:0; 
}
	
#conteneur
{ 
   margin:0; 
   padding:10px; 
   background:linear-gradient(to bottom,#DDDDDD,#FFFFFF); 
} 
.fieldset
{ 
   margin:10px; 
   border:none; 
   background-color:#FFFFFF; 
   border-radius:10px; 
   padding:20px; 
}
#titre
{  
   font-family:verdana, arial, sans-serif; 
   font-size:16pt; 
   font-weight:bold; 
   color:#EE6600; 
   margin:10px; 
   padding:10px 20px 10px 130px; 
   border-radius:4px; 
}
.legend
{ 
   font-family:verdana, arial, sans-serif; 
   font-size:14pt; 
   font-weight:bold; 
   color:#FFFFFF; 
   margin:10px; 
   padding:10px 20px 10px 20px; 
   background-color:#AAAAAA; 
   border-radius:4px; 
   transform:translate(600px,0px);
} 
#conteneur3
{   
   display:inline-block; 
   font-family:verdana, arial, sans-serif; 
   font-size:12pt; 
   padding:10px;
   transform:translate(230px,35px);
}
#conteneur2
{
   display:inline-block;
   font-weight:bold;   
   font-family:verdana, arial, sans-serif; 
   font-size:12pt; 
   padding:15px;
   color:#EE6600;
   transform:translate(200px,0px);
}

.label
{ 
   display:inline-block;
   font-family:verdana, arial, sans-serif; 
   font-size:12pt; 
   padding:10px; 
} 
.input
{ 
   display:inline-block; 
    
   padding:6px; 
} 
.champ
{
   outline:none; 
   border:solid 1px #AAAAAA; 
   padding:10px; 
   border-radius:4px; 
   font-family:verdana, arial, sans-serif; 
} 
 
input[type="submit"].champ
{ 
   background-color:#EE6600; 
   color:#FFFFFF; 
   padding:6px 20px 6px 20px; 
   border:none; 
   cursor:pointer; 
   padding:10px; 
   width:160px; 
   transform:translate(950px,0px);
} 
#erreur
{
	position:fixed;
	min-width:300px;
	min-height:20px;
	padding:20px;
	background-color:#EE6600;
	color:#FFF;
	right:0;
	top:200px;
	border-radius:10px 0 0 10px;
}

#conteneur4
{
	transform:translate(0px,50px);
}

#deco
{  
    color:#EE6600;
	font-size:13pt;
	transform:translate(1200px,0px);
}
	</style>
	
	
	</head>
	<body>
	<div id="conteneur">
	<header id="titre"> Bienvenue <?php echo $tableLaureat["Prenom"] ?> ! </header>
<form name="form" action="" method="post">
<fieldset class="fieldset">
<legend class="legend">Ma session</legend>

                <div id="conteneur2">    
					 Numéro Carte Nationale <br/><br/>
                     Nom <br/><br/>
                     Prenom <br/><br/>
                     Adresse <br/><br/>
                     Diplome <br/><br/>
					 Date de promotion de votre doctorat <br/><br/>
					 Date de promotion de vos études d'ingénieur <br/><br/>
					 Date de promotion de votre master <br/><br/>
                     Fonction <br/><br/>
				</div>
 <div id="conteneur3">               
 <?php
try
{
    echo " : $tableLaureat[carteNatio] <br/><br/>";
    echo " : $tableLaureat[Nom] <br/><br/>";
    echo " : $tableLaureat[Prenom] <br/><br/>";
    echo " : $tableLaureat[Adresse] <br/><br/>";
    echo " : $tableLaureat[Diplome] <br/><br/>";
    echo " : $tableLaureat[datePromDoctorat] <br/><br/>";
    echo " : $tableLaureat[datePromIngenieur] <br/><br/>";
    echo " : $tableLaureat[datePromMaster] <br/><br/>";
    echo " : $tableLaureat[Fonction] <br/><br/>"; ?>
     <a href="PageModification.php?Id='<?php echo $tableLaureat['Id']; ?>'">Modifier</a>  <br/><br/>
    <?php 
    
$afftableLaureat->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
</div>
<div id="conteneur4">
<div class="label"> Voulez vous contribuer au développement de votre association? </div><br/>
<div class="label">
      Numéro de votre carte bancaire 
</div>
<div class="input">
	  <input type="text" name="numCarteBancaire" />
</div>

<div class="label">
      Contribution facultative 
</div>
<div class="input">	  
	  <input type="text" name="cot_opt" value="<?php echo $cot_opt ?>"/> <span>DHs</span>
</div>

<div>
      <input type="submit" name="contribuer" value="Contribuer ! " class="champ"/>
</div>
</div>
</fieldset>
</form>
		<?php if(!empty($erreur)){ ?>
			<div id="erreur">
				<?php echo $erreur ?>
			</div>
		<?php } ?>
		<div> <?php echo $message; ?> </div>
<div id="deco"> <a href="Acceuil.php"> Quitter la session </a> </div>
</div>
    </body>
</html>