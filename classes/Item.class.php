<?php
    include_once('Db.class.php');

    class Item {
        private $description;
        private $picture;
        private $hashtags;
        private $location;

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
            if ( empty($description)) {
                throw new Exception("Description cannot be empty, please enter a description.");
            }

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
            Get all items from the database @return array
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


        /**
         * Get the value of hashtags
         */ 
        public function getHashtags()
        {
                return $this->hashtags;
        }

        /**
         * Set the value of hashtags
         *
         * @return  self
         */ 
        public function setHashtags($hashtags)
        {
                $this->hashtags = $hashtags;

                return $this;
        }

        /**
         * Get the value of location
         */ 
        public function getLocation()
        {
                return $this->location;
        }

        /**
         * Set the value of location
         *
         * @return  self
         */ 
        public function setLocation($location)
        {
                $this->location = $location;

                return $this;
        }

        
    public function upload() {    

        // connectie 
        $conn = Db::getInstance();

        // sql injectie
        $statement = $conn->prepare("insert into posts (description, picture, hashtags, location) values (:description, :picture, :hashtags, :location");

        $statement->bindParam(":description", $this->description);
        $statement->bindParam(":picture", $this->picture);
        $statement->bindParam(":hashtags", $this->hashtags);
        $statement->bindParam(":location", $this->location);

        // execute
        $result = $statement->execute();
        return $result;

        }
    }