<?php


class CustomerController
{
	/**
	 * [httpGetMethod description]
	 * @param Http $http [description]
	 * @return [type] [description]
	 */

	public function httpGetMethod(Http $http)
	{

		return [ '_form' => new AdminCustomerForm() ];
	}

	/**
	 * [httpPostMethod description]
	 * @param Http  $http       [description]
	 * @param array $formFields [description]
	 * @return [type] [description]
	 */
	public function httpPostMethod(Http $http, array $formFields)
	{
		try
		{
			// Mode administrateur
      	$userAccountModel = new UserAccountModel();
        $userAccountModel->create
			(
				$formFields['email'],
				$formFields['password']
			);

            // Redirection vers la page d'administration
            $http->redirectTo('/employees');
		}
		catch(DomainException $exception)
		{
            // Réaffichage du formulaire avec un message d'erreur
            $form = new AdminCustomerForm();
            $form->bind($formFields);
            $form->setErrorMessage($exception->getMessage());

			return [ '_form' => $form ];
		}
	}
}
