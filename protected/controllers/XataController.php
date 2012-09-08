<?php

class XataController extends Controller
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
				'actions'=>array('index','view','dynamiccities'),
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
	public function actionCreate()
	{
		$model=new Xata;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Xata']))
		{
		  $data=$_POST['Xata'];  

		  //$data['Xata']['owner']=1;//Yii::app()->user->id;
		  if($cntry_id=Country::check($data['country_caption'],$data['country_short'])){
        if($city_id=City::check($data['city_caption'],$cntry_id)){
          unset($data['country_short']);
          unset($data['country_caption']);
          unset($data['city_caption']);
          
          $type_id=0;  
          for($i=2;$i>=0;$i--)  
            if(isset($_POST['type_id_lvl'.$i]))
              if($type_id= (int)$_POST['type_id_lvl'.$i])
                break;
          if($type_id)$data['type_id']=$type_id;
          
          $data['owner']=Yii::app()->user->id; // Saving owner as current user          
          $data['city_id']=$city_id;
          
    			$model->attributes=$data;
        	if($model->save()){
            $userXata=new UserXata();
            $userXata->attributes=array(
                'uid'=>Yii::app()->user->id,
                'xid'=>$model->getPrimaryKey(),
                'rights'=>hexdec('FFFFFF'),
                'public'=>10//hexdec('FFFFFF')
            );  
            if($userXata->save())  
                $this->redirect(array('view','id'=>$model->id));
          }	
        }// if city is setted
      }// if country is setted
    }// if there is POST
      
      

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

		if(isset($_POST['Xata']))
		{
			$model->attributes=$_POST['Xata'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Xata',
		        array('criteria'=>array('with'=>'city')));
		//$dataProvider[]=$this->with('city')->findByPk($this->city_id,'',array('caption'));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Xata('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Xata']))
			$model->attributes=$_GET['Xata'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Xata::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='xata-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	//-------- USER ADDDS FUNCTINS -----------------------------
	/*
	 * We add it to get list of the selected country cityes
	 * */
  public function actionDynamiccities()
  {
    
    $data=City::model()->findAll('country_id=:parent_id', 
                  array(':parent_id'=>(int) $_POST['country_id']));
    
    $data=CHtml::listData($data,'id','caption');
    foreach($data as $value=>$name)
    {
        echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($name),true);
    }
    
  }
}
