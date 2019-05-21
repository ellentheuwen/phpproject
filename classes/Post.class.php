<?php

class Post
{
    private $image;
    private $description;

    /**
     * Get the value of image.
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image.
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /*
    GET ALL
    FROM DB
    */

    public static function getAll()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT id 
                                FROM users 
                                WHERE email = '".$_SESSION['email']."'");
        $statement->execute();
        $id = $statement->fetch(PDO::FETCH_COLUMN);

        $statement = $conn->prepare('SELECT posts.id,posts.image,posts.description,posts.user_id,
        posts.date AS images_date,users.avatar 
        FROM posts,followers,users 
        WHERE followers.user_id1=:id
        AND followers.user_id2=posts.user_id 
        AND followers.user_id2 = users.id 
        UNION SELECT posts.id,posts.image,posts.description,posts.user_id,posts.date,users.avatar 
        FROM posts,users 
        WHERE posts.user_id =:id AND users.id=:id ORDER BY `images_date` DESC limit 20');

        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function detailPagina()
    {
        $id = $_GET['id'];
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM posts where id = $id");
        $statement->execute();
        $collection = $statement->fetchAll();

        return $collection;
    }

    public static function profilePic()
    {
        $id = $_GET['id'];
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT users.avatar 
                                    FROM posts,users 
                                    WHERE posts.user_id = users.id 
                                    AND posts.id = $id");
        $statement->execute();
        $profilePic = $statement->fetch();

        return $profilePic;
    }

    public static function detectColors($image, $num, $level = 5)
    {
        $level = (int) $level;
        $palette = array();
        $size = getimagesize($image);
        if (!$size) {
            return false;
        }
        switch ($size['mime']) {
      case 'image/jpeg':
        $img = imagecreatefromjpeg($image);
        break;
      case 'image/png':
        $img = imagecreatefrompng($image);
        break;
      case 'image/gif':
        $img = imagecreatefromgif($image);
        break;
      default:
        return false;
    }
        if (!$img) {
            return false;
        }
        for ($i = 0; $i < $size[0]; $i += $level) {
            for ($j = 0; $j < $size[1]; $j += $level) {
                $thisColor = imagecolorat($img, $i, $j);
                $rgb = imagecolorsforindex($img, $thisColor);
                $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x66)) * 0x66)), round(round(($rgb['green'] / 0x66)) * 0x66), round(round(($rgb['blue'] / 0x66)) * 0x66));
                $palette[$color] = isset($palette[$color]) ? ++$palette[$color] : 1;
            }
        }
        arsort($palette);

        return array_slice(array_keys($palette), 0, $num);
    }
}
