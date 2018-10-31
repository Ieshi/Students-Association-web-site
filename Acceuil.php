
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
} 
.label
{ 
   display:inline-block; 
   font-family:verdana, arial, sans-serif; 
   font-size:12pt; 
   padding:10px;
   transform:translate(0px,100px);   
} 

#conteneur2
{
	font-family:verdana, arial, sans-serif; 
   font-size:13pt; 
   color:#000; 
   margin:10px; 
   padding:10px 20px 10px 130px; 
   border-radius:4px;
   transform:translate(100px,15px);
}
#conteneur3
{
	font-family:verdana, arial, sans-serif; 
   font-size:11pt; 
   color:#000; 
   margin:10px; 
   padding:10px 20px 10px 130px; 
   border-radius:4px;
   transform:translate(150px,0px);
}
#titre
{  
   font-family:verdana, arial, sans-serif; 
   font-size:16pt; 
   font-weight:bold; 
   color:#EE6600; 
   margin:10px; 
   padding:10px 20px 10px 100px; 
   border-radius:4px; 
} 
	</style>
	</head>
	<body>
	<div id="conteneur"> <br />
 <fieldset class="fieldset">
 <legend class="legend"> Accueil </legend>
<div id="titre"> L'association des anciens étudiants de l'ENSA de Marrakech vous souhaite la bienvenue! </div> 
<div id="conteneur2"> Ici sont réuni presque tout les lauréat de l'ENSA de Marrakech de quoi:</div>
<div id="conteneur3"> <li>Retrouver ses anciens collègues.</li>
                      <li>Elargir votre réseau: "Networking".</li>
					  <li>Et bien sur vous faire des amis puisqu'a l'ENSA on est une grande famille !</li>
</div>
<div id="conteneur2"> L'association a pour but de:</div>
<div id="conteneur3"> <li>Réunir tout les diplomé de l'ENSA.</li>
                      <li>Faire des levées de fond pour les activités de l'école.</li>
</div>
 <div class="label"> Si vous êtes déjà membre n'hésitez pas à vous <a href="seConnecter.php">Connecter</a>. Sinon <a href="Ajout.php"> rejoignez la famille ! </a> </div> <br />
 </fieldset>
    </div>
 

	</body>
</html>