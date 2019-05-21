<?php

class Comment
{
    public function Save()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('insert into comments (post_id, user_id, text) 
                                    values (:post_id, :user_id, :text)');
        $statement->bindValue(':post_id', (int) $_GET['id']);
        $statement->bindValue(':user_id', 1);
        $statement->bindValue(':text', $this->getText());

        return $statement->execute();
    }

    private $text;

    public static function getAll()
    {
        $conn = Db::getInstance();
        $id = $_GET['id'];
        $result = $conn->query("select * 
                                from comments 
                                where post_id=$id 
                                order by id desc");

        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Get the value of text.
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text.
     *
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
