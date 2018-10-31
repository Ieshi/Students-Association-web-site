<?php
   session_start();
   @$rechercher=$_POST["rechercher"];
   @$_SESSION['recherche']=$_POST["recherche"];
    $erreur="";
   
   @$modifier=$_POST["modifier"];
   
   include("connexion.php");
   @$afftableLaureat = $pdo->prepare("SELECT * FROM Laureats");
   
   if(isset($rechercher))
     {if(empty($_SESSION['recherche'])) $erreur.="Recherche invalide";
      
	  if(!empty($_SESSION['recherche'])) header("location:ResultatRecherche.php"); 
	 } 

   
     $requeteFonds=$pdo->prepare("SELECT (SUM(MontantCotisation)+SUM(MontantContribution)) as somme from Fonds");
	 $requeteFonds->execute();
	 $total=$requeteFonds->fetch();
	 
	 $requeteContribution=$pdo->prepare("SELECT SUM(MontantContribution) as sommeContribution from Fonds");
	 $requeteContribution->execute();
	 $totalContribution=$requeteContribution->fetch();
	 
	 $requeteCotisation=$pdo->prepare("SELECT SUM(MontantCotisation) as sommeCotisation from Fonds");
	 $requeteCotisation->execute();
	 $totalCotisation=$requeteCotisation->fetch();
		 
     

			

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
} 
	th
	{
	font-family:verdana, arial, sans-serif; 
   font-size:10pt; 
   color:#EE6600; 
   margin:10px; 
   padding:10px 20px 10px 20px; 
   border-radius:4px;
   width:10px;
	}
	
		td
	{
	font-family:verdana, arial, sans-serif; 
   font-size:11pt; 
   margin:10px; 
   padding:5px 10px 5px 10px;
   border-radius:4px;
   text-align:center;
	}
	
	#conteneur2
	{
		transform:translate(0px,0px);
	}
	
	#conteneur3
	{
		transform:translate(250px,0px);
	}

	input[type="submit"].champ
{ 
   background-color:#EE6600; 
   color:#FFFFFF; 
   padding:6px 20px 6px 20px; 
   border:none; 
   cursor:pointer; 
   padding:6px; 
   width:100px;
   transform:translate(0px,0px);
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
   padding:6px; 
   border-radius:4px; 
   font-family:verdana, arial, sans-serif; 
} 
.label
{ 
   display:inline-block;
   font-family:verdana, arial, sans-serif; 
   font-size:12pt; 
   padding:10px; 
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
#total
{   font-weight:bold;
	color:#EE6600;
	text-align:center;
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
        <?php 
		
         $afftableLaureat->execute();		
		@$afftableFonds = $pdo->prepare("SELECT * from Fonds");
		$afftableFonds->execute();
        ?>

        <div id="conteneur">
		<form name="fo" method="post" action="">
		<fieldset class="fieldset">
		<legend class="legend">Base de donnée</legend>

        <table id="conteneur2">
                <tr>
                    <th> Id </th>
					<th> Numéro Carte Nationale </th>
                    <th> Nom </th>
                    <th> Prenom </th>
                    <th> Adresse </th>
                    <th> Diplome </th>
					<th> Date de promotion de votre doctorat </th>
					<th> Date de promotion de vos études d'ingénieur </th>
					<th> Date de promotion de votre master </th>
                    <th> Fonction </th>
                    
                </tr>
</tr>
 <?php
try
{
while ($tableLaureat = $afftableLaureat->fetch())
   {echo "<tr>";
    echo "<td> $tableLaureat[Id] </td>";
    echo "<td> $tableLaureat[carteNatio] </td>";
    echo "<td> $tableLaureat[Nom] </td>";
    echo "<td> $tableLaureat[Prenom] </td>";
    echo "<td> $tableLaureat[Adresse] </td>";
    echo "<td> $tableLaureat[Diplome] </td>";
    echo "<td> $tableLaureat[datePromDoctorat] </td>";
    echo "<td> $tableLaureat[datePromIngenieur] </td>";
    echo "<td> $tableLaureat[datePromMaster] </td>";
    echo "<td> $tableLaureat[Fonction] </td>"; ?>
    <td> <a href="PageModification.php?Id='<?php echo $tableLaureat['Id']; ?>'">Modifier</a> </td>
	<td> <a href="PageSupprimer.php?Id='<?php echo $tableLaureat['Id']; ?>'">Supprimer</a> </td>
    <?php echo "</tr>"; 
    }
$afftableLaureat->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?></div>
</table><br/><br/>
<div>
		    <div class="label"> Rechercher un étudiant</div>
		    <div class="input"> <input type="text" name="recherche" class="champ"/> </div>
			<input type="submit" name="rechercher" value="Rechercher" class="champ" /> <br/><br/>

          
        

		
		
		<table id="conteneur3">
                <tr>
                    <th> Numéro de versement </th>
                    <th> Cotisation obligatoire </th>
                    <th> Contribution volontaire </th>
					<th> Numéro de carte bancaire </th>
					<th> Date </th>
					<th> Id </th>
                </tr>
				
<div> 
<?php
try
{
while ($tableFonds = $afftableFonds->fetch())
   {echo "<tr>";
    echo "<td> $tableFonds[NumVer] </td>";
    echo "<td> $tableFonds[MontantCotisation] </td>";
    echo "<td> $tableFonds[MontantContribution] </td>";
	echo "<td> $tableFonds[numCarteBancaire] </td>";
	echo "<td> $tableFonds[Date] </td>";
    echo "<td> $tableFonds[Id] </td>";
    echo "</tr>";
   }
   
$afftableFonds->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
</div>
        </table> <br/><br/>
		  <div class="label" id="total"> Le total des fonds de l'association est de <?php echo $total['somme']; ?> DHs avec <?php echo $totalContribution['sommeContribution'] ?> DHs
		  de contributions et <?php echo $totalCotisation['sommeCotisation'] ?> DHs de cotisation. </div><br/>
		  </fieldset>
		</form>
				<?php if(!empty($erreur)){ ?>
			<div id="erreur">
				<?php echo $erreur ?>
			</div>
		<?php } ?>

		<div id="deco"> <a href="Acceuil.php"> Quitter </a> </div>
		
		</div>
    </body>
</html>