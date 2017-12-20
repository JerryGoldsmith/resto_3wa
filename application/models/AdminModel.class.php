<?php

class AdminModel extends Database
{

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


}

?>
