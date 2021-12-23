<?php
class Cars
{

    private $vehicleMaker;
    private $vehicleModel;

    public function __construct($maker, $model)
    {

        $this->vehicleMaker = $maker;
        $this->vehicleModel = $model;
    }
    public function getMakerAndModel()
    {

        return "Company : " . $this->vehicleMaker . "  and  Model : " . $this->vehicleModel . "\n";
    }
}
class Factory
{
    public static function create($maker, $model)
    {
        return new Cars($maker, $model);
    }
}
$avanti = Factory::create("DC", "AVANTI");
echo $avanti->getMakerAndModel();
?>