<?php
namespace Ivalis\Bundle\Repository;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Component\DependencyInjection\Container;
/**
 * Description of UserRepository
 *
 * @author miora.manitra
 */
class UserRepository {
    //put your code here
    private $container;
    
    function __construct(Container $container)
    {
        $this->container = $container;
    }
    private function getContainer(){
        return $this->container; 
    }
    public function connexion($login ,$password){
        $c = $this->getContainer();
        $url= $c->getParameter("url_connexion");
        $basicAuth_username = $c->getParameter("basicAuth_username");
        $basicAuth_password = $c->getParameter("basicAuth_password");
        $oauth_grant_type = $c->getParameter("oauth_grant_type");
        
        $http = $c->get("http");
        $http->setUrl($url); 
        $http->setBasicAuth($basicAuth_username,$basicAuth_password);
        
        $http->setHeaders("Content-Type : application/x-www-form-urlencoded");
        $data = "username=$login&password=$password&grant_type=$oauth_grant_type" ;
        $http->setRawPostData($data);
        return $http->execute();
    }
}
