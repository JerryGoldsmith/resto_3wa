<?php

class EmployeesController
{
		/**
		 * [httpGetMethod description]
		 * @return [type] [description]
		 */
		public function httpGetMethod()
	    {
				$session = new UserSession;
		     return [
					'_form' => new EmployeesForm(),
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

			$userModel->signUp
			(
				[
					$formFields['firstName'],
          $formFields['lastName'],
				  $formFields['email'],
				  $formFields['password'],
				  $formFields['numberEmploye']
      ]
			);

          $http->redirectTo('/admin');
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

?>
