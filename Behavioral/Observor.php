<?php

interface Observer {
    public function addCurrency(Currency $currency);
}
 
class priceSimulator implements Observer {
    private $currencies;
     
    public function __construct() {
        $this->currencies = array();
    }
     
    public function addCurrency(Currency $currency) {
        array_push($this->currencies, $currency);
    }
     
    public function updatePrice() {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}
 
interface Currency {
    public function update();
    public function getPrice();
}
 
class Rupee implements Currency {
    private $price;
     
    public function __construct($price) {
        $this->price = $price;
        echo "Rupee Original Price : $price\n";
    }
     
    public function update() {
        $this->price = $this->getPrice();
        echo "Rupee Updated Price : $this->price\n";
    }
     
    public function getPrice() {
        return f_rand(0.65, 0.71);
    }
     
}
 
class Yen implements Currency {
    private $price;
 
    public function __construct($price) {
        $this->price = $price;
        echo "Yen Original Price : $price\n";
    }
 
    public function update() {
        $this->price = $this->getPrice();
        echo "Yen Updated Price : $this->price\n";
    }
     
    public function getPrice() {
        return f_rand(120.52, 122.50);
    }
     
}
 
function f_rand($min=0,$max=1,$mul=1000000){
    if ($min>$max){ 
        return false;
    }
    return mt_rand($min*$mul,$max*$mul)/$mul;
}
 
$priceSimulator = new priceSimulator();
 
$currency1 = new Rupee(0.60);
$currency2 = new Yen(122);
 
$priceSimulator->addCurrency($currency1);
$priceSimulator->addCurrency($currency2);
echo "----------------------\n";
$priceSimulator->updatePrice();
echo "----------------------\n";
$priceSimulator->updatePrice();
echo "----------------------\n";
?>