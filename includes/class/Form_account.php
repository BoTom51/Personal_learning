<?php
class Form_account
{
	private $dataform; // $_POST
	private $database; // PDO
	private $neededs = array(); // array ("inputName0" => "neededStatus", "inputName1" => "neededStatus", ...)
	private $inputs = array(); // liste des inputs (name : string) existantes
	private $nbRadio = 0;

	///////////////////////////////////////////// CONSTRUCTEUR /////////////////////////////////////////////
	public function __construct($pdo, $dataform = array())	{
		$this->dataform = $dataform; // pour pré-remplir le formulaire 
		$this->database = $pdo;
	}

	///////////////////////////////////////////// METHODES INTERNES /////////////////////////////////////////////
	private function getValueFromArray($key) {
		return isset($this->dataform[$key]) ? utf8_encode($this->dataform[$key]) : null;
	}

	private function setValueFromArray($key, $value) {
		$this->dataform[$key] = utf8_decode($value);
	}

	private function verify_inputs() {
		// echo '<pre>'; var_dump($this->inputs); echo '</pre><<< INPUTS >>><br>'; //------------------
		// echo '<pre>'; var_dump($this->dataform); echo '</pre><<< DATA AVANT >>><br>'; //--------------------
		for ($i=0; $i < count($this->inputs); $i++) {
			

			// SI champ obligatoire ...
			if ($this->neededs["{$this->inputs[$i]}"]===true) {
				// SI vide ... message d'erreur
				if ( !isset($this->dataform["{$this->inputs[$i]}"]) ) {
					echo "Champ [{$this->inputs[$i]}] obligatoire !<br>";
					exit();
				}
			}
			else {
				if( $this->dataform["{$this->inputs[$i]}"] === null && $this->inputs[$i] !== 'Phone' && $this->inputs[$i] !== 'Code') $this->dataform["{$this->inputs[$i]}"] = '';
				else if($this->dataform["{$this->inputs[$i]}"] === null) $this->dataform["{$this->inputs[$i]}"] = '0';
			}
			// utf8_decode change l'encodage des caracteres spéciaux, utilisé pour les donnees envoyé dans la BDD
			$this->dataform["{$this->inputs[$i]}"] = utf8_decode( $this->dataform["{$this->inputs[$i]}"] ); 
		}
		// echo '<pre>'; var_dump($this->dataform); echo '</pre><<< DATA APRES >>><br>'; //--------------------
	}

	private function need_update($rowDB) {
		$update = array();
		for ($i=0; $i < count($this->inputs) ; $i++) {
			// SI ce n'est pas le champ mdp ...
			if($this->inputs[$i] !== 'Password' && $this->inputs[$i] !== 'Password_N1' && $this->inputs[$i] !== 'Password_N2') {
				if( $this->dataform[$this->inputs[$i]] !== $rowDB[$this->inputs[$i]] ) $update += array($this->inputs[$i] => $this->dataform[$this->inputs[$i]]);
			} 
			// SINON ... SI il y a un mdp ...
			else if($this->inputs[$i] === 'Password' && $this->dataform['Password'] !== '') {
				// SI il est bon ...
				if(password_verify($this->dataform['Password'], $rowDB['Password'])) {
					if( ($this->dataform['Password_N1'] !== '') && ( $this->dataform['Password_N2'] !== '')) {
						if( $this->dataform['Password_N1'] === $this->dataform['Password_N2'] ) {
							if(!$this->dataform['Password_N1'] = password_hash($this->dataform['Password_N1'], PASSWORD_BCRYPT, array('cost'=>12))) { 
								echo "Erreur de cryptage du mdp ..."; 
								return; 
							}
							$update += array('Password' => $this->dataform['Password_N1']);
						}
						else {
							echo 'Erreur de confirmation ...'; 
							return;
						}
					}
					else {
						echo 'Entrez le nouveau mdp et sa confirmation !'; 
						return;
					}
				} else {
					echo 'Erreur de mot de passe <br>'; 
					return;
				}
			}
		}
		// echo '<pre>'; var_dump($update); echo '</pre><<< UPDATE >>><br>'; //-----------------
		return $update;
	}

