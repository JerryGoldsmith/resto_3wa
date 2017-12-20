<?php
class PlatsController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
		$plat = new MealModel(new Database);
		return [
			"nosPlats"=>$plat->findMealByType(["plat"])
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
			"plats"=>$allMeal->findAllMeal()
		];
	}
}





 ?>
