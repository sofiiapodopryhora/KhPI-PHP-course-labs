<?php

require_once __DIR__ . '/BankAccount.php';

class SavingsAccount extends BankAccount
{
    public static $interestRate = 0.05;

    public function applyInterest()
    {
        if (self::$interestRate > 0) {
            $this->balance += $this->balance * self::$interestRate;
        }
        return $this->balance;
    }
}