	///////////////////////////////////////////// METHODES HTML /////////////////////////////////////////////
	// TEXT
	public function inputText(string $title, string $text, string $name, $needed=false)	{
		$this->neededs += array($name=>$needed);
		$this->inputs[] = $name;
		return "<label for='{$name}'>{$title}</label><input type='text' id='{$name}' name='{$name}' placeholder='{$text}' value='". $this->getValueFromArray($name) ."'>";
	}
	// PASSWORD
	public function inputPassword(string $title, $text="Mot de passe ...", $name="Password", $needed=true) {
		$this->neededs += array($name=>$needed);
		$this->inputs[] = $name;
		// id brut => css/js
		return "<div class='pswd-voir'><label for='{$name}'>{$title}</label><input type='password' id='Password' name='{$name}' placeholder='{$text}' ><div id='btnVoir' class='btn btn-voir'>Voir</div></div>";
	}
	// SELECT
	public function inputSelect(string $title, array $options, string $name, $needed=true) {
		$this->neededs += array($name=>$needed);
		$this->inputs[] = $name;

		// ouverture du select
		$html = "<label for='{$name}'>{$title}</label><select id='{$name}' name='{$name}'>";
		// creation des options
		for ($i=0; $i < count($options); $i++) {
			$value=$i+1;
			if($this->getValueFromArray($name) === "$value") $html .= "<option value='{$value}' selected='selected'>{$options[$i]}</option>";
			else $html .= "<option value='{$value}'>{$options[$i]}</option>";
		}
		// fermeture du select
		$html .= "</select>";

		return $html;
	}
	// RADIO
	public function inputRadio(string $title, $name='Id_formation', $needed=true) {
		$this->neededs += array($name=>$needed);
		// les inputs radio on besoin d'avoir le meme $name pour etre traité comme un groupe d'options
		$flag = false;
		for ($i=0; $i < count($this->inputs); $i++) {
			if($this->inputs[$i] === $name) $flag=true;
		}
		if(!$flag) $this->inputs[] = $name;

		$this->nbRadio++;
		if($this->getValueFromArray($name) === null) $this->setValueFromArray($name, '1');
		if($this->getValueFromArray($name) === "$this->nbRadio") {
			return "<label for='radio'>{$title}</label><input type='radio' id='radio' name='{$name}' value={$this->nbRadio} checked>";
		}
		else return "<label for='radio'>{$title}</label><input type='radio' id='radio' name='{$name}' value={$this->nbRadio}>";
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
	public function signUp() {
		if (count($this->dataform) !== 0) {
			// => CONTROL CHAINES
			$this->verify_inputs(); // rend impossible les champs null ou undefined
			unset($this->dataform['createAccount']); // => uniquement dans ce cas precis (polution du myExecute)

			// => REQUETE (compte existant ?)
			$prep_sqlSelect = $this->database->myPrepare("SELECT * FROM users WHERE Email = :Email");
			$this->database->myExecute($prep_sqlSelect, ['Email' => $this->dataform['Email']]);
			// => TRAITEMENT RESULTAT
			// SI rien trouvé ... on peut créer
			if ($prep_sqlSelect && !$prep_sqlSelect->fetch()) {
				// => CRYPTAGE
				if(!$this->dataform['Password'] = password_hash($this->dataform['Password'], PASSWORD_BCRYPT, array('cost'=>12))) {
					echo "Erreur de cryptage du mdp ...";
					return;
				}	
				$strColonnes = '(Id, ' . implode(', ', $this->inputs) .', Id_type)';
				$strValeurs = '(:Id, :' . implode(', :', $this->inputs) . ', :Id_type)';
				$this->dataform += array('Id_type'=>2); // le type d'utilisateur sera toujour le meme
				$this->dataform += array('Id'=>0); // il sera auto-incré par rapport a la BDD

				$prep_sqlCreate = $this->database->myPrepare("INSERT INTO users $strColonnes VALUES $strValeurs");
				if($this->database->myExecute($prep_sqlCreate, $this->dataform)) {
					// => INIT SESSION
					// $sql="SELECT Id,Name,Firstname,Email,Password,Phone,Code,Statut_name,Formation_name,Niveau_name,Type_name FROM users NATURAL JOIN statuts NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN types WHERE Email = :Email";
					// $prep_sqlSelect = $this->database->myPrepare($sql);
					$this->database->myExecute($prep_sqlSelect, array('Email' => $this->dataform['Email']));
					$_SESSION = $prep_sqlSelect->fetch();
					// => REDIRECTION 
					header('Location: ./compte.php');
					exit();
				}
				else echo "Erreur pendant la création du compte ..."; 
			}
			else echo "Un compte est deja lié a cet identifiant !<br>";

			$prep_sqlSelect = null;
			$prep_sqlCreate = null;
		}
	}

	///////////////////////////////////////////// CONNEXION /////////////////////////////////////////////
	public function signIn(array $redirections) {
		if (count($this->dataform) !== 0) {
			// => CONTROL CHAINES
			$this->verify_inputs(); // rend impossible les champs null ou undefined
			// echo '<pre>'; var_dump($this->dataform); echo '</pre>'; //-----------------

			// => REQUETE
			// $sql="SELECT Id,Name,Firstname,Email,Password,Phone,Code,Statut_name,Formation_name,Niveau_name,Type_name FROM users NATURAL JOIN statuts NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN types WHERE Email = :Email";
			// $prep_sqlSelect = $this->database->myPrepare($sql);
			$prep_sqlSelect = $this->database->myPrepare("SELECT * FROM users WHERE Email = :Email");
			$this->database->myExecute($prep_sqlSelect, ['Email' => $this->dataform['Email']]);
			
			// => TRAITEMENT RESULTAT
			if ($prep_sqlSelect && $res = $prep_sqlSelect->fetchAll()) {
				foreach ($res as $row) { // Email UNIQUE ???? => boucle inutile --------------------->
						if ($this->dataform['Email'] === $row['Email']) { // TEST REDONDANT ???? ------------------->
							// => VERIFICATION
							if (password_verify($this->dataform['Password'], $row["Password"])) {
								// => INIT SESSION
								$_SESSION = $row;
								// => REDIRECTION
								// header('Location: '. $redirections["{$row['Type_name']}"]);
								header('Location: '. $redirections["{$row['Id_type']}"]);
								exit();
							} else echo "Erreur de mot de passe";
						} else echo "Erreur d'identifiants";
				}
			} else echo "Erreur d'identifiants ...";

			$res = null;
			$prep_sqlSelect = null;
		}
	}

	///////////////////////////////////////////// MISE A JOUR COMPTE /////////////////////////////////////////////
	public function signUpdate() { // utf8_encode et decode ----------------------------------------------->
		if (count($_POST) !== 0) {
			// => CONTROL CHAINES
			$this->verify_inputs(); // rend impossible les champs null ou undefined
			// echo '<pre>'; var_dump($this->dataform); echo '</pre><<< DATAFORM >>><br>'; //---------------------
			
			// => PREPARATION des valeurs $_POST et BDD
			$update = array();
			// si les champs sont rempli et different des données originales ... on stock pour futur UPDATE
			$prep_sqlSelect = $this->database->myPrepare("SELECT * FROM users WHERE Id = :Id");
			$this->database->myExecute($prep_sqlSelect, ['Id' => $_SESSION['Id']]);
			// echo '<pre>'; var_dump($prep_sqlSelect); echo '</pre><<< SQL SELECT >>><br>'; //---------------------

			if ($prep_sqlSelect && $res = $prep_sqlSelect->fetch()) {
				$update = $this->need_update($res);
			}
			// echo '<pre>'; var_dump($res); echo '</pre><<< RES >>><br>'; //---------------------

			// => REQUETE (UPDATE)
			// SI update n'est pas vide ...
			if(isset($update) && count($update) > 0) {
				// on recup les clés
				$keys = array_keys($update);
				//construction de la requete SQL en fonction du nombre de données entrées
				$sql = 'UPDATE users SET ';
				for ($i=0; $i < count($keys); $i++) { 
					$sql .= $keys[$i] .'= :'. $keys[$i];
					if($i < count($keys) - 1) $sql .= ', ';
				}
				$sql .= ' WHERE Id="'. $_SESSION['Id'].'"';

				$prep_sqlUpdade = $this->database->myPrepare($sql);
				// echo '<pre>'; var_dump($sql); echo '</pre><<< SQL >>><br>'; //-----------------

				if(!$this->database->myExecute($prep_sqlUpdade, $update)) echo 'Erreur modification ...';
				else {
					// => MAJ DATA SESSION
					for ($i=0; $i < count($update); $i++) { 
						$_SESSION[$keys[$i]] = $update[$keys[$i]];	
					}
					// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>><br>'; //-----------------
				}
			} else echo 'Aucune modification a faire !';
		}
	}

	///////////////////////////////////////////// SUPPRESSION COMPTE /////////////////////////////////////////////
	public function signDown(string $targetedLogin)	{
		if(isset($targetedLogin)) {
			$targetedLogin = htmlspecialchars($targetedLogin);
			// => REQUETE (DELETE)
			$sql ='DELETE FROM users WHERE Email="'.$targetedLogin.'"';
			// echo ' <<< SQL >>>'.var_dump($sql).'<br>'; //-----------------
			if($this->database->myExec($sql) == 1 ) echo 'Compte(s) supprimé(s) !';
			else echo 'Compte introuvable ...';
		} else echo 'Choisissez vo(s)tre cible(s) !';
	}

	///////////////////////////////////////////// DECONNEXION /////////////////////////////////////////////
	public function signOut(string $text, string $path) {
		// crée un lien qui redirige vers (path) le script php qui s'occupe de la déconnexion
		return "<a id='signOut' style='display:block;' href='$path'>$text</a>";
	}
}
