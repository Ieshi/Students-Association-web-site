<?php
	session_start();
	@$login=$_POST["login"];
	@$mdp=$_POST["mdp"];
	@$valider=$_POST["valider"];
	$erreur="";
	if(isset($valider))
	{
		try {include("connexion.php");
		$ses=$pdo->prepare("select Id, Nom,carteNatio from Laureats where Nom=? AND carteNatio=? ");
		$ses->execute(array($login,$mdp));
		@$donnees=$ses->fetch();
		if($donnees["Nom"]==$login && $donnees["carteNatio"]==$mdp)
		{
			$_SESSION['Id']=$donnees["Id"];
			header("location:session.php");
		}
		else 
		   {if($login!="admin" || $mdp!="admin")
			    $erreur="Mauvais login ou mot de passe";
            if(empty($erreur))
		        header("location:BaseDeDonnee.php");
		   }
		} 
	    catch(PDOException $e){
		echo $e->getMessage();
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
   background-repeat:no-repeat;   
} 
.fieldset
{ 
   margin:10px; 
   border:none; 
   background-color:#FFFFFF; 
   border-radius:10px; 
   padding:20px; 

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
   transform:translate(400px,0px);
} 
.label
{ 
   display:inline-block; 
   width:250px; 
   font-family:verdana, arial, sans-serif; 
   font-size:18pt; 
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
   width:480px;
   transform:translate(0px,20px);
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
#conteneur2
{
	transform:translate(380px, 100px);
}
#titre
{  
   font-family:verdana, arial, sans-serif; 
   font-size:16pt; 
   font-weight:bold; 
   color:#EE6600; 
   margin:10px; 
   padding:10px 20px 10px 300px; 
   border-radius:4px; 
} 
		</style>
	</head>
	<body>
<div id="conteneur">
	<header id="titre"> Associtation des anciens étudiant de l'ENSA de Marrakech </header>
		<form name="fo" method="post" action="">
		<fieldset class="fieldset">
		<legend class="legend">Authentification</legend>
		   <div id="conteneur2">
			<div class="label">Login </div>
			 <div class="input"><input type="text" name="login" value="<?php echo $login?>" class="champ" /> </div> <br />
			<div class="label">Mot de passe</div>
			<div class="input"> <input type="password" name="mdp" class="champ" /> </div> <br />
			<div class="input"> <input type="submit" name="valider" value="valider" class="champ"/> </div> <br />
			</div>
		</fieldset>
		</form>
 </div>
		<?php if(!empty($erreur)){ ?>
			<div id="erreur">
				<?php echo $erreur ?>
			</div>
		<?php } ?>

	</body>
</html>