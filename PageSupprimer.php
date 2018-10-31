
<?php
  @$oui=$_POST["oui"];
  @$non=$_POST["non"];
  $choix="";
  
  include("connexion.php");
  @$afftableLaureat = $pdo->prepare("SELECT * FROM Laureats WHERE Id=".$_GET['Id']." ");
   $afftableLaureat->execute();  
   $tableLaureat=$afftableLaureat->fetch();
  
  if(isset($oui))
   {try
	     {  $requetesuprFonds = "DELETE FROM Fonds WHERE Id=".$_GET['Id']." ";
		    $tableFonds=$pdo->prepare($requetesuprFonds);			
	        $tableFonds->execute();
			$requetesuprLaureats = "DELETE FROM Laureats WHERE Id=".$_GET['Id']." ";
            $tableLaureats=$pdo->prepare($requetesuprLaureats);			
	        $tableLaureats->execute(); 
			header("location:BaseDeDonnee.php");
	      }
	 	catch(PDOException $e)
		{echo $e->getMessage(); }
	    }
		
	if(isset($non))
		header("location:BaseDeDonnee.php");
   
 

	 
?>



<!DOCTYPE html>
<html>
	<head>
	<style>
body
{ 
   margin:0; 
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
   transform:translate(800px,0px);
} 
.label
{ 
   display:inline-block; 
   width:250px; 
   font-family:verdana, arial, sans-serif; 
   font-size:10pt; 
   padding:10px; 
} 
.input
{ 
   display:inline-block; 
   radio-size:50px;
    
   padding:6px; 
} 


#conteneur3
{   
   display:inline-block; 
   font-family:verdana, arial, sans-serif; 
   font-size:12pt; 
   padding:10px;
   transform:translate(230px,0px);
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

input[type="submit"].champ
{ 
   background-color:#EE6600; 
   color:#FFFFFF; 
   padding:6px 20px 6px 20px; 
   border:none; 
   cursor:pointer; 
   padding:10px; 
   width:160px;
} 

#text
{
	font-family:verdana, arial, sans-serif; 
   font-size:14pt;
}

#oui
{
	transform:translate(300px,35px);
}

#non
{
	transform:translate(800px,0px);
}
	
	</style>
	</head>
	<body>
	<div id="conteneur"> <br />
	<header id="titre"> Associtation des anciens étudiant de l'ENSA de Marrakech </header>
	<form name="form" action="" method="post">
 <fieldset class="fieldset">
 <legend class="legend"> Suppression </legend>
<div id="text"> Etes vous sur de vouloir supprimer le membre: </div><br/>

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
    <?php 
    
$afftableLaureat->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
</div>

<div>
      <input type="submit" name="oui" value="Oui" class="champ" id="oui"/>
</div>
<div>
      <input type="submit" name="non" value="Non" class="champ" id="non"/>
</div>


 
 </fieldset>
 </form>
    </div>
 

	</body>
</html>

