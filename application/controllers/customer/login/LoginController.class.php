<?php

class LoginController
{
	public function httpGetMethod(Http $http, array $formFields)
	{
		$session = new UserSession;
		 return [
			'_form' => new CustomerForm(),
			'userSession' => $session
		];
	}

	public function httpPostMethod(Http $http, array $formFields)
	{
		try
 		{

 		$userModel = new CustomerModel();

 		$user = $userModel->customerLogin
 		(
		 	$formFields['email'],
		 	$formFields['password']
 		);

		// var_dump($user); die;

		if ($user){
			// Construction de la session utilisateur.
			$userSession = new UserSession();
	 		$userSession->create(
			 							$user['Id'],
			 							$user['FirstName'],
			 							$user['LastName'],
										$user['Email']
	 		);

	 		// Redirection vers la page d'accueil.
		 $http->redirectTo('/');
		 //return $userSession;

	 } else {
		 $http->redirectTo('/customer/login');
	 }


		}
		catch(DomainException $exception)
		{
		 	$form = new CustomerForm(new Database());
		 	$form->bind($formFields);
		 	$form->setErrorMessage($exception->getMessage());

 		return [ '_form' => $form ];
	}
			/*
			$customerLogin = new CustomerModel;
			$customerLogin->create(

			$values [];
			$values ['email'] = $formFields ['email'];
			$values ['password'] = $formFields ['password'];

			$customerLogin = new CustomerLogin(new Database());

		);
		*/
	}
}
