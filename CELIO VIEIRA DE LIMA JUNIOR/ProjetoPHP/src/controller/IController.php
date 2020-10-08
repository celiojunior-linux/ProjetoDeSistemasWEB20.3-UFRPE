<?php

namespace ProjetoPHP\src\controller;

interface IController{

    function index();
    function view();
    function create();
    function edit();
    function store();
    function update();
    function delete();
}