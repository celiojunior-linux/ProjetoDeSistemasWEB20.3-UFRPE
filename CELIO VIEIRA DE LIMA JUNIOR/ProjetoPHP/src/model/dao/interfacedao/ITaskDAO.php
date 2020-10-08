<?php

namespace ProjetoPHP\src\model\dao\interfacedao;
use \ProjetoPHP\src\model\vo\TaskDAO;

interface ITaskDAO{

    function findAll();
    function findByDate();
    function findByTitle($title);
    function create($task);
    function update($id, $task);
    function delete($id);

}