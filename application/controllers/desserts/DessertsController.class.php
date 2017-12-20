<?php
	class DessertsController {
		public function httpGetMethod(Http $http, array $queryFields)
	    {
			$dessert = new MealModel(new Database);
			return [
				"nosDesserts"=>$dessert->findMealByType(["dessert"])
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
				"desserts"=>$allMeal->findAllMeal()
			];
		}
	}


 ?>
