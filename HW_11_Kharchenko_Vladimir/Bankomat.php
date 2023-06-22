<?php

class Bankomat
{
    private $cash;
    private $passwordAdmin;
    private $userMoney;

    public function __construct(string $name, int $password) {
        $this->cash = rand(500, 1000);
        $this->passwordAdmin = 12345;
        $this->userMoney = [
            $password => [
                'cash' => rand(1, 1000),
                'name' => $name,
            ]
        ];
    }


    /**
     * @return mixed
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * @param mixed $cash
     */
    public function setCash($cash)
    {
        $this->cash = $cash;
    }

    /**
     * @return mixed
     */
    public function getPasswordAdmin()
    {
        return $this->passwordAdmin;
    }

    /**
     * @param mixed $passwordAdmin
     */
    public function setPasswordAdmin($passwordAdmin)
    {
        $this->passwordAdmin = $passwordAdmin;
    }

    public function showBalance(int $password){
        if (!array_key_exists($password,$this->userMoney)) {
            echo "Пользователя с таким паролем не существует!";
        } else {
            echo "Вашe имя " . $this->userMoney[$password]['name'] . "<br>";
            echo "Ваш баланс " . $this->userMoney[$password]['cash'];
        }
    }

    public function getMoney($count, $password) {
        if (!array_key_exists($password,$this->userMoney)) {
            echo "Пользователя с таким паролем не существует!";
        } else {
            echo "Ваш баланс " . $this->userMoney[$password]['cash'] . "<br>";
            echo "Вы пытаетесь снять " . $count . "<br>";
            if ($count > $this->cash) {
                echo "В банкомате нет столько нала!";
            } else {
                if ( $this->userMoney[$password]['cash'] < $count) {
                    echo "У вас столько нет налички";
                } else {
                    $this->userMoney[$password]['cash'] = $this->userMoney[$password]['cash'] - $count;
                    echo "Вы успешно сняли " . $count . " Ваш остаток" . $this->userMoney[$password]['cash'] . "<br>";
                }

            }
        }
    }


}

$user1 = new Bankomat("Vova", 12345);

$user1->showBalance(12345);
echo "Деньги в банкомате: " . $user1->getCash() . '<br>';
$user1->getMoney(800, 12345);
