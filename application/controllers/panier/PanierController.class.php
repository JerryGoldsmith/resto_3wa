<?php

class PanierController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $session = new UserSession();

        $panier1 = new PanierModel(new Database());

        return [
            "monPanier"=>$panier1->displayShoppingCart()
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}
