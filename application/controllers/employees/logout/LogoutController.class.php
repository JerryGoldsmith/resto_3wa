<?php

/**
 * [LogoutController description]
 */
class LogoutController
{
	/**
	 * [httpGetMethod description]
	 * @param  Http   $http [description]
	 * @return [type]       [description]
	 */
	public function httpGetMethod(Http $http)
	{
		$session = new UserSession;

		// Destruction de la session de l'utilisateur.
		$userSession = new UserSession();
		$userSession->destroy();

 		// Redirection vers la page d'accueil.
		$http->redirectTo('/');
	}

	public function httpPostMethod(Http $http, array $formFields)
	{

	}
}
