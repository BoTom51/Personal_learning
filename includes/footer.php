<footer>

	<menu class="menu">
		<h4>Menu</h4>
		<ul>
			<li><a href="<?= ROOT_URL; ?>">Accueil</a></li>
			<li><a href="<?= ROOT_URL; ?>/front/recherche.php?action=0">Articles</a></li>
			<li><a href="<?= ROOT_URL; ?>/front/recherche.php?action=1">Cours</a></li>
			<li><a href="<?= ROOT_URL; ?>/front/recherche.php?action=2">Exercices</a></li>
		</ul>
	</menu>

	<account class="account">
		<h4>Gestion de Compte</h4>
		<ul>
			<?php if (be_connect()) : ?>
				<li><a href="<?= ROOT_URL; ?>/includes/session_close.php">Déconnexion</a></li>
				<li><a href="<?= ROOT_URL; ?>/front/compte.php"></a>Votre compte</li>
				<li><a href="#">Demande de désinscription</a></li>
			<?php else : ?>
				<li><a href="<?= ROOT_URL; ?>/front/connexion.php">Se connecter / S'inscrire</a></li>
			<?php endif; ?>
		</ul>
	</account>

	<coordo class="coordo">
		<h4>Nos coordonnées</h4>
		<ul>
			<li>
				<img src="<?= ROOT_URL; ?>/assets/icon/localisation.png" alt="Adresse">
				<a target="_blank" href="https://www.google.fr/maps/place/AFPA/@43.3285266,5.4120473,17z/data=!3m1!4b1!4m5!3m4!1s0x12c9bf97c6a188b5:0x26144d7cd0241160!8m2!3d43.3285266!4d5.414236">452 rue Jean-Caisse 13012 Marseille, France</a>
			</li>
			<li><img src="<?= ROOT_URL; ?>/assets/icon/phone.png" alt="Téléphone"><a href="tel:+33485265473">+33485265473</a></li>
			<li><img src="<?= ROOT_URL; ?>/assets/icon/mail.png" alt="E-mail"><a href="mailto:cash@corp.com">cash@corp.com</a></li>
		</ul>
	</coordo>

	<social class="social">
		<h4>Nous suivre</h4>
		<a title="facebook" href=""><img src="<?= ROOT_URL; ?>/assets/icon/facebook_icon.png" alt="facebook"></a>
		<a title="twitter" href=""><img src="<?= ROOT_URL; ?>/assets/icon/twitter_icon.png" alt="twitter"></a>
		<a title="linkedin" href=""><img src="<?= ROOT_URL; ?>/assets/icon/linkedin_icon.png" alt="linkedin"></a>
		<a title="youtube" href=""><img src="<?= ROOT_URL; ?>/assets/icon/youtube_icon.png" alt="youtube"></a>
		<a title="instagram" href=""><img src="<?= ROOT_URL; ?>/assets/icon/instagram_icon.png" alt="instagram"></a>
	</social>

	<copyright class="copyright">©2021 - Site créé par : Moi !</copyright>

</footer>