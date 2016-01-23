<?php
/**
 * Index controller
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

class Index extends Controller
{
    private $_appModel;

    public function __construct()
    {
        $logged = Session::get('loggedin');

        if (!$logged){
            Url::redirect('error');
        }

        //Call the parent construct
        parent::__construct();
        $this->_appModel = new \Models\app\App();
    }

    public function index()
    {
        $role = Session::get('fb_role');
        if ($role == 'user') {
            $this->front();
            //TODO     redirect to simple user page
        }
        else if ($role == 'admin') {
            $this->admin();
            //TODO     redirect to dashboard page
        }
        else {
            Url::redirect('error');
        }
    }

    public function front()
    {
        echo "FRONT";
    }

    public function admin()
    {
        echo "ADMIN";
    }
}
