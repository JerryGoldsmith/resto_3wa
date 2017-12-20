<?php

/**
 * [LoginController description]
 */
class LoginController
{
	/**
	 * [httpGetMethod description]
	 * @param  Http   $http       [description]
	 * @param  array  $formFields [description]
	 * @return [type]             [description]
	 */
	public function httpGetMethod(Http $http, array $formFields)
	{
		$session = new UserSession;
		 return [
			'_form' => new CustomerForm(),
			'userSession' => $session
		];
	}

	/**
	 * [httpPostMethod description]
	 * @param  Http   $http       [description]
	 * @param  array  $formFields [description]
	 * @return [type]             [description]
	 */
	public function httpPostMethod(Http $http, array $formFields)
	{
		try
 		{

 		$userModel = new EmployeesModel();

 		$user = $userModel->employeesLogin
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
										$user['Email'],
										$user['NumberEmploye'] // spécificité du salarié
	 		);

	 		// Redirection vers la page d'accueil.
		 $http->redirectTo('/admin');
		 //return $userSession;

	 } else {
		 $http->redirectTo('/employees/login');
	 }


		}
		catch(DomainException $exception)
		{
		 	$form = new EmployeesForm(new Database());
		 	$form->bind($formFields);
		 	$form->setErrorMessage($exception->getMessage());

 		return [ '_form' => $form ];
		}

	}
}
