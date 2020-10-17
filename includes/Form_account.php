<?php
class Form_account
{
	private $dataform; // $_POST
	private $database; // PDO
	private $neededs = array(); // array ("inputName0" => "neededStatus", "inputName1" => "neededStatus", ...)
	// public $inputs = array(); // liste des inputs (nom) existantes

	/* Tableau de section de form ou chaque ligne liste les inputs (un pour les noms et un pour les obligations) 
		inputs = array( "sectionForm0" => array ("inputName0" => "neededStatus", "inputName1" => "neededStatus", ...),
							 "sectionForm1" => array ("inputName0" => "neededStatus", "inputName1" => "neededStatus", ...),
							 ...
							)
		needed = array( "sectionForm0" => array ("inputName0" => "neededStatus", "inputName1" => "neededStatus", ...),
							 "sectionForm1" => array ("inputName0" => "neededStatus", "inputName1" => "neededStatus", ...),
							 ...
							)

		for ($i=0; $i < count($this->dataform); $i++) {
				$nom_input = $this->inputs[$i];
				if( ($this->needed[$nom_input]==true) && !$nom = htmlspecialchars($this->dataform[$nom_input])) echo "Remplissez le champs obligatoire [$nom_input] !<br>";	
		}*/


	///////////////////////////////////////////// CONSTRUCTEUR /////////////////////////////////////////////
	public function __construct($pdo, $dataform = array())	{
		$this->dataform = $dataform; // pour pré-remplir le formulaire 
		$this->database = $pdo;
	}

	private function getValueFromArray($key) {
		return isset($this->dataform[$key]) ? $this->dataform[$key] : null;
	}

	///////////////////////////////////////////// METHOD HTML /////////////////////////////////////////////
	// TEXT
	public function inputText(string $name, $needed=false)	{
		$this->neededs += array($name=>$needed);
		// $this->inputs[] = $name;
		return "<label for='{$name}'>{$name}</label><input type='text' id='{$name}' name='{$name}' placeholder='{$name} ...' value='{$this->getValueFromArray($name)}' data-needed='{$needed}'>";
	}
	// PASSWORD
	public function inputPassword(string $name, $needed=true) {
		$this->neededs += array($name=>$needed);
		// $this->inputs[] = $name;
		return "<div class='pswd-voir'><label for='{$name}'>{$name}</label><input type='password' id='Password' name='{$name}' placeholder='{$name} ...' ><div id='btnVoir' class='btn btn-voir'>Voir</div></div>";
	}
	// SUBMIT
	public function submit(string $text) {
		return "<input class='btn' type='submit' value='$text'>";
	}
	// BUTTON
	public function button(string $text, string $id) {
		return "<button id='$id' type='button'>$text</button>";
	}

	///////////////////////////////////////////// INSCRIPTION /////////////////////////////////////////////
	public function signUp(/*$redirection ('typeUser0' => 'URL0')*/) {
		if (count($this->dataform) != 0) {
			// => CONTROL CHAINES
			if( ($this->neededs["Name"]==true) && !$nom = htmlspecialchars($this->dataform["Name"])) {echo "Champ [Name] obligatoire !<br>"; return;}
			else if(!$nom = htmlspecialchars($this->dataform["Name"])) $nom = "";
			if(($this->neededs["Firstname"]==true) && !$prenom = htmlspecialchars($this->dataform["Firstname"])) {echo "Champ [Firstname] obligatoire !<br>"; return;}
			else if(!$prenom = htmlspecialchars($this->dataform["Firstname"])) $prenom = "";
			if(($this->neededs["Login"]==true) && !$log = htmlspecialchars($this->dataform["Login"]))  {echo "Champ [Login] obligatoire !<br>";return;}
			if(($this->neededs["Password"]==true) && !$pswd = htmlspecialchars($this->dataform["Password"]))  {echo "Champ [Password] obligatoire !<br>";return;}

			// => REQUETE (compte existant ?)
			$retour = $this->database->myQuery("SELECT * FROM users WHERE Login='$log'");

			// => TRAITEMENT RESULTAT
			// SI rien trouvé ... on peut créer
			if ($retour && (!$retour->fetch())) {
				// => CRYPTAGE
				if(!$pswd = password_hash($pswd, PASSWORD_BCRYPT, array('cost'=>12))) { 
					echo "Erreur de cryptage du mdp ..."; 
					return; 
				}
				// => REQUETE (création)
				$sql="INSERT INTO users (login, password, name, firstname, type) VALUES ('$log', '$pswd','$nom', '$prenom','user')";
				if(($this->database->myExec($sql) == 1)) {
					// => INIT SESSION
					$retour = $this->database->myQuery("SELECT * FROM users WHERE Login='$log'");
					$_SESSION = $retour->fetch();
					// => REDIRECTION
					header('Location: ./compte.php'); 
					exit();
				}
				else echo "Erreur pendant la création du compte ..."; 
			} 
			else echo "Un compte est deja lié a cet identifiant !<br>";

			$retour = null;
		}
	}

