<?php if (basename($_SERVER["PHP_SELF"], '.php') === "index") : ?>
	<script src="<?= ROOT_URL ?>/assets/js/carrousel.js"></script>
<?php endif; ?>

<?php if (basename($_SERVER["PHP_SELF"], '.php') === "recherche") : ?>
	<script src="<?= ROOT_URL ?>/assets/js/list_interactive.js"></script>
<?php endif; ?>

<?php if (basename($_SERVER["PHP_SELF"], '.php') === "connexion" || basename($_SERVER["PHP_SELF"], '.php') === "compte" || basename($_SERVER["PHP_SELF"], '.php') === "back") : ?>
	<?php if (basename($_SERVER["PHP_SELF"], '.php') === "connexion") : ?>
		<script src="<?= ROOT_URL ?>/assets/js/connexion.js"></script>
	<?php endif; ?>
	<script src="<?= ROOT_URL ?>/assets/js/password_visibility.js"></script>
<?php endif; ?>