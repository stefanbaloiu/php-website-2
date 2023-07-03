<?php 
namespace classes;
interface Routes {
	public function getController($name);
	public function getDefaultRoute();
	public function checkLogin($route);
}