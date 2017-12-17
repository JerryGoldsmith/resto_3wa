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

    	$panier = new PanierModel(new Database());
		$test = $panier->addToShoppingCart($formFields);
		var_dump($test);
		
		$allMeal = new MealModel(new Database());

    	return [
			"all"=>$allMeal->findAllMeal()
		];

    }
}
