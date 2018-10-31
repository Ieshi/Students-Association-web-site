<?php
	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
	@$email=$_POST["email"];
	@$login=$_POST["login"];
	@$pass=$_POST["pass"];
	@$repass=$_POST["repass"];
	@$valider=$_POST["valider"];
	$erreur="";
	if(isset($valider)){
		if(empty($nom)) 
			$erreur="<li>Nom invalide!</li>";
		if(empty($prenom)) 
			$erreur.="<li>Prénom invalide!</li>";
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			$erreur.="<li>Email invalide!</li>";
		if(strlen($login)<4) 
			$erreur.="<li>Login invalide!</li>";

		$vp=preg_match("#[A-Z]#",$pass)+preg_match("#[a-z]#",$pass)+preg_match("#[0-9]#",$pass);

		if(strlen($pass)<4 || $vp!=3) 
			$erreur.="<li>Mot de passe invalide!</li>";
		if($pass!=$repass) 
			$erreur.="<li>Mots de passe non identiques!</li>";
		if(empty($erreur)){
			include("connexion.php");
			$sel=$pdo->prepare("select id from users where login=? limit 1");
			$sel->execute(array($login));
			$tab=$sel->fetchAll();
			if(count($tab)>0)
				$erreur.="<li>Login existe déjà!</li>";

			$sel=$pdo->prepare("select id from users where email=? limit 1");
			$sel->execute(array($email));
			$tab=$sel->fetchAll();
			if(count($tab)>0)
				$erreur.="<li>Email existe déjà!</li>";
			if(empty($erreur)){
				$ins=$pdo->prepare("insert into users(date,nom,prenom,email,login,pass) value(now(),?,?,?,?,?)");
				$ins->execute(array($nom,$prenom,$email,$login,md5($pass)));
				header("location:login.php");
			}


		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			*{
				font:12pt verdana;
			}
			body{
				margin:0;
			}
			header{
				padding:20px;
				background-color:#EEE;
				font-size:24pt;
				margin-bottom:20px;
			}
			.label{
				color:#888;
				margin-left:20px;
			}
			input{
				margin-bottom:10px;
				border:solid 1px #AAA;
				padding:10px;
				outline:none;
				margin-left:20px;
				display:block;
			}
			input[type="submit"]{
				border:none;
				background-color:#E60;
				color:#FFF;
				cursor:pointer;
				margin-top:20px;
			}
			input[type="submit"]:hover{
				opacity:0.8;
			}
			#erreur{
				position:fixed;
				width:300px;
				min-height:100px;
				padding:20px;
				background-color:#A00;
				color:#FFF;
				right:0;
				top:200px;
				border-radius:10px 0 0 10px;
			}
		</style>
	</head>
	<body>
		<header>Inscription</header>
		<form name="fo" method="post" action="">
			<div class="label">Nom</div>
			<input type="text" name="nom" value="<?php echo $nom?>" />
			<div class="label">Prénom</div>
			<input type="text" name="prenom" value="<?php echo $prenom?>" />
			<div class="label">Email</div>
			<input type="text" name="email" value="<?php echo $email?>" />
			<div class="label">Login</div>
			<input type="text" name="login" value="<?php echo $login?>" />
			<div class="label">Mot de passe</div>
			<input type="text" name="pass" />
			<div class="label">Confirmer le mot de passe</div>
			<input type="password" name="repass" />
			<input type="submit" name="valider" value="S'inscrire" />
		</form>
		<?php if(!empty($erreur)){ ?>
			<div id="erreur">
				<?php echo $erreur ?>
			</div>
		<?php } ?>

	</body>
</html>