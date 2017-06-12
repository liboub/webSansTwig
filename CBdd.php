<?php
class CBdd
{
    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        if ($this->connection === null) {
            $this->connection = new PDO(
                    'mysql:host=vps420895.ovh.net;dbname=gds',
                    'root',
                    'oursvole'
                );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }
    }


    function getConnection() {
        return $this->connection;
    }
}
