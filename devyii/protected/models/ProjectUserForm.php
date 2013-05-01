<?php

/**

* ProjectUserForm class.

* ProjectUserForm is the data structure for keeping

* the form data related to adding an existing user to a project. It is used by the 'Ad-duser' action of 'ProjectController'.

*/

class ProjectUserForm extends CFormModel

{
	public $username;
	public $role;
	public $project;
	private $_user;
/*

* Declares the validation rules.

* The rules state that username and password are required,

* and password needs to be authenticated using the verify() method
*/

	public function rules()

	{

		return array(
		array('username, role', 'required'),
		array('username', 'exist', 'className'=>'User'),
		array('username', 'verify'),
		);

	}

/**

* Authenticates the existence of the user in the system.

* If valid, it will also make the association between the user, role and project

* This is the 'verify' validator as declared in rules().

*/

	public function verify($attribute,$params)

	{

		if(!$this->hasErrors())

		{

			$user = User::model()->findByAttributes(array('username'=>$this->username));

			if($this->project->isUserInProject($user))

			{

				$this->addError('username','This user has already been added to the project.');

			}

			else

			{

			$this->_user = $user;

			}

		}

	}

	public function assign()
	{

		if($this->_user instanceof User)
		{
		$this->project->assignUser($this->_user->id, $this->role);
		$auth = Yii::app()->authManager;
		$bizRule='return isset($params["project"]) && $params["project"]->allowCurrentUser("'.$this->role.'");';
		$auth->assign($this->role,$this->_user->id, $bizRule);
		
		return true;
		}
		else
		{
		$this->addError('username','Error when attempting to assign this user to the project.');
		return false;
		}
	}

/**

* Generates an array of usernames to use for the autocomplete

*/

	public function createUsernameList()
	{
		$sql = "SELECT username FROM tbl_user";
		
		$command = Yii::app()->db->createCommand($sql);
		
		$rows = $command->queryAll();
		$usernames = array();
		foreach($rows as $row)
		{
		$usernames[]=$row['username'];
		}
		return $usernames;
		}
	}