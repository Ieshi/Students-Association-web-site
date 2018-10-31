
<?php
session_start();
    include("connexion.php");
    {try {$afftableLaureat = $pdo->prepare("SELECT * FROM Laureats where(Id=$_SESSION[recherche] OR carteNatio=$_SESSION[recherche] OR 
	               Nom=$_SESSION[recherche] OR Prenom=$_SESSION[recherche] OR Adresse=$_SESSION[recherche] OR Diplome=$_SESSION[recherche] 
				   OR datePromDoctorat=$_SESSION[recherche] OR datePromIngenieur=$_SESSION[recherche] OR datePromMaster=$_SESSION[recherche] 
				   OR Fonction=$_SESSION[recherche])");
		
	$afftableLaureat->execute();}
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
   transform:translate(200px,0px);
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

#retour
{  
    color:#EE6600;
	font-size:13pt;
	transform:translate(1050px,0px);
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
		<fieldset class="fieldset">
		<legend class="legend">Rechercher</legend>

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
		<div id="retour">
     <a href="BaseDeDonnee.php"> Retour vers la base de donnée </a>
</div>
     </body>
</html>
