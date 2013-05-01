<?php
abstract class DevYiiActiveRecord extends CActiveRecord
{
	/** Tien hanh cap nhat create_user_id va update_user_id truoc khi luu */
	/* tao ham truoc khi luu beforeSave() */
	protected function beforeSave()
	{
		if(null !== Yii::app()->user)
		{
			$id=Yii::app()->user->id;
		} else 
		$id=1;
		// khi su kien tao moi ban ghi se luu lai id cua user do vao 2 truong create_user_id,update_user_id
		if($this->isNewRecord)
		$this->create_user_id=$id;
		$this->update_user_id=$id;
		// tra ve ham cha
		return parent::beforeSave();
		
	}
	/* Kich hoat timestamp behavior component de cap nhat thoi gian */
	public function behaviors()
	{
		return array(
			'CTimestampBehavior'=>array(
				'class'=>'zii.behaviors.CTimestampBehavior',
				'createAttribute'=>'create_time',
				'updateAttribute'=>'update_time',
				'setUpdateOnCreate'=>true,
			),
		);
	}
	
}
?>