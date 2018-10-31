
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
	
	@$cot_obg="";
	@$cot_opt=$_POST["cot_opt"];
	@$numCarteBancaire=$_POST["numCarteBancaire"];
	@$valider=$_POST["valider"];

	include("connexion.php");

if(isset($confirmer))
  {  $req=$pdo->prepare("SELECT * FROM Laureats WHERE carteNatio=carteNatio='".$numCarte."'");
      $req->execute();
	  $donneesLaureat=$req->fetchall();
	   if(count($donneesLaureat)>0)
		  $erreur="<li>L'étudiant éxiste déjà dans la base de données</li>";
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
	   
	   
	   
	     if ($diplomePlusHaut=="Doctorant")
                  $cot_obg="100";
        if($diplomePlusHaut=="Ingenieur" || $diplomePlusHaut=="Master")
                 $cot_obg="80";
	   
		 	 
						
	}



			 
  if(isset($valider))
	 {$req=$pdo->prepare("SELECT * FROM Laureats WHERE carteNatio='".$numCarte."'");
      $req->execute();
	  $donneesLaureat=$req->fetch();
	   if(!empty($donneesLaureat))
		  $erreur="<li>L'étudiant éxiste déjà dans la base de données</li>";
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
	   
	   
	   
	     if ($diplomePlusHaut=="Doctorant")
                  $cot_obg="100";
        if($diplomePlusHaut=="Ingenieur" || $diplomePlusHaut=="Master")
                 $cot_obg="80";
		
	  if(empty($numCarteBancaire))
			  $erreur="Entrez le numéro de votre carte bancaire";
	  if(empty($erreur))
	   { try{
            include("connexion.php");
			
            $table1=$pdo->prepare("insert into Laureats(carteNatio,nom,prenom,adresse,diplome,datePromDoctorat,datePromIngenieur,datePromMaster,fonction) values(?,?,?,?,?,?,?,?,?)");
			$table1->execute(array($numCarte,$nom,$prenom,$adresse,$diplome,$promDoctorat,$promIng,$promMaster,$fonction));
			$gettable1=$pdo->prepare("select * from Laureats where carteNatio='".$numCarte."'");
			$gettable1->execute();
			$donnees=$gettable1->fetch();
			$IDLaureat=$donnees['Id'];
            $table2=$pdo->prepare("insert into fonds(numCarteBancaire,MontantCotisation,MontantContribution,Id,Date) values(?,?,?,?,now())");
			$table2->execute(array($numCarteBancaire,$cot_obg,$cot_opt,$IDLaureat));

            header("location:bienvenue.php");
	   }
	   catch(PDOException $e){
		echo $e->getMessage();
	}
       
		
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
   transform:translate(200px,0px);
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
	</style>
	
	
	</head>
	<body>

<div id="conteneur" >
<header id="titre"> Associtation des anciens étudiant de l'ENSA de Marrakech </header>
<form name="form" action="" method="post">
<fieldset class="fieldset">
<legend class="legend"> Inscription </legend>
<div class="label">
     Numéro de la carte nationale
</div>
<div class="input">
     <input type="text" name="carteNatio" value="<?php echo $numCarte ?>" class="champ"/> 
</div> <br />
<div class="label">
     Nom
</div>
<div class="input">
     <input type="text" name="nom" value="<?php echo $nom ?>" class="champ"/> 
</div> <br />
<div class="label">
      Prenom
</div>
<div class="input">
      <input type="text" name="prenom" value="<?php echo $prenom ?>" class="champ" /> 
</div> <br />
<div class="label">
      Adresse
</div>
<div class="input">
      <input type="text" name="adr" value="<?php echo $adresse ?>" class="champ"/> 
</div> <br />
<div>
      
</div>

<div class="label">
      Diplome
</div> <br />
<div id="conteneur2">
<div class="input">
      <input type="checkbox" name="doc"  class="champ"/> <label class="label" for="doc">Doctorant:</label> 
	   Promotion
      <select name="dateProm1"  class="champ">
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
      <input type="checkbox" name="ing"  class="champ"/> <label class="label" for="ing">Ingénieur: </label> 
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
      <input type="checkbox" name="mas"  class="champ"/> <label class="label" for="mas">Master: </label> 
	   Promotion
      <select name="dateProm3"  class="champ" >	 
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
      <input type="radio" name="fonc"  id="admin" value="admin"   class="champ"/> <label class="label" for="admin">Administration</label>
      <input type="radio" name="fonc"  id="exec"  value="exec"    class="champ"/> <label class="label" for="exec">Exécution</label>
</div>  <br />
<div class="input">
      <input type="submit" name="confirmer" value="Confirmer" class="champ"/>
</div>  <br />
		

<div class="label">
      Numéro de votre carte bancaire 
</div>
<div class="input">
	  <input type="text" name="numCarteBancaire" class="champ"/> 
</div> <br />

<div class="label">
     Cotisation Obligatoire <?php echo $cot_obg ?>  <span>DHs</span> 
</div> <br />

<div class="label">
      Contribution facultative 
</div>
<div class="input">  
	  <input type="text" name="cot_opt" value="<?php echo $cot_opt ?>" class="champ" /> <span>DHs</span> 
</div> <br />

<div>
      <input type="submit" name="valider" value="Valider" class="champ"/> 
</div> <br />
   
</fieldset>
</form>		
		
		
	    <?php if(!empty($erreur)){ ?>
			<div id="erreur">
				<?php echo $erreur ?>
			</div>
		<?php } ?>
		
</div>
		
	</body>
</html>