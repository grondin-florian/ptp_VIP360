<?php

class PDO_VIP360
{
    const _DB_VIP360_PREFIX_ = 'ptp_vip360_';

    protected $dsn, $user, $password, $dbh;

    function __construct()
    {
        $this->dsn = 'mysql:dbname=ptp_vip360_db;host=127.0.0.1';
        $this->user = 'ptp_vip360_db';
        $this->password = 'Niv4870CEWp2DGHI';

        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            die('Connexion à la base de données échouée : ' . $e->getMessage());
        }
    }
}