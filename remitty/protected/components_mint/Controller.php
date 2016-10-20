<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * Use this for accesing post items please
     * for security and removing unwanted items from post
     * @var array 
     */
    public $_form_post = array();

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
//    public function init(){
//        // register class paths for extension captcha extended
//        Yii::$classMap = array_merge( Yii::$classMap, array(
//            'CaptchaExtendedAction' => Yii::getPathOfAlias('ext.captchaExtended').DIRECTORY_SEPARATOR.'CaptchaExtendedAction.php',
//            'CaptchaExtendedValidator' => Yii::getPathOfAlias('ext.captchaExtended').DIRECTORY_SEPARATOR.'CaptchaExtendedValidator.php'
//        ));
//    }
    protected function beforeAction($action) {


        //hack to redirect all users without a timezone to update their profile
        /* $user = User::getLoggedInUser();
          if ($user != null) {
          if ($user->time_zone == "" || $user->time_zone == null || !key_exists($user->time_zone, Timezone::getAllTimeZones())) {
          $controller = Yii::app()->controller->id;
          $action = Yii::app()->controller->action->id;
          if ($controller!="user" && $action!="update") {
          //redirect them to profile page
          set_flash_message("info", "You need to update your timezone before continuing using application");
          $this->redirect(array("/user/update"));

          }
          }
          } */

// Module

        if (User::ifUserHasAccess(User::getLoggedInUser(), "adminAccess")) {


            if (isset($this->module)) {
                if ($this->module->getName() != "admin") {


                    if (User::ifUserHasAccess(User::getLoggedInUser(), "superadmin"))
                         $this->redirect(array("/admin"));
                    else {
                        $this->redirect(array("/admin/transaction/search"));
                    }
                }
            } else {
                if($action->id == "download" ){
                    //do nothing
                    
                }
                else if (User::ifUserHasAccess(User::getLoggedInUser(), "superadmin"))
                   $this->redirect(array("/admin"));
                else {
                    $this->redirect(array("/admin/transaction/search"));
                }
            }
        }



        parent::beforeAction($action);
        return true;
    }

}