	///////////////////////////////////////////// CONNEXION /////////////////////////////////////////////
	public function signIn(array $redirection) { // la key sera recup de la BDD OU URL dans la BDD ???---------------------------------->
		if (count($this->dataform) != 0) {
			// => CONTROL CHAINES (FONCTION TEST INPUT avec un tableau d'input en entrée) ----------------------->
			if(($this->neededs["Login"]==true) && !$log = htmlspecialchars($this->dataform["Login"])) {echo "Champ [Login] obligatoire !<br>";return;}
			if(($this->neededs["Password"]==true) && !$pswd = htmlspecialchars($this->dataform["Password"])) {echo "Champ [Password] obligatoire !<br>";return;}

			// => REQUETE
			$retour = $this->database->myQuery("SELECT * FROM users WHERE Login='$log'");

			// => TRAITEMENT RESULTAT
			// FONCTION TEST UTILISATEUR => admin(s) = back ET users = accueil ------------------------>
			if ($retour && $res = $retour->fetchAll()) {
				foreach ($res as $row) { // LOGIN UNIQUE ???? => boucle inutile --------------------->
						if ($log == $row["Login"]) { // TEST REDONDANT ???? ------------------->
							// => VERIFICATION
							if (password_verify($pswd, $row["Password"])) {
								// => INIT SESSION
								$_SESSION = $row;
								// => REDIRECTION
								// header('Location: ./compte.php'); // futur param (tableau de redirection avec une clé correspondant au type de compte) ---------->
								header('Location: '. $redirection["{$row['Type']}"]);
								exit();
							} else echo "Erreur de mot de passe";
						} else echo "Erreur d'identifiants";
				}
			} else echo "Erreur d'identifiants ...";

			$retour = null;
		}
	}

