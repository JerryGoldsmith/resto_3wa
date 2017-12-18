<?php

class HomeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$allMeal = new MealModel(new Database());

    	return [
			"all"=>$allMeal->findAllMeal()
		];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $session = new UserSession();
    	$panier = new PanierModel(new Database());
		$panier->addToShoppingCart($formFields);


		$allMeal = new MealModel(new Database());
        $panier->saveShoppingCart();

    	return [
			"all"=>$allMeal->findAllMeal()
		];
    }
}
