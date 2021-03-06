<?php

class PanierController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $session = new UserSession();
        $panier1 = new PanierModel(new Database());
        var_dump($panier1); 

        return [
            "monPanier"=>$panier1->displayShoppingCart(),
            "montantTotal"=>$panier1->totalHt(),
            "tva"=>$panier1->tva(),
            "ttc"=>$panier1->ttc()
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {


        $session = new UserSession();

        $panier1 = new PanierModel(new Database());
        $panier1->deleteOneProduct($formFields['mealId']);

        return [
            "monPanier"=>$panier1->displayShoppingCart(),
            "montantTotal"=>$panier1->totalHt(),
            "tva"=>$panier1->tva(),
            "ttc"=>$panier1->ttc()
        ];
    }
}