	///////////////////////////////////////////// MISE A JOUR COMPTE /////////////////////////////////////////////
	public function signUpdate() {
		if (count($_POST) != 0) {
			// => CONTROL CHAINES ($_POST et $_SESSION)
			if( ($this->neededs["Name"]==true) && !$nom = htmlspecialchars($_POST["Name"])) {echo "Champ [Name] obligatoire !<br>"; return;}
			else if(!$nom = htmlspecialchars($_POST["Name"])) $nom = "";
			if(($this->neededs["Firstname"]==true) && !$prenom = htmlspecialchars($_POST["Firstname"])) {echo "Champ [Firstname] obligatoire !<br>"; return;}
			else if(!$prenom = htmlspecialchars($_POST["Firstname"])) $prenom = "";
			if(($this->neededs["Login"]==true) && !$log = htmlspecialchars($_POST["Login"]))  {echo "Champ [Login] obligatoire !<br>";return;}
			else if(!$log = htmlspecialchars($_POST["Login"])) $log = "";
			if(($this->neededs["Password"]==true) && !$pswd = htmlspecialchars($_POST["Password"]))  {echo "Champ [Password] obligatoire !<br>";return;}		
			else if(!$pswd = htmlspecialchars($_POST["Password"])) $pswd = "";
			if(($this->neededs["Password_N1"]==true) && !$pswd_n1 = htmlspecialchars($_POST["Password_N1"]))  {echo "Champ [Password_N1] obligatoire !<br>";return;}		
			else if(!$pswd_n1 = htmlspecialchars($_POST["Password_N1"])) $pswd_n1 = "";
			if(($this->neededs["Password_N2"]==true) && !$pswd_n2 = htmlspecialchars($_POST["Password_N2"]))  {echo "Champ [Password_N2] obligatoire !<br>";return;}		
			else if(!$pswd_n2 = htmlspecialchars($_POST["Password_N2"])) $pswd_n2 = "";

			// => COMPARAISON / RECUPERATION des valeurs $_POST et $_SESSION
			$update = array();
			// si les champs sont rempli et different des données originales ... on stock pour futur UPDATE
			$retour = $this->database->myQuery("SELECT * FROM users WHERE Id='" . $_SESSION['Id'] . "'");
			if ($retour && $res = $retour->fetch()) {
				if( $nom && ($nom != $res['Name']) ) $update += array('Name'=>$nom);
				if( $prenom && ($prenom != $res['Firstname']) ) $update += array('Firstname'=>$prenom);
				if( $log && ($log != $res['Login']) ) $update += array('Login'=>$log);
				// echo '<p>'; var_dump($res); echo '</p>';
			}
			// if( $nom && ($nom != $_SESSION['Name']) ) $update += array('Name'=>$nom);
			// if( $prenom && ($prenom != $_SESSION['Firstname']) ) $update += array('Firstname'=>$prenom);
			// if( $log && ($log != $_SESSION['Login']) ) $update += array('Login'=>$log);

			// SI il y a un mdp ...
			if($pswd = htmlspecialchars($_POST["Password"])) {
				// SI il est bon ...
				if(password_verify($pswd, $_SESSION['Password'])) {
					if($pswd_n1 && $pswd_n2) {
						if($pswd_n1 == $pswd_n2) {
							if(!$pswd_n1 = password_hash($pswd_n1, PASSWORD_BCRYPT, array('cost'=>12))) { 
								echo "Erreur de cryptage du mdp ..."; 
								return;
							}
							$update += array('Password'=>$pswd_n1);
						}
						else {echo 'Erreur de confirmation ...';return;}
					}
					else {echo 'Entrez le nouveau mdp et sa confirmation !'; return;}
				} else {echo 'Erreur de mot de passe <br>'; return;}
			}// echo ' <<< UPDATE >>>'.var_dump($update).'<br>'; //-----------------
			
			// => REQUETE (UPDATE)
			// SI update n'est pas vide ...
			if(isset($update) && count($update) > 0) {
				// on recup les clés
				$keys = array_keys($update);
				//construction de la requete SQL en fonction du nombre de données entrées
				$sql = 'UPDATE users SET ';
				for ($i=0; $i < count($keys); $i++) { 
					$sql .= $keys[$i] .'="'. $update[$keys[$i]].'"';
					if($i < count($keys) - 1) $sql .= ', ';
				}
				$sql .= ' WHERE Id="'. $_SESSION['Id'].'"';
				// echo '<<< .SQL. >>>'.var_dump($sql).'<br>'; //-----------------
				if($this->database->myExec($sql) == 0) echo 'Erreur modification ...';
				else {
					// => MAJ DATA SESSION
					for ($i=0; $i < count($update); $i++) { 
						$_SESSION[$keys[$i]] = $update[$keys[$i]];	
					}// echo ' <<< SESSION >>>'.var_dump($_SESSION).'<br>'; //-----------------
				}
			} else echo 'Aucune modification a faire !';
		}
	}

	///////////////////////////////////////////// SUPPRESSION COMPTE /////////////////////////////////////////////
	public function signDown(string $targetedLogin)	{
		if(isset($targetedLogin)) {
			$targetedLogin = htmlspecialchars($targetedLogin);
			// => REQUETE (DELETE)
			$sql ='DELETE FROM users WHERE Login="'.$targetedLogin.'"';
			echo ' <<< SQL >>>'.var_dump($sql).'<br>'; //-----------------
			if($this->database->myExec($sql) == 1 ) echo 'Compte supprimé !';
			else echo 'Compte introuvalbe ...';
		} else echo 'Choisissez votre cible !';
	}

	///////////////////////////////////////////// DECONNEXION /////////////////////////////////////////////
	public function signOut(string $text, string $path) {
		// crée un lien qui redirige vers (path) le script php qui s'occupe de la déconnexion
		return "<a id='signOut' style='display:block;' href='$path'>$text</a>";
	}
}
