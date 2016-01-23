<?php
/**
 * Facebook helper
 *
 * @author Youness Moumou - youness.mou@gmail.com
 * @version 0.1
 * @date 01/01/2016
 */

namespace Helpers;

/**
 * Some Facebook helpers functions
 */
class Facebook
{

    /**
     * Obtaining an access token from all
     *
     * @param object $fb
     * @return array(token, isAdmin, fbCxt) or false
     */
    public static function getAccessToken($fb)
    {
        $pageTabToken = static::getTokenFromPageTab($fb);
        $canvasToken = static::getTokenFromCanvas($fb);
        $redirectToken = static::getTokenFromRedirect($fb);

        if ($pageTabToken) {
            return $pageTabToken;
        }
        elseif ($canvasToken) {
            return $canvasToken;
        }
        elseif ($redirectToken) {
            return $redirectToken;
        }
        else {
            return false;
        }
    }

    /**
     * Obtaining an access token from a Facebook Canvas context
     *
     * @param object $fb
     * @return fb access token or false
     */
    public static function getTokenFromCanvas($fb)
    {
        $helper = $fb->getCanvasHelper();

        try {
          $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        if (isset($accessToken)) {

            return array('accesstoken' => $accessToken->getValue(), 
                         'cxt' => 'canvas', 
                         'user_id' => $helper->getUserId(), 
                         'is_admin' => static::isAdmin($helper->getUserId()));
        }
        else {
            return false;
        }
    }

    /**
     * Obtaining an access token from a Facebook Page Tab
     *
     * @param object $fb
     * @return fb access token or false
     */
    public static function getTokenFromPageTab($fb)
    {
        $helper = $fb->getPageTabHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {

            return array('accesstoken' => $accessToken->getValue(), 
                         'cxt' => 'pageTab',
                         'is_admin' => $helper->isAdmin(),
                         'page_id' => $helper->getPageId());
        }
        else {
            return false;
        }
    }

    /**
     * Obtaining an access token from redirect
     *
     * @param object $fb
     * @return fb access token or false
     */
    public static function getTokenFromRedirect($fb)
    {
        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {

            return array('accesstoken' => $accessToken->getValue(), 
                         'cxt' => 'redirect', 
                         'is_admin' => static::isAdmin($helper->getUserId()));
        }
        else {
            return false;
        }
    }

    /**
     * Obtaining an access token from js helper
     *
     * @param object $fb
     * @return fb access token or false
     */
    public static function getTokenFromJsHelper($fb)
    {
        $helper = $fb->getJavaScriptHelper();

        try {
          $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        if($accessToken) {
            return array('accesstoken' => $accessToken->getValue(),
                         'user_id' => $helper->getUserId());
        }
        else {
            return false;
        }
    }

    /**
     * check ifAdmin for canvas and redirect context
     *
     * @param object $user_id
     * @return boolean
     */
    public static function isAdmin($user_id)
    {
        //TODO check if user_id exist in database
        if ($user_id == '650567088379727') {
            return true;
        }
        else {
            return false;
        }
    }

}
