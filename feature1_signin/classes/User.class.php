<?php

    class User {
        private $firstName; 
        private $lastName; 
        private $username;
        private $email;
        private $password; 
        private $passwordConfirmation;

        /**
         * Get the value of firstName
         */ 
        public function getFirstName()
        {
                return $this->firstName;
        }

        /**
         * Set the value of firstName
         *
         * @return  self
         */ 
        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
                return $this->lastName;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

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
         * Get the value of passwordConfirmation
         */ 
        public function getPasswordConfirmation()
        {
                return $this->passwordConfirmation;
        }

        /**
         * Set the value of passwordConfirmation
         *
         * @return  self
         */ 
        public function setPasswordConfirmation($passwordConfirmation)
        {
                $this->passwordConfirmation = $passwordConfirmation;

                return $this;
        }

        public function register() {
            $options = [
                'cost' => 12 
            ];
            $password = password_hash($this->password, PASSWORD_DEFAULT, $options);
    
            try{
                $conn = new PDO("mysql:host=localhost;dbname=phpproject","root","root", null); //root nooit online zetten
                $statement = $conn->prepare("INSERT into users (firstName, lastName, username, email,password) VALUES (:firstName, :lastName; :username, :email,:password)");
                $statement->bindParam(":firstName", $this->firstName);
                $statement->bindParam(":lastName", $this->lastName);
                $statement->bindParam(":username", $this->username);
                $statement->bindParam(":email",$this->email); 
                $statement->bindParam(":password",$password);
                $result = $statement->execute();
                return $result;
    
            } catch(Throwable $t){
                return false;
            };
        }

        
    }



    