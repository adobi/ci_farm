<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Users extends MY_Model 
{
    protected $_name = "user";
    protected $_primary = "id";
    
    /**
     * beleptet egy felhasznalot
     *
     * @return mixed false ha nincs ilyen felhasznalo, a user egyebkent
     * @author Dobi Attila
     */
    public function login($username, $password) 
    {
        $user = $this->fetchRows(
            array('where'=>array('username'=>$username, 'password'=>$password)), true
        );
        
        return $user;
    }
}