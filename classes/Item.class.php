<?php
    include_once('Db.class.php');

    class Item {
        private $description;
        private $picture;

        

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of picture
         */ 
        public function getPicture()
        {
                return $this->picture;
        }

        /**
         * Set the value of picture
         *
         * @return  self
         */ 
        public function setPicture($picture)
        {
                $this->picture = $picture;

                return $this;
        }

        /*
            Get all items from the database
            @return array
        */
        public static function getAll() {
            $conn = Db::getInstance();
            $statement = $conn->prepare('select * from posts');
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        /*
            Get one item based on $id
        */
        public static function find($id) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from posts where id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

    }