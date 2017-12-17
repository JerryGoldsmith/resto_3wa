<?php
	class BoissonsController {
		public function httpGetMethod(Http $http, array $queryFields)
	    {
			$boisson = new MealModel(new Database);
			return [
				"nosBoissons"=>$boisson->findMealByType(["boisson"])
				];
	    }

	    public function httpPostMethod(Http $http, array $formFields)
	    {

		}
	}


 ?>
