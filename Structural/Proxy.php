<?php
interface IGame{
    function play();
}
class Game implements IGame {

    private $gameName;
    public function __construct($gameName)
    {
        $this->gameName = $gameName;
    }
    public function play()
    {
       echo "Playing ".$this->gameName." game \n";
    }
    
}
class GameProxy implements IGame {
    private $game;
    private $gameName;
    public function __construct($name)
    {
        $this->gameName = $name;
    }
    public function play()
    {
        if($this->game == null){
            $this->game = new Game($this->gameName);
        }
        $this->game->play();

    }
}
$obj = new GameProxy("B_G_M_I");
$obj->play();
?>