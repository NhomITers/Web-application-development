<?php
class Database
{
    protected $pdo='';
    protected $sql='';
    protected $stateMent='';
    public function Database()
    {
        try
        {
        $this->pdo=new PDO('mysql:host=localhost; dbname=ql_ban_sua','root','');
        $this->pdo->query('set names utf8');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            exit('Không kết nối được cơ sở dữ liệu');
        }
    }
    public function setQuery($sql)
    {
        $this->sql=$sql;
    }
    //thuc hien truy van hanh dong: insert, update, delete
    public function execute($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent;
    }
    //truy liet ke lay danh sach
    public function loadAllRow($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetchAll(PDO::FETCH_OBJ);
    }
    //thuc hien truy van liet ke lay 1 mot tin
    public function loadRow($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetch(PDO::FETCH_OBJ);
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
    public function CountAll($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option=array());
        return $this->stateMent->rowCount();
    }    
}
?>