<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'root', '', 'u776344484_activarjonilla');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

