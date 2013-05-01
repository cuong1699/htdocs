<?php

/**
 * This is the model class for table "tbl_project".
 *
 * The followings are the available columns in table 'tbl_project':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class Project extends DevYiiActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	 public $username;
	public $role;
	public $project;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_project';
	}
	/* Tra ve mang roles hop le voi user duoc thay the khi them moi project */
	public static function getUserRoleOptions()
	{
		return CHtml::listData(Yii::app()->authManager->getRoles(),'name','name');
	
	}
	
	/* Quyet dinh co hay khong mot user duoc la mot thanh phan trong project */
	public function isUserInRole($role)
	{
		$sql = "SELECT role FROM tbl_project_user_role WHERE project_id=:projectId AND user_id=:userId AND role=:role";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", Yii::app()->user->getId(), PDO::PARAM_INT);
		$command->bindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute()==1 ? true : false;
	}
	//dang ky user sang table tbl_project_user_assignment
	public function assignUser($userId,$role)
	{
		$command=Yii::app()->db->createCommand();
		$command->insert('tbl_project_user_role',array('role'=>$role,'user_id'=>$userId,'project_id'=>$this->id));
	}
	//xoa di user trong tbl_project_user_assignment
	public function removeUserFromRole($role, $userId)
	{
		$sql = "DELETE FROM tbl_project_user_role WHERE project_id=:projectId AND user_id=:userId AND role=:role";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", $userId, PDO::PARAM_INT);
		$command->bindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute();
	}
	public function allowCurrentUser($role)
	{
		$sql="select * from tbl_project_user_role where project_id=:projectId and user_id=:userId and role=:role";
		$command=Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId",$this->id,PDO::PARAM_INT);
		$command->bindValue(":userId",Yii::app()->user->getId(),PDO::PARAM_INT);
		$command->bindValue(":role",$role,PDO::PARAM_STR);
		return $command->execute()==1;
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'issues'=>array(self::HAS_MANY,'Issue','project_id'),
			'users'=>array(self::MANY_MANY,'User','tbl_project_user_role(project_id,user_id)'),
		);
	}
	public function associateUserToRole($role, $userId)
	{
	$sql = "INSERT INTO tbl_project_user_role (project_id, user_id, role) VALUES (:projectId, :userId, :role)";
	$command = Yii::app()->db->createCommand($sql);
	$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
	$command->bindValue(":userId", $userId, PDO::PARAM_INT);
	$command->bindValue(":role", $role, PDO::PARAM_STR);
	return $command->execute;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function associateUserToProject($user)
	{
	$sql = "INSERT INTO tbl_project_user_assignment (project_id, user_id) VALUES (:projectId, :userId)";
	$command = Yii::app()->db->createCommand($sql);
	$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
	$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
	return $command->execute();
	}
	/*
	* Determines whether or not a user is already part of a project
	*/
	public function verify($attribute,$params)
	{
		if(!$this->hasErrors()) // we only want to authenticate when no other input errors are present
		{
		$user = User::model()->findByAttributes(array('username'=>$this->username));
		if($this->project->isUserInProject($user))
		{
		$this->addError('username','This user has already been added to the project.');
		}
		else
		{
		$this->project->associateUserToProject($user);
		$this->project->associateUserToRole($this->role, $user->id);
		$auth = Yii::app()->authManager;
		$bizRule='return isset($params["project"]) && $params["project"]->isUserInRole("'.$this->role.'");';
		$auth->assign($this->role,$user->id, $bizRule);
		}
		}
	}
	public function isUserInProject($user)
	{
		$sql = "SELECT user_id FROM tbl_project_user_assignment WHERE project_id=:projectId AND user_id=:userId";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
		return $command->execute()==1 ? true : false;
	}
	
	
	public function getUserOptions()
	{
		$usersArray=CHtml::listData($this->users,'id','username');
		return $usersArray;
	}
}