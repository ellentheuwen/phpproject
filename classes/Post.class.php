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

        $statement = $conn->prepare('SELECT *
                                    FROM posts 
                                    ORDER BY `date` DESC');

        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    DETAILPAGE SHOWS EVERYTHING
    WHICH IS LINKED TO THAT POSTID
    */

    public static function detailPagina()
    {
        $id = $_GET['id'];
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * 
                                    FROM posts 
                                    where id = $id");
        $statement->execute();
        $collection = $statement->fetchAll();

        return $collection;
    }

    /*
    DETECTS COLORS
    IN POSTS
    */

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

    /*
    TIME TRANSLATED
    TO A STATUS
    */

    public static function timeStatus($timeOfPost)
    {
        $currentTime = time();   // NOW
        $timeOfPostCode = strtotime($timeOfPost);
        $timeStatus = '';
        $seconds = $currentTime - $timeOfPostCode;
        $minutes = (int) floor($seconds / 60);
        $hours = (int) floor($minutes / 60);
        $days = (int) floor($hours / 24);

        if ($seconds < 60) {
            $timeStatus = 'now';
        } elseif ($minutes == 1) {
            $timeStatus = 'a minute ago';
        } elseif ($minutes == 2) {
            $timeStatus = 'two minutes ago';
        } elseif ($minutes == 3) {
            $timeStatus = 'three minutes ago';
        } elseif ($minutes < 15) {
            $timeStatus = 'less than fifteen minutes ago';
        } elseif ($minutes == 15) {
            $timeStatus = 'fifteen minutes ago';
        } elseif ($minutes < 30) {
            $timeStatus = 'less than half an hour ago';
        } elseif ($minutes == 30) {
            $timeStatus = 'half an hour ago';
        } elseif ($hours < 1) {
            $timeStatus = 'less than an hour ago';
        } elseif ($hours == 1) {
            $timeStatus = 'an hour ago';
        } elseif ($hours == 2) {
            $timeStatus = 'two hours ago';
        } elseif ($hours == 3) {
            $timeStatus = 'three hours ago';
        } elseif ($days < 1) {
            $timeStatus = 'less than a day ago';
        } elseif ($days == 1 && $seconds > 1) {
            $timeStatus = 'yesterday';
        } elseif ($days == 2 && $seconds > 1) {
            $timeStatus = 'the day before yesterday';
        } elseif ($days == 7) {
            $timeStatus = 'one week ago';
        } else {
            $timeStatus = date('d / m / Y', time() - $seconds);
        }

        return $timeStatus;
    }
}
