<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Les excuses du lundi matin</title>
	  
		<link href="css/monStyle.css" rel="stylesheet">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	</head>
	<body>
		<?php 
			// Remplissage des 8 tableaux avec les portions de phrases //
			$tabEx1[1]="Tôt dans la matinée,";
			$tabEx1[2]="Vers 4h du matin,";
			$tabEx1[3]="Hier soir,";
			$tabEx1[4]="Tard dans la nuit,";
			$tabEx1[5]="En pleine nuit,";
			
			$tabEx2[1]="alors que";
			$tabEx2[2]="pendant que";
			$tabEx2[3]="au moment où";
			$tabEx2[4]="tandis que";
			$tabEx2[5]="comme";
			$tabEx2[6]="cependant que";
			
			$tabEx3[1]="je dormais après avoir relu pour la 3eme fois le cours GSI,";
			$tabEx3[2]="je sommeillais en attendant de me lever pour mon jogging quotidien de 5h du matin,";
			$tabEx3[3]="je somnollais après avoir passé en revue le document sur le CSS,";
			$tabEx3[4]="je m'étais assoupi sur une des oeuvres passionnantes de Friedrich Wilheim Nietzsche,";
			$tabEx3[5]="je me reposais après avoir pratiqué 2h intenses de C++,";
			$tabEx3[6]="je m'étais endormis sur un article fort intéressant du 01 Informatique,";
			$tabEx3[7]="je faisais un somme après avoir fini de traduire Guerre &amp; Paix en japonais,";
			$tabEx3[8]="je m'étais assoupi sur la brillante émission 'Chasse et Pêche',"	;
			
			$tabEx4[1]="mon chat";
			$tabEx4[2]="mon chien";
			$tabEx4[3]="mon poisson rouge";
			$tabEx4[4]="mon perroquet";
			$tabEx4[5]="mon sanglier domestique";
			$tabEx4[6]="ma colocataire";
			$tabEx4[7]="mon hamster";
			
			$tabEx5[1]="a joué avec le fil électrique de";
			$tabEx5[2]="s'est pris les pates dans le fil électrique de";
			$tabEx5[3]="a appuyé par mégarde sur le bouton OFF de";
			$tabEx5[4]="a débranché";
			$tabEx5[5]="a renversé du soda sur";
			$tabEx5[6]="a fait tomber dans la baignoire";
			$tabEx5[7]="a rebooté";
			
			$tabEx6[1]="mon radio-réveil qui n'a donc pas sonné, et ce n'est";
			$tabEx6[2]="mon smartphone qui n'a donc pas sonné, et ce n'est";
			
			$tabEx7[1]="que lorsque les pompiers sont entrés en hurlant 'AU FEU !'";
			$tabEx7[2]="qu'au moment où les huissiers (venus pour le voisin) ont enfoncé la porte";
			$tabEx7[3]="qu'avec l'arrivée du SAMU, venu chercher le voisin d'en dessous";
			$tabEx7[4]="qu'après l'entrée fracassante de la SPA";
			$tabEx7[5]="qu'au moment où Spiderman a sonné à la porte";
			$tabEx7[6]="que quand le plombier est venu réparer l'inondation";
			$tabEx7[7]="qu'avec la visite d'un vendeur d'encyclopédies";
			
			
			$tabEx8[1]="que je me suis réveillé";
			$tabEx8[2]="que mon collocataire m'a reveillé";
			$tabEx8[3]="que j'ai réalisé qu'il était trop tard pour venir à l'IUT ce matin";
			$tabEx8[4]="que j'ai bondi hors de mon lit pour me ruer à l'IUT";
			
			// Génération d'un tableau général à deux dimensions contenant la totalité des textes //
			$tabExGen[1]=$tabEx1;
			$tabExGen[2]=$tabEx2;
			$tabExGen[3]=$tabEx3;
			$tabExGen[4]=$tabEx4;
			$tabExGen[5]=$tabEx5;
			$tabExGen[6]=$tabEx6;
			$tabExGen[7]=$tabEx7;
			$tabExGen[8]=$tabEx8;
		?>
		<div class="container-fluid">
			<div class="row cadre ">	
				<div class="col-xs-12">
					<?php					
						if (isset($_POST["var1"])) {
							// Si le formulaire a déja été rempli. On ne teste que la première variable car si la première est remplie, les autres le seront aussi.
							echo "<h1>Mon excuse : </h1>";
							echo "<h2>".$_POST["var1"]." ".$_POST["var2"]." ".$_POST["var3"]." ".$_POST["var4"]." ".$_POST["var5"]." ".$_POST["var6"]." ".$_POST["var7"]." ".$_POST["var8"].".</h2><br/>";
							echo "<br/>(Vous pouvez modifier votre excuse en changeant les champs.)<br/>&nbsp;";
						} else {
							// La page a été appelée sans envoi du formulaire.
							echo "<h1>Tous les lundis, une excuse différente ! </h1>";
							echo "Générez votre excuse du lundi matin en selectionnant les différents champs.<br/>&nbsp;";
						}
					?>
				</div>
			</div>
			<div class="row cadre ">	 
				<div class="col-xs-12">
					<form method="post" action="lundiMatinLight.php">
						<?php 
							$i=0; 									// Variable utilisée pour générer les var1, var2, ... var8
							foreach ($tabExGen as $value){ 			// Boucle dans le tableau général
								$i++; 								// Incrémentation de la variable compteur 
								echo '<select name="var'.$i.'">';	// Démarrage du select qui contiendra les options du tableau en cours 
								foreach ($value as $value2){		// Boucle dans la liste des morceaux du tableau en cours
									echo "<option";					// Rajout d'une option
								
									if (isset($_POST["var$i"]) && $value2==$_POST["var$i"]) {	// Si l'option en cours est l'option qui a été envoyée je la mets par défaut
										echo ' selected';
									}
									echo " >$value2</option>";		// Rajout du contenu de l'option 
								}
								echo '</select>';					// Fin du select
								echo '<br/>';						// Saut de ligne HTML
							}
						?>
						<!-- Bouton de validation du formulaire -->
						<input type="submit" value="Générer l'excuse">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>