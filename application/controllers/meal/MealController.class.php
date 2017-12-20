<?php


class MealController
{
  /**
   * [httpGetMethod Affichage des produits]
   * @param Http  $http        [get]
   * @param array $queryFields [si la clé existe et est trouvée]
   * @return [type] [Encodage en Json]
   */
  public function httpGetMethod(Http $http, array $queryFields)
	{
        if(food_key('id', $queryFields)) // true par défaut (pas la peine de mettre == true)
        {
            if(food_id($queryFields['id'])) // true par défaut (pas la peine de mettre == true)
            {
                $mealModel = new MealModel();
				        $meal      = $mealModel->find($queryFields['id']); //

				$http->sendJsonResponse($meal); // stockage de données textuelles (utilisation de sendJsonResponse dans http.class.php)
            }
        }

        $http->redirectTo('/'); // redirect en cas d'erreur
	}
}
