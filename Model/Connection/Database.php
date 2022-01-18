<?php


namespace Model\Connection;


use Core\Configurations\Connection;

class Database extends Connection
{
    protected $ConnectionString;
    public function __construct()
    {
        $Driver= Connection::$Drivers['First'];
		$this->$Driver();
    }

	public function PDO()
	{
		Try {
			$this->ConnectionString = new \PDO("mysql:host=".Connection::$Host.";dbname=".Connection::$DatabaseName.";charset=".Connection::$Collation."", Connection::$Username, Connection::$Password);
		}
		catch (\PDOException $exception)
		{
			$exception->getMessage();
		}
    }
}