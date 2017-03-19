<?php

require_once 'VIP_User.php';

class PDO_VIP360
{
    protected $DB_VIP360_PREFIX = 'ptp_vip360_';

    protected $dsn, $user, $password, $dbh;

    public function __construct()
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

    public function getVIPUser($username, $password)
    {
        $query = $this->dbh->prepare('SELECT * FROM '.$this->DB_VIP360_PREFIX.'user WHERE username = :username');
        $query->execute(array(':username' => $username));
        $user = $query->fetch();

        if(!empty($user))
        {
            if(password_verify($password, $user['password']))
                return new VIP_User($user['id'], $user['username'], $user['password'], $user['first_name'], $user['last_name'], $user['image']);
        }
    }
}