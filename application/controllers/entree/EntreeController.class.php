<?php
/**
 * [BookingController description]
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

	}
}
