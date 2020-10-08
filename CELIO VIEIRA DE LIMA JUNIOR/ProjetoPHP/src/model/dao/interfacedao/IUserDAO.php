<?php

namespace ProjetoPHP\src\model\dao\interfacedao;
use \ProjetoPHP\src\model\vo\UserDAO;

interface IUserDAO{

    function findAll();
    function findByEmail($email);
    function create($user);
    function update($email, $user);
    function delete($id);
    function verifyUserAndPassword($email, $password);
}