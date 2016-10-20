<?php

class UserController extends GxController {
	public $loginForm = null;
	
	public $caseSensitiveUsers = true;
	
	public $returnAdminUrl = null;
	
	// LoginType :
	
	const LOGIN_BY_USERNAME		= 1;
	const LOGIN_BY_EMAIL		= 2;
	const LOGIN_BY_LDAP			= 32;
	
	// Allow login only by username by default.
	
	
	
	public $loginType = 2;

	public function filters() {
		return array(
				'accessControl', 
				);
	}

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('create','recover','login' , 'download', 'thumbnail' /**/),
					'users'=>array('*'),
					),
				array('allow', 
					'actions'=>array('index','view','update', 'search','logout'),
					'users'=>array('@'),
					),
				array('allow', 
					'actions'=>array('admin','delete'),
					'expression'=>'Yii::app()->user->isAdmin',
					),
				array('deny', 
					'users'=>array('*'),
					),
				);
	}

	public function isAllowed($model) 
	{
		return $model->isAllowed();
	}
	public function actionView($id) 
	{
		$model = $this->loadModel($id, 'User');
	
		//if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

		//$this->processActions($model);	
		$this->updateMenuItems($model);
		$this->render('view', array(
			'model' => $model
		));
	}

	public function actionCreate() 
	{
		$model = new User;

		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			
			$_POST['User']['emirates_front'] = $_FILES['User']['name']['emirates_front'];
			$_POST['User']['emirates_back'] = $_FILES['User']['name']['emirates_back'];
			$model->state_id = User::STATUS_ACTIVE;
			//var_dump($_POST['User']['emirates_front'],$_POST['User']['emirates_back']);die;
			$model->setAttributes($_POST['User']);
		
					if ($model->save()) {
						$model->saveUploadedFile($model,'emirates_front');
						$model->saveUploadedFile($model,'emirates_back');
						if ( isset($_POST['User']['password']) && $model->setPassword($_POST['User']['password']))
						
						{
						
						if (Yii::app()->getRequest()->getIsAjaxRequest())
							Yii::app()->end();
						else
						{
							$email = $_POST['User']['email'];
							$user = User::model()->findByAttributes(array('email'=>$email));
							$user->register();
							$this->redirect(array(Yii::app()->homeUrl));
							Yii::app()->user->setFlash('success','<div class="alert alert-info sub_heading" id="submit_success">Thank you for registering with us. Please check your email for activation link.<i class="fa fa-times-circle" aria-hidden="true"></i></div>');
								
						}
						}
					}
			

			
		}
		$this->updateMenuItems($model);
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) 
	{
		$model = $this->loadModel($id, 'User');
		
		//if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
		
		$this->performAjaxValidation($model, 'user-form');

		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		$this->updateMenuItems($model);
		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) 
	{
		$model = $this->loadModel($id, 'User');
		
		//if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
	
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'User')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() 
	{
		$this->updateMenuItems();
		$dataProvider = new CActiveDataProvider('User');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	
	public function actionSearch()
	{
		$model = new Job('search');
		$model->unsetAttributes();
		$this->updateMenuItems($model);
	
		if (isset($_GET['User']))
		{
			$model->setAttributes($_GET['User']);
			$this->renderPartial('_list', array(
					'dataProvider' => $model->search(),
					'model' => $model,
			));
		}
			
		$this->renderPartial('_search', array(
				'model' => $model,
		));
	}
	public function actionAdmin() 
	{
		$model = new User('search');
		$model->unsetAttributes();
		$this->updateMenuItems($model);
		
		if (isset($_GET['User']))
			$model->setAttributes($_GET['User']);

		$this->render('admin', array(
			'model' => $model,
		));
	}


public function actionLogin() {

		// If the user is already logged in send them to the users logged homepage



		$this->layout = 'column1';

		$this->loginForm = new LoginForm();

		$success = false;

		$action = 'login';

		$login_type = null;

		if (isset($_POST['LoginForm'])) {

			$this->loginForm->attributes = $_POST['LoginForm'];

			$this->performAjaxValidation($this->loginForm, 'login-form');

			// validate user input for the rest of login methods

			if ($this->loginForm->validate())

			{

				$emal1 = $_POST['LoginForm']['username'];

				if ($this->loginType & self::LOGIN_BY_USERNAME) {

					$success = $this->loginByUsername();

					if ($success)

						$login_type = 'username';

				}

				if ($this->loginType & self::LOGIN_BY_EMAIL && !$success) {

					if($this->loginForm->password){

						$success = $this->loginByEmail();

					}else{

						$success = $this->loginByEmailPhone();

					}

					if ($success)

						$login_type = 'email';

				}

				if($this->loginType & self::LOGIN_BY_LDAP && !$success) {

					$success = $this->loginByLdap();

					$action = 'ldap_login';

					$login_type = 'ldap';

				}

			}



			if ($success instanceof User) {
			

				if ($login_type) {

					$cookie = new CHttpCookie('login_type', serialize($login_type));

					$cookie->expire = time() + (3600*24*30);

					Yii::app()->request->cookies['login_type'] = $cookie;

				}


				$this->redirect(array('view','id'=>Yii::app()->user->id));
				

			}

			else

			{

				if(!$this->loginForm->hasErrors())
				{
					$this->loginForm->addError('username','Login is not possible with the given credentials');
					Yii::app()->user->setFlash('login_error_msg','<div class="alert alert-info sub_heading" id="submit_successss">Login is not possible with the given credentials.<i class="fa fa-times-circle" aria-hidden="true"></i></div>');
					
				}

			}

		}



		/*$this->render('login', array(

				'model' => $this->loginForm,

				'loginType' => $this->loginType,

		) );*/
		//$this->redirect(array());
		$this->render('/site/index');

	}
	public function loginByEmail(){
		if($this->caseSensitiveUsers)
			$user = User::model()->find('email = :email', array(
					':email' => $this->loginForm->username));
			else
				$user = User::model()->find('upper(email) = :email', array(
						':email' => strtoupper($this->loginForm->username)));
				if($user)
				{
					return $this->authenticate($user);
				}
	
				else
					return null;
	
	}
	public function authenticate($user,$flag=null) {
		if($flag)
			$identity = new UserIdentity($user->email, $this->loginForm->contact_no);
		else
			$identity = new UserIdentity($user->email, $this->loginForm->password);
		$identity->authenticate($this->loginType);
		switch($identity->errorCode) {
			case UserIdentity::ERROR_NONE:
				$duration = $this->loginForm->rememberMe ? 3600*24*30 : 0; // 30 days
				Yii::app()->user->login($identity,$duration);
				return $user;
				break;
			case UserIdentity::ERROR_EMAIL_INVALID:
				$this->loginForm->addError("password",Yii::t('app','Username or Password is incorrect'));
				break;
			case UserIdentity::ERROR_STATUS_INACTIVE:
				$this->loginForm->addError("status",Yii::t('app','This account is not activated.'));
				break;
			case UserIdentity::ERROR_STATUS_BANNED:
				$this->loginForm->addError("status",Yii::t('app','This account is blocked.'));
				break;
			case UserIdentity::ERROR_STATUS_REMOVED:
				$this->loginForm->addError('status', Yii::t('app','Your account has been deleted.'));
				break;
	
			case UserIdentity::ERROR_PASSWORD_INVALID:
				Yii::log( Yii::t('app',
				'Password invalid for user {username} (Ip-Address: {ip})', array(
				'{ip}' => Yii::app()->request->getUserHostAddress(),
				'{username}' => $this->loginForm->username)), 'error');
	
				if(!$this->loginForm->hasErrors())
					$this->loginForm->addError("password",Yii::t('app','Username or Password is incorrect'));
				break;
				return false;
		}
	}
	public function actionRecover()
	{
		$model = new User;
		$this->layout = 'column2';
		$this->performAjaxValidation($model, 'user-form');
	
		if (isset($_POST['User']))
		{
			$email = $_POST['User']['email'];
			$user = User::model()->findByAttributes(array('email'=>$email));
			if ( $user )
			{
				$user->sendPassword();
				Yii::app()->user->setFlash('recover','Please check your email to reset your password.');
			}
			else
			{
				$model->addError('email', "Email is not registered");
				Yii::app()->user->setFlash('recover','Email is not registered.');
			}
		}
	
		$this->render('forgotpassword', array( 'model' => $model));
	}
	public function actionLogout() {
		// If the user is already logged out send them to returnLogoutUrl
		if (Yii::app()->user->isGuest)
			$this->redirect(Yii::app()->homeUrl);
	
		//let's delete the login_type cookie
		$cookie=Yii::app()->request->cookies['login_type'];
		if ($cookie) {
			$cookie->expire = time() - (3600*72);
			Yii::app()->request->cookies['login_type'] = $cookie;
		}
	
		if($user = User::model()->findByPk(Yii::app()->user->id)) {
			$username = $user->full_name;
	
			$user->last_visit_time  = date("Y-m-d H:i:s");//new CDbExpression('NOW()');
			$user->save();
			$user->logout();
	
			Yii::log(Yii::t('app','User {username} logged off', array('{username}' => $username)));
	
			Yii::app()->user->logout();
		}
		$this->redirect(Yii::app()->homeUrl);
	}
	/*protected function processActions($model = null)
	{
		parent::processActions($model);
		//$this->actions [] = array('label'=>Yii::t('app', 'Add Skill'), 'url'=>array('skill', 'id' => $model->id),'icon'=>'icon-plus icon-white');
	}*/
	protected function updateMenuItems($model = null)
	{	
		// create static model if model is null
		if ( $model == null ) $model = new User();
		
		switch( $this->action->id)
		{
			case 'update':	
				{
					$this->menu[] = array('label'=>Yii::t('app', 'View') , 'url'=>array('view','id'=>$model->id),'icon'=>'icon-plus icon-white');
				}
			case 'create':
				{
					$this->menu[] = array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin'), 'visible'=> Yii::app()->user->isAdmin,'icon'=>'icon-wrench icon-white');							
					$this->menu[] = array('label'=>Yii::t('app', 'List'), 'url'=>array('index'),'icon'=>'icon-th-list icon-white');	
				}
				break;				
			case 'index':
				{
					$this->menu[] = array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin'), 'visible'=> Yii::app()->user->isAdmin,'icon'=>'icon-wrench icon-white');							
					$this->menu[] = array('label'=>Yii::t('app', 'Create'), 'url'=>array('create'),'icon'=>'icon-plus icon-white');
				}
				break;
			case 'admin':
				{
					$this->menu[] = array('label'=>Yii::t('app', 'List'), 'url'=>array('index'),'icon'=>'icon-th-list icon-white');
					$this->menu[] = array('label'=>Yii::t('app', 'Create'), 'url'=>array('create'),'icon'=>'icon-plus icon-white');
				}
				break;				
			default:
			case 'view':
				{
					$this->menu[] = array('label'=>Yii::t('app', 'List'), 'url'=>array('index'),'icon'=>'icon-th-list icon-white');
					$this->menu[] = array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin'),'visible'=> Yii::app()->user->isAdmin,'icon'=>'icon-wrench icon-white');
					$this->menu[] = array('label'=>Yii::t('app', 'Delete'), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 
					'confirm'=>'Are you sure you want to delete this item?'),'visible'=> Yii::app()->user->isAdmin,'icon'=>'icon-remove icon-white');
					$this->menu[] = array('label'=>Yii::t('app', 'Create'), 'url'=>array('create'),'icon'=>'icon-plus icon-white');
					$this->menu[] = array('label'=>Yii::t('app', 'Update'), 'url'=>array('update', 'id' => $model->id),'visible'=> Yii::app()->user->isAdmin, 'icon'=>'icon-edit icon-white');				
				}
				break;
		}
		
		// Add SEO headers
		$this->processSEO($model);
		
		//merge actions with menu
		$this->actions = array_merge( $this->actions, $this->menu);
	}
}