<?php

class my_sql{

	private $db_host;
	private $db_name;
	private $db_username;
	private $db_password;
	private $dbc;

	public function __construct()
	{
		$this->db_host="localhost";
		$this->db_name= "test";
        $this->db_username="root";
        $this->db_password="";
        $this->dbc=mysql_connect($this->db_host, $this->db_username, $this->db_password);
        mysql_set_charset("utf8",$this->dbc);
    }

    public function close()
	{
		mysql_close($this->dbc);
   	}

   	public function string($str)
   	{
   		return mysql_real_escape_string($str);
   	}
}

$sql = new my_sql();
$stri = "'asd'asd's' dd's  vcv's \" \ ";
echo($sql->string($stri)); //  \'asd\'asd\'s\' dd\'s  vcv\'s \" \\
echo('---------------');
echo($stri);
echo("---------------------");
$stri= addslashes($stri); ///    \'asd\'asd\'s\' dd\'s  vcv\'s \" \\ 
echo($stri);
$sql->close();


?>