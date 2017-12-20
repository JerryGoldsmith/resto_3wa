<?php


class UserSession
{
<<<<<<< HEAD
=======
	/**
	 * [__construct description]
	 */
>>>>>>> 62bee852d52c78c9d8fb43bbe21d0345f4a76612
	public function __construct()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
            // Démarrage du module PHP de gestion des sessions.
			session_start();
		}
	}

<<<<<<< HEAD
=======
		/**
		 * [create description]
		 * @param  [type] $userId    [description]
		 * @param  [type] $firstName [description]
		 * @param  [type] $lastName  [description]
		 * @param  [type] $email     [description]
		 * @return [type]            [description]
		 */
>>>>>>> 62bee852d52c78c9d8fb43bbe21d0345f4a76612
    public function create($userId, $firstName, $lastName, $email)
    {
        // Construction de la session utilisateur.
        $_SESSION['user'] =
        [
            'UserId'    => $userId,
            'FirstName' => $firstName,
            'LastName'  => $lastName,
            'Email'     => $email
        ];
    }

    public function destroy()
    {
        // Destruction de l'ensemble de la session.
        $_SESSION = array();
        session_destroy();
    }

    public function getEmail()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['Email'];
    }

    public function getFirstName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['FirstName'];
    }

    public function getFullName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['FirstName'].' '.$_SESSION['user']['LastName'];
    }

    public function getLastName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['LastName'];
    }

    public function getUserId()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['UserId'];
    }

	public function isAuthenticated()
	{
		if(array_key_exists('user', $_SESSION) == true)
		{
			if(empty($_SESSION['user']) == false)
			{
				return true;
			}
		}

		return false;
	}
}
