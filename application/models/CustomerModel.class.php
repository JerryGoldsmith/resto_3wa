<?php

class CustomerModel extends Database
{
	const FIND_CUSTOMER = "SELECT
		Id,
		LastName,
		FirstName,
		Email,
		Password,
		Country,
		Address,
		City,
		ZipCode,
		Phone
	FROM Customer
	WHERE Id = ?";

	const CREATE_CUSTOMER =
	"INSERT INTO `Customer`(`FirstName`, `LastName`, `Email`, `Password`, `Address`, `Country`, `City`, `ZipCode`, `Phone`)
	 VALUES (?,?,?,?,?,?,?,?,?)";

	 const LOGIN_CUSTOMER =
 	"SELECT *
 	 FROM Customer
	 WHERE Email = ?
	-- AND Password = ?"
	 ;

	public function find($userId)
	{
		// Récupération de l'utilisateur
		return $this->queryOne(
			self::FIND_USER,
			[ $userId ]
		);
	}

	public function signUp(array $values)
	{
		// var_dump($values); die;
		// Création des données de l'utilisateur
		return $this->executeSql(
			self::CREATE_CUSTOMER,
			$values
		);
	}

	/**
	 * [customerLogin description]
	 * @param  [string] $email    [vérifie la présence de l'e-mail unique de l'utilisateur]
	 * @param  [string] $password [description]
	 * @return [string]           [description]
	 */
	public function customerLogin($email, $password)
	{
				$user = $this->queryOne(
											self::LOGIN_CUSTOMER,
											[$email]
										);
				var_dump($this); die;
				if (is_array($user)) {
						if ($user['Password'] == $password) {
								return $user;
							} else {
								return false;
						}
						} else {
					return false;
					}
				// return $this->verifyPassword($password);
	}

	private function hashPassword($password)
	{
			// docu de crypt() : http://devdocs.io/php/function.crypt
			$salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);
			return crypt($password, $salt);
	}

	private function writeIntoDatabase(array $values)
	{
		$passwordHash = $this->password_hash($password);

	 	// Insertion de l'utilisateur dans la base de données.
	 	$database->executeSql($sql,
	 	[
			 $lastName,
			 $firstName,
			 $email,
			 $passwordHash,
			 $country,
			 $address,
			 $city,
			 $zipCode,
			 $phone
	 	]);
	}

	/**
	 * [verifyPassword description]
	 * @param  string $password       [description]
	 * @param  string $hashedPassword [description]
	 * @return bool                   [description]
	 */
	private function verifyPassword(string $password, string $hashedPassword) : bool
	{
        // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
		return crypt($password, $hashedPassword) == $hashedPassword;
	}

	/*
	public function customerLogin(string $email, string $password)
	{
				return $this->queryOne(
											self::LOGIN_CUSTOMER,
											[$email, $password]
										);
	}
	*/

	/*
	public function createLogin(array $result)
	{
		if ($db)->id == $this->id
		{
			return $this->executeSql(
				self::LOGIN_CUSTOMER,
				$result
		}
		if ($this->signUp())
			return
		);
	}
	*/

}



/*
class CustomerModel
{
	protected $FirstName;
  protected $Name;
  protected $Adress;
  protected $Phone;
  protected $Email;
  protected $Password;

  public function __construct() {

  }

  public function createClientAccount($elementTagName, $id) // on crée l'élément dans la mémoire et on la récupère pour affichage avec la fonction appendChild (plus bas)
  {
    $this->nodes[$id] = [ // on range dans $nodes l'id d'un tableau vide
        'tagName' => $elementTagName,
        'FirstName' => '',
        'Name' => [],
        'Adress' => [],
        'Phone' => [],
        'Email' => [],
        'Password' => []
    ];
    return $this;
  }

}
*/

?>
