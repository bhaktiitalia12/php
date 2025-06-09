
<?php
class BankAccount
{
  private $balance = 1000;

  public function getBalance()
  {
    return $this->balance;
  }
  public function deposit($amount)
  {
    if ($amount > 0) {
      $this->balance += $amount;
    }
  }
}

$acc = new BankAccount();
echo $acc->getBalance(); // ✅ OK
// echo $acc->balance; ❌ Error: private
echo "<br>";
$acc->deposit(500);
echo $acc->getBalance(); // ✅ OK


echo "<br>";
class User
{
  public $username;

  public function __construct($uname)
  {
    $this->username = $uname;
    echo "User created with username: $this->username";
    echo "<br>";
  }

  public function show()
  {
    $this->username = "Bhaktiii";
    echo "Username: $this->username";
  }
}

$u = new User("bhakti123");
$u->show(); // Output: Username: bhakti123
