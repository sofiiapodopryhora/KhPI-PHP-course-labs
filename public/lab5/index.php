<?php

require_once __DIR__ . '/AccountInterface.php';
require_once __DIR__ . '/BankAccount.php';
require_once __DIR__ . '/SavingsAccount.php';

header('Content-Type: text/plain; charset=utf-8');

echo "BankAccount (USD)\n";
$acc1 = new BankAccount('USD');
try {
	$acc1->deposit(100);
	echo "Баланс: " . $acc1->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

try {
	$acc1->withdraw(30);
	echo "Баланс: " . $acc1->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

try {
	$acc1->withdraw(1000);
	echo "Баланс: " . $acc1->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

try {
	$acc1->deposit(-10);
	echo "Баланс: " . $acc1->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

echo "\nSavingsAccount (USD)\n";
$sav = new SavingsAccount('USD');
try {
	$sav->deposit(200);
	echo "Баланс: " . $sav->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

SavingsAccount::$interestRate = 0.1;
try {
	$sav->applyInterest();
	echo "Після нарахування відсотків: " . $sav->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

try {
	$sav->withdraw(50);
	echo "Баланс: " . $sav->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

try {
	$sav->withdraw(-5);
	echo "Баланс: " . $sav->getBalance() . " USD\n";
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage() . "\n";
}

