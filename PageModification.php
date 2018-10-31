
<?php
   
   @$numCarte=$_POST["carteNatio"];
   
   @$nom=$_POST["nom"];
   
   @$prenom=$_POST["prenom"];
   
   @$adresse=$_POST["adr"];
   
   @$datePromdiplome1=$_POST["dateProm1"];
	$promDoctorat="";
   @$datePromdiplome2=$_POST["dateProm2"];
    $promIng="";
   @$datePromdiplome3=$_POST["dateProm3"];
    $promMaster="";
	
   @$confirmer=$_POST["confirmer"];
   
    $erreur="";
	
    $diplomePlusHaut="";
	@$diplome1=$_POST["doc"];
	@$diplome2=$_POST["ing"];
	@$diplome3=$_POST["mas"];
    $diplome="";
	
	@$fonc=$_POST["fonc"];
    $fonction="";
	
	@$message="";
	
	include("connexion.php");
	$affdonneesLaureats=$pdo->prepare("SELECT * from Laureats where Id=".$_GET['Id']." ");
	$affdonneesLaureats->execute();
	$donneesLaureats=$affdonneesLaureats->fetch();

if(isset($confirmer))
  {
	 if (empty($numCarte))
          $erreur="<li>Entrez le numéro de la carte nationale</li>";
     if (empty($nom))
          $erreur.="<li>Entrez le nom</li>";
      if (empty($prenom))
          $erreur.="<li>Entrez le prenom</li>";
      if (empty($adresse))
          $erreur.="<li>Entrez l'adresse</li>";


      if(!empty($diplome1))
	      {$diplomePlusHaut="Doctorant";
	       if($datePromdiplome1=="none")
			   $erreur.="<li>Choisissez la date de promotion de votre doctorat</li>";
			if (!empty($diplome2))
			  {if($datePromdiplome2=="none")
			    $erreur.="<li>Choisissez la date de promotion de votre cursus en tant qu'ingénieur</li>";
			   if (!empty($diplome3))
			     {if($datePromdiplome3=="none")
			        $erreur.="<li>Choisissez la date de promotion de votre master</li>";
                 $diplome="Doctorant, Ingenieur, Master ";
				 }
			   if(!empty($diplome2)==true && !empty($diplome3)==false)
			     {if($datePromdiplome2=="none")
			          $erreur.="<li>Choisissez la date de promotion de votre cursus entant qu'ingénieur</li>";
				  $diplome="Doctorant, Ingenieur";
				 }
			  }
		   if(!empty($diplome2)==false && !empty($diplome3)==true)
		      {if($datePromdiplome3=="none")
			   $erreur.="<li>Choisissez la date de promotion de votre master</li>";
			   $diplome="Doctorant, Master ";
			  }
		   
		   if(!empty($diplome2)==false && !empty($diplome3)==false)
		     {if($datePromdiplome1=="none")
			   $erreur.="<li>Choisissez la date de promotion de votre doctorat</li>";			   
			   $diplome="Doctorant";
			 }
		  }
	  if (!empty($diplome1)==false && !empty($diplome2)==true)
			  {if($datePromdiplome2=="none")
			    $erreur.="<li>Choisissez la date de promotion de votre cursus entant qu'ingénieur</li>";
			    $diplomePlusHaut="Ingenieur";
				if (!empty($diplome3))
				{if($datePromdiplome3=="none")
			     $erreur.="<li>Choisissez la date de promotion de votre master</li>";
                 $diplome="Ingenieur, Master ";
				}
			    if(empty($diplome3))
				  {if($datePromdiplome2=="none")
			           $erreur.="<li>Choisissez la date de promotion de votre cursus entant qu'ingénieur</li>";
					$diplome="Ingenieur";
				  }
			  }
	  if(!empty($diplome1)==false && !empty($diplome2)==false && !empty($diplome3)==true)
	     {if($datePromdiplome3=="none")
			     $erreur.="<li>Choisissez la date de promotion de votre master</li>";
		  $diplome="Master ";
	      $diplomePlusHaut="Master";
		 }

       if(empty($diplome1)==true && empty($diplome2)==true && empty($diplome3)==true)
	     {$erreur.="<li>Diplôme non coché</li>";
		  }
		 
		 
		 switch ($datePromdiplome1)
		 {case "2005": $promDoctorat="2005"; break;
		  case "2006": $promDoctorat="2006"; break;
		  case "2007": $promDoctorat="2007"; break;
		  case "2008": $promDoctorat="2008"; break;
		  case "2009": $promDoctorat="2009"; break;
		  case "2010": $promDoctorat="2010"; break;
		  case "2011": $promDoctorat="2011"; break;
		  case "2012": $promDoctorat="2012"; break;
		  case "2013": $promDoctorat="2013"; break;
		  case "2014": $promDoctorat="2014"; break;
		  case "2015": $promDoctorat="2015"; break;
		  case "2016": $promDoctorat="2016"; break;
		 }
		 
		 switch ($datePromdiplome2)
		 {case "2005": $promIng="2005"; break;
		  case "2006": $promIng="2006"; break;
		  case "2007": $promIng="2007"; break;
		  case "2008": $promIng="2008"; break;
		  case "2009": $promIng="2009"; break;
		  case "2010": $promIng="2010"; break;
		  case "2011": $promIng="2011"; break;
		  case "2012": $promIng="2012"; break;
		  case "2013": $promIng="2013"; break;
		  case "2014": $promIng="2014"; break;
		  case "2015": $promIng="2015"; break;
		  case "2016": $promIng="2016"; break;
		 }
		 
		 switch ($datePromdiplome3)
		 {case "2005": $promMaster="2005"; break;
		  case "2006": $promMaster="2006"; break;
		  case "2007": $promMaster="2007"; break;
		  case "2008": $promMaster="2008"; break;
		  case "2009": $promMaster="2009"; break;
		  case "2010": $promMaster="2010"; break;
		  case "2011": $promMaster="2011"; break;
		  case "2012": $promMaster="2012"; break;
		  case "2013": $promMaster="2013"; break;
		  case "2014": $promMaster="2014"; break;
		  case "2015": $promMaster="2015"; break;
		  case "2016": $promMaster="2016"; break;
		 }
		 
       

      if($fonc=="admin")
           $fonction="Administration";
      if($fonc=="exec")
           $fonction="Exécution";
       if(empty($fonc))
	       $erreur.="<li>Fonction non choisie</li>";
		   
 	 
	 
	 try
	 {if(empty($erreur))

		 {$requetemodif = "UPDATE Laureats SET carteNatio='".$numCarte."',  
			Nom='".$nom."' , 
			Prenom='".$prenom."' , 
			Adresse='".$adresse."' , 
			Diplome='".$diplome."' ,
			datePromDoctorat='".$promDoctorat."' , 
			datePromIngenieur='".$promIng."' , 
			datePromMaster='".$promMaster."' , 
			Fonction='".$fonction."'   
			WHERE Id=".$_GET['Id']." ";
            $tableLaureats=$pdo->prepare($requetemodif);			
	        $tableLaureats->execute(); 
			$message="Membre modifié";
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
   font-size:10pt; 
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
   transform:translate(600px,0px);
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

#message
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
	transform:translate(100px, 0px);
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

#conteneur3
{
	font-size:13pt;
	color:#EE6600;
	transform:translate(1000px,0px);
}
	</style>
	
	
	</head>
	<body>

<div id="conteneur" >
<header id="titre"> Associtation des anciens étudiant de l'ENSA de Marrakech </header>
<form name="form" action="" method="post">
<fieldset class="fieldset">
<legend class="legend"> Modification </legend>
<div class="label">
     Numéro de la carte nationale
</div>
<div class="input">
     <input type="text" name="carteNatio" value="<?php if(empty($numCarte)) echo $donneesLaureats["carteNatio"]; else echo $numCarte; ?>" class="champ"/> 
</div> <br />
<div class="label">
     Nom
</div>
<div class="input">
     <input type="text" name="nom" value="<?php if(empty($nom)) echo $donneesLaureats["Nom"]; else echo $nom; ?>" class="champ"/> 
</div> <br />
<div class="label">
      Prenom
</div>
<div class="input">
      <input type="text" name="prenom" value="<?php if(empty($prenom)) echo $donneesLaureats["Prenom"]; else echo $prenom; ?>" class="champ" /> 
</div> <br />
<div class="label">
      Adresse
</div>
<div class="input">
      <input type="text" name="adr" value="<?php if(empty($adresse)) echo $donneesLaureats["Adresse"]; else echo $adresse; ?>" class="champ"/> 
</div> <br />
<div>
      
</div>

<div class="label">
      Diplome
</div> <br />
<div id="conteneur2">
<div class="input">
      <input type="checkbox" name="doc" checked="<?php $diplome1 ?>" class="champ"/> <label class="label" for="doc">Doctorant:</label> 
	   Promotion
      <select name="dateProm1" selected="<?php $promDoctorat ?>" class="champ">
	     <option value="none">none</option>
         <option value="2005">2005</option>
         <option value="2006">2006</option>
         <option value="2007">2007</option>
         <option value="2008">2008</option>
         <option value="2009">2009</option>
         <option value="2010">2010</option>
         <option value="2011">2011</option>
         <option value="2012">2012</option>
         <option value="2013">2013</option>
         <option value="2014">2014</option>
         <option value="2015">2015</option>
         <option value="2016">2016</option>
       </select>
</div>  <br />
<div class="input">
      <input type="checkbox" name="ing" checked="<?php $diplome2 ?>" class="champ"/> <label class="label" for="ing">Ingénieur: </label> 
	   Promotion
      <select name="dateProm2" selected="<?php $promIng ?>" class="champ" >
	     <option value="none">none</option>
         <option value="2005">2005</option>
         <option value="2006">2006</option>
         <option value="2007">2007</option>
         <option value="2008">2008</option>
         <option value="2009">2009</option>
         <option value="2010">2010</option>
         <option value="2011">2011</option>
         <option value="2012">2012</option>
         <option value="2013">2013</option>
         <option value="2014">2014</option>
         <option value="2015">2015</option>
         <option value="2016">2016</option>
       </select>
</div>  <br />
<div class="input">
      <input type="checkbox" name="mas" checked="<?php $diplome3 ?>" class="champ"/> <label class="label" for="mas">Master: </label> 
	   Promotion
      <select name="dateProm3" selected="<?php $promMaster ?>" class="champ" >	 
   	     <option value="none">none</option>
         <option value="2005">2005</option>
         <option value="2006">2006</option>
         <option value="2007">2007</option>
         <option value="2008">2008</option>
         <option value="2009">2009</option>
         <option value="2010">2010</option>
         <option value="2011">2011</option>
         <option value="2012">2012</option>
         <option value="2013">2013</option>
         <option value="2014">2014</option>
         <option value="2015">2015</option>
         <option value="2016">2016</option>
       </select>

</div>  <br />
</div>
<div class="label">
      Fonction
</div>
<div class="input">
      <input type="radio" name="fonc"  id="admin" value="admin" checked="<?php $fonc ?>" class="champ"/> <label class="label" for="admin">Administration</label>
      <input type="radio" name="fonc"  id="exec"  value="exec"  checked="<?php $fonc ?>" class="champ"/> <label class="label" for="exec">Exécution</label>
</div>  <br />
<div class="input">
      <input type="submit" name="confirmer" value="Confirmer" class="champ"/>
</div>  <br />
		


</form>
		<?php if(!empty($erreur)){ ?>
			<div id="erreur">
				<?php echo $erreur ?>
			</div>
		<?php } ?>
		<div id="message"> <?php if(!empty($message)) echo $message;  ?> </div>
		<div>
     <div id="conteneur3"><a href="BaseDeDonnee.php"> Retour vers la base de donnée </a></div>
</div>
    </body>
</html>