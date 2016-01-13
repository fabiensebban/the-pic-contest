<?php
/**
 * Dashboard controller
 *
 * @author Uness Mou - youness.mou@gmail.com
 * @version 0.1
 * @date Dec 5, 2015
 * @date updated Dec 5, 2015
 */

namespace Controllers;

use Core\View;
use Core\Controller;
use Helpers\Url;

class Dashboard extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Dashboard');
    }

    /**
     * 
     */
    public function index()
    {
        //Is user admin ?
        if(true)
        {
            $data['title'] = $this->language->get('page_title');
            $data['logout'] = $this->language->get('logout');
            //$data['welcome_message'] = $this->language->get('welcome_message');

            View::renderTemplate('backoffice/header', $data);
            View::renderTemplate('backoffice/main_header', $data);
            View::render('dashboard/dashboard', $data);
            View::renderTemplate('backoffice/footer');
        }

        else 
        {
            Url::redirect('index');
        }
    }

}
