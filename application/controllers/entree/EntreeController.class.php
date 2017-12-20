<?php
/**
 * EntreeController Controller du sous menu entrée
 */
class EntreeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
		$entree = new MealModel(new Database);
		return [
			"nosEntrees"=>$entree->findMealByType(["entrée"])
			];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $session = new UserSession();
    	$panier = new PanierModel(new Database());
        /*TODO remplacer le système d'ajout de produits au panier par une requete ajax.*/
    	$panier->addToShoppingCart( $formFields, $formFields['mealId']);
        $panier->saveShoppingCart();
		$allMeal = new MealModel(new Database());


    	return [
			"nosEntrees"=>$allMeal->findAllMeal()
		];
	}
}
