<?php
    include_once('Db.class.php');
    
    class User {
        private $email;
        private $password;
        private $firstname;
        private $lastname;
        private $username;
        private $db;

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            if( empty($email) ){
                throw new Exception("Email cannot be empty.");
            }

			Security::isEmailValid($email); // valid email?

            $this->email = $email;
            return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of firstname
         */ 
        public function getFirstname()
        {
                return $this->firstname;
        }

        /**
         * Set the value of firstname
         *
         * @return  self
         */ 
        public function setFirstname($firstname)
        {
                $this->firstname = $firstname;

                return $this;
        }

                /**
         * Get the value of lasttname
         */ 
        public function getLastname()
        {
                return $this->lastname;
        }

        /**
         * Set the value of lastname
         *
         * @return  self
         */ 
        public function setLastname($lastname)
        {
                $this->lastname = $lastname;

                return $this;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        // Registers a user into the database  @return true if successful @return false if unsuccessful
        public function register() {
            // connectie
            $conn = Db::getInstance();

            // query (sql injectie!!!)
            $statement = $conn->prepare("insert into users
                                         (email, password, firstname, lastname, username)
                                         values (:email, :password, :firstname, :lastname, :username)
                                        ");
            
            $hash = password_hash($this->password, PASSWORD_BCRYPT);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":firstname", $this->firstname);
            $statement->bindParam(":lastname", $this->lastname);
            $statement->bindParam(":username", $this->username);
            $statement->bindParam(":password", $hash);

            // execute
            $result = $statement->execute();
            return $result;
        }

        // Create a user session, redirect to the index page
        public function login() {
            if(!isset($_SESSION)) { 
                session_start(); 
            } 
            $_SESSION['email'] = $this->email;
            header('Location: index.php');
        }

        // Check if a user is logged in. If not, redirect to login
        public static function checkLogin(){
            if(!isset($_SESSION)) { 
                session_start(); 
            }
            if(!isset($_SESSION['email'])){
                header('Location: login.php');
            }
        }

        // Find a user based on email addres
        public static function findByEmail($email){
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from users where email = :email limit 1");
            $statement->bindValue(":email", $email);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        // Check if a user exists based on a give email address */
        public static function isAccountAvailable($email){
            $u = self::findByEmail($email);
            
            // PDO returns false if no records are found so let's check for that
            if($u == false){
                return true;
            } else {
                return false;
            }
        }

        // Change profile settings
        public function changeSettings() {
            // connectie
            $conn = Db::getInstance();
            // query (sql injectie!!!)
            $statement = $conn->prepare("update users set username = :username, firstname = :firstname, lastname = :lastname, email = :email, password = :password");
            
            $hash = password_hash($this->password, PASSWORD_BCRYPT);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":firstname", $this->firstname);
            $statement->bindParam(":lastname", $this->lastname);
            $statement->bindParam(":username", $this->username);
            $statement->bindParam(":password", $hash);

            // execute
            $result = $statement->execute();
            return $result;

        }
    }