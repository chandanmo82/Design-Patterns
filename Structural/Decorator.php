<?php
interface FoodItem
{
    public function cost();
}
class Pizza implements FoodItem
{
    public function cost () {
        return 4;
    }
}
class Cheese implements FoodItem
{
    private $item;
    public function __construct (FoodItem $item) {
        $this->item = $item;
    }
    public function cost () {
        return $this->item->cost() + 0.25;
    }
}
class CheeseCrust implements FoodItem 
{
    private $item;
    public function __construct (FoodItem $item) {
        $this->item = $item;
    }
    public function cost () {
        return $this->item->cost() + 1;
    }
}
$pizza = new Pizza();
$extraaCheese = new Cheese($pizza); 
$cheeseCrust = new CheeseCrust($pizza); 
$overloaded = new CheeseCrust($cheeseCrust); 
echo "Only Pizza Cost:".$pizza->cost()."\n"; 
echo "After Extraa Cheese cost : ".$extraaCheese->cost()."\n"; 
echo "After CheeseCrust cost : ".$cheeseCrust->cost()."\n"; 
echo "Total Cost having all Decorator : ".$overloaded->cost()."\n";
?>