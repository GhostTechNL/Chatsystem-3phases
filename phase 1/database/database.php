<?php

class database {
	
	/* ==========={ Funtions }=========== */
	//Public var
	public static $connection;
	public static $query; 
	//g
	public static function getConnectionDatabase($server, $user, $password, $database)
	{
		$connection = mysqli_connect($server, $user, $password, $database);
		if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
		} else{
			return $connection;
		}
	}
	public static function escape($connection, $var){
		$escape = mysqli_real_escape_string($connection, $var);
		return $escape;
	}
	//g
	public static function select($connection, $query){
		$result = mysqli_query($connection, $query);
		return $result;
	}
	//g
	public static function query($connection, $query){
		if (!empty($query) && !empty($connection)) {
			mysqli_query($connection, $query);
		}
	}
	public static function checkDataInDatabase(){

	}
}