<?

class connection
{
    private $serverName;
    private $userName;
    private $password;
    private $dbName;
    private $sql;
    private $query;

    protected function connect()
    {
        $serverName = "localhost"; //define server address
        $userName = "root"; //define MySql Username
        $password = ""; // define Mysql Password
        $dbName = "oop"; // define Database Name
        try {
            $dsn = "mysql:host=" . $serverName . ";dbname=" . $dbName;
            $conn = new PDO($dsn, $userName, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function Query($query, $param = [])
    {
        if (empty($param)) {
            $this->Query = $this->connect()->prepare($query);
            $this->Query->execute();
            return $this->Query;
        } else {

            $this->Query = $this->connect()->prepare($query);
            $this->Query->execute($param);
            return $this->Query;
        }
    }
}
?>