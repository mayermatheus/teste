<?php

/**
 * Created by PhpStorm.
 * User: mayer
 * Date: 09/11/15
 * Time: 01:15
 */
namespace User;


class User
{
    protected $id;
    protected $name;
    protected $language;
    protected $age;
    protected $income;
    protected $dayBirth;
    protected $monthBirth;
    protected $xpMarket;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     * @return User
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * @param mixed $income
     * @return User
     */
    public function setIncome($income)
    {
        $this->income = $income;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDayBirth()
    {
        return $this->dayBirth;
    }

    /**
     * @param mixed $dayBirth
     * @return User
     */
    public function setDayBirth($dayBirth)
    {
        $this->dayBirth = $dayBirth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMonthBirth()
    {
        return $this->monthBirth;
    }

    /**
     * @param mixed $monthBirth
     * @return User
     */
    public function setMonthBirth($monthBirth)
    {
        $this->monthBirth = $monthBirth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getXpMarket()
    {
        return $this->xpMarket;
    }

    /**
     * @param mixed $xpMarket
     * @return User
     */
    public function setXpMarket($xpMarket)
    {
        $this->xpMarket = $xpMarket;
        return $this;
    }

    /*
     * Método utilizado para salvar no banco de dados o usuário extraído do arquivo.
     */
    public function saveUser(User $user)
    {
        try{
            $con = new \PDO("mysql:host=localhost;dbname=teste", "root", "");
        }catch (\PDOException $e){
            echo "Erro:".$e->getMessage();
        }
        $stmt = $con->prepare("INSERT INTO users(id, nome, lingua, idade, RendaPropriaMensal, Dia_nasc, mes_nasc,xp_mercado) VALUES(?, ?, ? , ? , ? ,? ,?, ?)");
        $stmt->bindParam(1,$user->id);
        $stmt->bindParam(2,$user->name);
        $stmt->bindParam(3,$user->language);
        $stmt->bindParam(4,$user->age);
        $stmt->bindParam(5,$user->income);
        $stmt->bindParam(6,$user->dayBirth);
        $stmt->bindParam(7,$user->monthBirth);
        $stmt->bindParam(8,$user->xpMarket);
        $stmt->execute();

        echo "O usuário {$user->getName()}, foi salvo com sucesso." . PHP_EOL;
    }

}