<?php

require_once __DIR__ . '/AccountInterface.php';

class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0;

    protected $balance = 0;
    protected $currency;

    public function __construct($currency, $initialBalance = 0)
    {
        $this->currency = $currency;
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception('Некоректна сума');
        }
        $this->balance = $initialBalance;
    }

    public function deposit($amount)
    {
        if (!is_numeric($amount) || $amount < 0) {
            throw new Exception('Некоректна сума');
        }
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw($amount)
    {
        if (!is_numeric($amount) || $amount < 0) {
            throw new Exception('Некоректна сума');
        }
        if ($amount > $this->balance) {
            throw new Exception('Недостатньо коштів');
        }
        $this->balance -= $amount;
        if ($this->balance < self::MIN_BALANCE) {
            $this->balance = self::MIN_BALANCE;
        }
        return $this->balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}
