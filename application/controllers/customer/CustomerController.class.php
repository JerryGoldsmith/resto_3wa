<?php

class CustomerController
{
	   public function httpGetMethod()
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

			$userModel->signUp
			(
				[
					$formFields['firstName'],
          $formFields['lastName'],
				  $formFields['email'],
				  $formFields['password'],
				  $formFields['address'],
				  $formFields['city'],
					$formFields['country'],
					$formFields['zipCode'],
				  $formFields['phone']
      ]
			);

          $http->redirectTo('/');
		}
		catch(DomainException $exception)
		{
          $form = new CustomerForm(new Database());
          $form->bind($formFields);
          $form->setErrorMessage($exception->getMessage());

			return [ '_form' => $form ];
		}
	}
}

?>
