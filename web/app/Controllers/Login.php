<?php
/**
 * Login controller
 *
 * @author Youness Moumou - youness.mou@gmail.com
 * @version 0.1
 * @date 01/01/2016
 */

namespace Controllers;

use Core\Controller,
    Core\View,
    Helpers\Session,
    Helpers\Url,
    Helpers\Facebook;

class Login extends Controller
{
    private $_appModel;

    public function __construct()
    {
        $logged = Session::get('loggedin');

        if ($logged){
            Url::redirect('');
        }

        // Call the parent construct
        parent::__construct();
        $this->_appModel = new \Models\app\App();
    }

    /**
     * verify if app exist in database
     */
    public function index()
    {
        $app_id = $_GET['id'];
        $app_info = $this->_appModel->appExist($app_id);
        
        if ($app_info) {
            Session::set('app_info', $app_info);
            $this->userLogin($app_info);
        }
        else {
            Url::redirect('error');
        }
    }

    /**
     * User login
     */
    public function userLogin($app_info)
    {
        $data['id'] = $app_info->app_id;
        $data['version'] = $app_info->app_version;
        $data['dir'] = DIR;
        View::render('login', $data);
    }

    public function jsRedirect()
    {
        $app_info = Session::get('app_info');

        if (!$app_info) {
            Url::redirect('error');
        }

        $fb = new \Facebook\Facebook([
            'app_id' => $app_info->app_id,
            'app_secret' => $app_info->app_secret_id,
            'default_graph_version' => $app_info->app_version,
        ]);

        $js_helper =  Facebook::getTokenFromJsHelper($fb);
        $is_admin = $this->isAdmin($js_helper['user_id'], $fb, $app_info->app_id, $app_info->app_token);
        $role = ($is_admin)?'admin':'user';

        $this->setSession($js_helper['accesstoken'], $js_helper['user_id'], $role);

        Url::redirect('');
    }

    public function setSession($token, $u_id, $role)
    {
        Session::set('loggedin', true);
        Session::set('fb_token', $token);
        Session::set('fb_user_id', $u_id); 
        Session::set('fb_role', $role);
    }

    public function isAdmin($user_id, $fb, $app_id, $app_token)
    {
        // !! app token NOT user token !!
        $response = $fb->get($app_id.'/roles', $app_token);
        $data = $response->getDecodedBody();
        $roles = $data['data'];

        foreach ($roles as $role) {
            //if user id exist
            if ($role['user'] == $user_id) {
                //if user is admin
                if ($role['role'] == 'administrators') {
                    return true;
                }
            }
        }
    }
}