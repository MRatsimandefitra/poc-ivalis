<?php
namespace Ivalis\Bundle\Manager;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Component\DependencyInjection\Container;
/**
 * Description of AuthentificationManager
 *
 * @author miora.manitra
 */
class AuthentificationManager {
    
    private $container;
    
    function __construct(Container $container)
    {
        $this->container = $container;
    }
    private function getContainer(){
        return $this->container;
    }
    public function connexion($login,$password){
        $userRepository = $this->getContainer()->get("user.repository");
        $result = $userRepository->connexion($login,$password);
        return json_decode($result); 
    }
}
