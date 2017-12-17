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

	}
}





 ?>
