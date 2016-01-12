<?php
/**
 * Login controller
 *
 * @author Uness Mou - youness.mou@gmail.com
 * @version 0.1
 * @date Dec 5, 2015
 * @date updated Dec 5, 2015
 */

namespace Controllers;

use Core\View;
use Core\Controller;

class Login extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Login');
    }

    /**
     * 
     */
    public function index()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::renderTemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::renderTemplate('footer', $data);
    }

}
