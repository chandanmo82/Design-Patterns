<?php
interface Visitor
{
    public function visit(Visitable $Visitable);
}
interface Visitable
{
    public function accept(Visitor $Vsitor);
}
class ConcreteVisitable implements Visitable
{
    public $items = array();

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function accept(Visitor $Vsitor)
    {
        $Vsitor->visit($this);
    }
}
class ConcreteVisitor implements Visitor
{
    protected $info;

    public function visit(Visitable $Visitable)
    {
        echo "Object: ", get_class($Visitable), "\n";
        $items = get_object_vars($Visitable)['items'];

        foreach ($items as $index => $value) {
            echo $index . " : ", $value, "\n";
        }
    }
}
// Usage example
$ConcreteVisitable = new ConcreteVisitable();
$ConcreteVisitor = new ConcreteVisitor();
$ConcreteVisitable->addItem('item 1');
$ConcreteVisitable->addItem('item 2');
$ConcreteVisitable->addItem('item 3');
$ConcreteVisitable->accept($ConcreteVisitor);
?>