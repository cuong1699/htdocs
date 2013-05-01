﻿<?php
Yii::import('application.vendors.*');
require_once('Zend/Feed.php');
require_once('Zend/Feed/Rss.php');
require_once('Zend/Mail.php');
require_once('Zend/Mail/Transport/Smtp.php');
require_once('Zend/Mail/Protocol/Smtp/Auth/Login.php');
require_once('Zend/Pdf.php');
require_once('Zend/Pdf/Page.php');
require_once('Zend/Pdf/Font.php');
class CommentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','feed','mail','pdf'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionMail()
	{
		$content='i love you';
		$addto='mylove@gmail.com';
		$subject='Dear love!';
		$emailfrom='longt8x@gmail.com';
		$tr = new Zend_Mail_Transport_Smtp ('smtp.gmail.com', array('auth' => 'login', 'username' => 'longt8x@gmail.com', 'password' => 'password user', 'ssl' => 'ssl', 'port' => 465 ));
		 Zend_Mail::setDefaultTransport($tr);
         $mail = new Zend_Mail('UTF-8');
         $mail->setBodyHtml(($content));
         $mail->addTo($addto);
         $mail->setSubject($subject);
         $mail->setFrom ($emailfrom);
         $mail->send ();
	}
	public function actionPdf()
	{
		$pdf = new Zend_Pdf();
		$page = new Zend_Pdf_Page(Zend_Pdf_Page::SIZE_A4);
      
      // define font resource
        //$font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER);
		$font = Zend_Pdf_Font::fontWithPath('font/tahoma.ttf');
        // thiet lap font , kich co font 
        // viet noi dung pdf
        $page->setFont($font,15)           
             ->drawText('Anh yêu em',72, 720)
             ->drawText('Because I love You', 72, 620);
  
        $pdf->pages[] = $page;
       
        // luu file vao folder pdf
        $pdf->save('pdf/miss.pdf');   
	}
	public function actionCreate()
	{
		$model=new Comment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comment']))
		{
			$model->attributes=$_POST['Comment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comment']))
		{
			$model->attributes=$_POST['Comment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    /**--Tao feed cho website --- */
	public function actionFeed()
	{
		if(isset($_GET['pid']))
		{
			$comments=Comment::model()->with(array('issue'=>array('condition'=>'project_id=:projectId','params'=>array(':projectId'=>intval($_GET['pid'])),)))->recent(20)->findAll();
		} else 
		$comments=Comment::model()->recent(20)->findAll();
		
		$entries=array();
		foreach($comments as $comment)
		{
			$entries[]=array(
					'title'=>$comment->issue->name,
					'link'=>CHtml::encode($this->createAbsoluteUrl('issue/view',array('id'=>$comment->issue->id))),
					'description'=>$comment->createUser->username.'says: <br/>'.$comment->content,
					'lastUpdate'=>strtotime($comment->create_time),
					'author'=>CHtml::encode($comment->createUser->username),
					
			);
			$feed=Zend_Feed::importArray(array(
										'title'=>'Development Yii Project Comment Feed',
										'link'=>$this->createAbsoluteUrl(''),
										'charset'=>'UTF-8',
										'entries'=>$entries,
										),'rss');
			$feed->send();
		}	
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Comment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comment']))
			$model->attributes=$_GET['Comment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Comment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Comment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Comment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
