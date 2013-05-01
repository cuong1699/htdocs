<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_roles;
	private $_username;
	public function authenticate()
	{
		$user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		if($user===null)
		$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else 
		{
			$this->_id=$user->id;
			$this->_username=$user->username;
			$this->_roles=$user->roles;
			$this->setState('roles', $user->roles);
			$this->setState('lastLogin',date('d-m-Y H:i:s',time($user->last_login_time)));
			$user->saveAttributes(array('last_login_time'=>date("d-m-Y H:i:s",time()),));
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
		
	}
	public function getRoles()
	{
		return $this->_roles();
	}
	public function getId()
	{
		return $this->_id;
	}
}