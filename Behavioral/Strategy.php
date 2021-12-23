<?php
interface PercentageSaleStrategy
{
    public function getPercentageSale(): int;
}
class SummerSaleStrategy implements PercentageSaleStrategy
{
    public function getPercentageSale(): int
    {
        return 15;
    }
}

class BlackFridaySaleStrategy implements PercentageSaleStrategy
{
    public function getPercentageSale(): int
    {
        return 50;
    }
}

class BoxingDaySaleStrategy implements PercentageSaleStrategy
{
    public function getPercentageSale(): int
    {
        return 5;
    }
}
class Shirt
{

    private $sale;

    public function __construct(PercentageSaleStrategy $sale)

    {

        $this->sale = $sale;
    }
    public function getPercentageSale()
    {

        return $this->sale->getPercentageSale();
    }
}
$summerShirt = new Shirt(new SummerSaleStrategy);

echo " Summer Sell Discount is " . $summerShirt->getPercentageSale() . "%\n";
$blackFridayShirt = new Shirt(new BlackFridaySaleStrategy);
echo " Black Friday Discount is " . $blackFridayShirt->getPercentageSale() . "%\n";
$boxingDayShirt = new Shirt(new BoxingDaySaleStrategy);
echo " Boxing day Discount is " . $boxingDayShirt->getPercentageSale() . "%\n";
?>
