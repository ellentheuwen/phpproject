<?php

class User
{
    private $email;
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $bio;
    private $avatar;

    /**
     * Get the value of email.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email.
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of firstname.
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname.
     *
     * @return self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname.
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname.
     *
     * @return self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of username.
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username.
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password.
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of bio.
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set the value of bio.
     *
     * @return self
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get the value of avatar.
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar.
     *
     * @return self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public static function getAll()
    {
        $conn = Db::getInstance();
        $result = $conn->query('SELECT * 
                                FROM users ');

        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function register()
    {
        $options = [
        'cost' => 12,
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);

        try {
            $conn = Db::getInstance();
            $statement = $conn->prepare('INSERT into users (email,firstname,lastname,username,password,bio,avatar) VALUES (:email,:firstname,:lastname,:username,:password,"","")');
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':firstname', $this->firstname);
            $statement->bindParam(':lastname', $this->lastname);
            $statement->bindParam(':username', $this->username);
            $statement->bindParam(':password', $password);

            $result = $statement->execute();

            return $result;
        } catch (Throwable $t) {
            return false;
        }
    }

    public static function login()
    {
        if (!empty($_POST)) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $conn = Db::getInstance();
            $statement = $conn->prepare('SELECT * 
                                        from users 
                                        where email = :email');
            $statement->bindParam(':email', $email);
            $result = $statement->execute();

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['email'] = $email;
                header('Location:index.php');
            } else {
                $error = true;
            }
        }
    }

    public static function checkLogin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['email'])) {
            header('Location: login.php');
        }
    }

    /*
    CHECKS IF USERNAME
    IS ALREADY IN DB
    */

    public static function UsernameAvailable($username)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * 
                                FROM users 
                                WHERE username = :username');
        $statement->bindParam(':username', $username);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return true;
        } else {
            return false;
        }
    }

    /*
    QUERY OM USERNAME
    TE ZOEKEN
    */

    public static function username()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT id 
                                    FROM users 
                                    WHERE email = '".$_SESSION['email']."'");
        $statement->execute();
        $id = $statement->fetch(PDO::FETCH_COLUMN);

        $statement = $conn->prepare('SELECT username 
                                    FROM users 
                                    WHERE users.id=:id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        $username = $statement->fetch(PDO::FETCH_COLUMN);

        return $username;
    }

    /*
    QUERY OM AVATAR
    TE ZOEKEN
    */

    public static function avatar()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT id 
                                FROM users 
                                WHERE email = '".$_SESSION['email']."'");
        $statement->execute();
        $id = $statement->fetch(PDO::FETCH_COLUMN);

        $statement = $conn->prepare('SELECT avatar 
                                    FROM users 
                                    WHERE users.id=:id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $avatar = $statement->fetch(PDO::FETCH_COLUMN);

        return $avatar;
    }

    /*
    QUERY OM BIO
    TE ZOEKEN
    */

    public static function bio()
    {
        $conn = Db::getInstance();

        $stm = $conn->prepare("SELECT id 
                                FROM users 
                                WHERE email = '".$_SESSION['email']."'");
        $stm->execute();
        $id = $stm->fetch(PDO::FETCH_COLUMN);

        $statement = $conn->prepare('SELECT bio 
                                    FROM users 
                                    WHERE users.id=:id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $bio = $statement->fetch(PDO::FETCH_COLUMN);

        return $bio;
    }
}
