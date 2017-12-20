<?php
/*TODO penser à enregistrer les données de livraison dans la base de données*/
class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $session = new UserSession();
        $order = new PanierModel(new database());

// //var_dump($_SESSION['panier']); die;
//         $lastId = $order->order([
//             $_SESSION['panier']['orderQuantity'],
//             $_SESSION['panier']['mealSalePrice'],
//             $_SESSION['panier']['orderQuantity']*$_SESSION['panier']['mealSalePrice'], $_SESSION['panier']['orderQuantity']*$_SESSION['panier']['mealSalePrice']*0.2,
//             $_SESSION['panier']['orderQuantity']*$_SESSION['panier']['mealSalePrice']*1.2,
//             "en cours",
//             $_SESSION['panier']['mealId']
//         ]);

        return [
            "test"=>"Votre commande a été bien enregistré. Merci de votre visite et à bientôt !"
        ];
        // $panier1 = new PanierModel(new Database());

        // return [
        //     "monPanier"=>$panier1->displayShoppingCart(),
        //     "montantTotal"=>$panier1->totalHt(),
        //     "tva"=>$panier1->tva(),
        //     "ttc"=>$panier1->ttc()
        // ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {


        $session = new UserSession();

        // $panier1 = new PanierModel(new Database());
        // $panier1->deleteOneProduct($formFields['mealId']);

        // return [
        //     "monPanier"=>$panier1->displayShoppingCart(),
        //     "montantTotal"=>$panier1->totalHt(),
        //     "tva"=>$panier1->tva(),
        //     "ttc"=>$panier1->ttc()
        // ];
    }
}
