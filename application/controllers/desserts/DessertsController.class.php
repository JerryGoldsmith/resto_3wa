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

		}
	}


 ?>
