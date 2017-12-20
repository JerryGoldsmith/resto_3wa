<?php

class EmployeesModel extends Database
{
  const FIND_EMPLOYEES = "SELECT
		Id,
		LastName,
		FirstName,
		Email,
		Password,
		NumberEmploye
	FROM Employees
	WHERE Id = ?";

	const CREATE_EMPLOYEES =
	"INSERT INTO `Employees`(`FirstName`, `LastName`, `Email`, `Password`, `NumberEmploye`)
	 VALUES (?,?,?,?,?,?)";

	const LOGIN_EMPLOYEES =
 	"SELECT *
 	 FROM Employees
	 WHERE Email = ?
	 AND Password = ?";

   const FIND_ALL_MEAL = "SELECT
     Id,
     Name,
     Description,
     Photo,
     BuyPrice,
     SalePrice,
     QuantityInStock
     FROM Meal
     WHERE Id = ?";

   const CREATE_ADMIN_MEAL =
  	"INSERT INTO `Meal`(`name`, `description`, `photo`, `buyPrice`, `salePrice`, `QuantityInStock`)
  	 VALUES (?,?,?,?,?,?,?)";

	public function find($userId)
	{
		// Récupération de l'employé
		return $this->queryOne(
			self::FIND_EMPLOYEES,
			[ $userId ]
		);
	}

	public function signUp(array $values)
	{
		//var_dump($values); die;
		// Création des données de l'employé
		return $this->executeSql(
			self::CREATE_EMPLOYEES,
			$values
			);
	}

	public function employeesLogin($email, $password)
	{
				return $this->queryOne(
											self::LOGIN_EMPLOYEES,
											[$email, $password]
										);
	}

  /**
   * [find description]
   * @param  [type] $userId [description]
   * @param  [type] $mealId [description]
   * @return [type]         [description]
   */
   public function listAll()
   {
       $database = new Database();

       $sql = 'SELECT *
               FROM `Meal`
               WHERE `id`
               BETWEEN "1"
               AND "8"'
               ;

       // Récupération de tous les produits alimentaires.
       return $database->query($sql);
   }

   /**
    * [find description]
    * @param  [type] $userId [description]
    * @param  [type] $mealId [description]
    * @return [type]         [description]
    */
    public function moveUploadedFile()
    {
        $database = new Database();

        $sql = 'SELECT `Photo`
                FROM `Meal`
                WHERE `?`'
                ;

        // Récupération de tous les produits alimentaires.
        return $database->query($sql, $_FILES[$name]['name']);
    }
}

?>
