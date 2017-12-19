<?php

class ClearpanierController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $session = new UserSession();
    	$clearpanier = new PanierModel(new Database());
	       $clearpanier->clearShoppingCart();
           $http->redirectTo("/");
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        
    }
}
