<?php

abstract class BookPrototype
{
    protected $title;
    protected $category;
    abstract public function __clone();
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
}

class BarBookPrototype extends BookPrototype
{
    /**
     * @var string
     */
    protected $category = 'Bar';

    public function __clone()
    {
    }
}

class FooBookPrototype extends BookPrototype
{
    /**
     * @var string
     */
    protected $category = 'Foo';

    public function __clone()
    {
    }
}

/* $bookPrototype = new BookPrototype();
echo $bookPrototype->getTitle();  */ // No es posible instanciar una clase Abstracta


$fooPrototype = new FooBookPrototype();
$barPrototype = new BarBookPrototype();

for ($i = 0; $i < 10; $i++) {
	$book = clone $fooPrototype;
	$book->setTitle('Foo Book No ' . $i);
	echo $book->getTitle().', ';
}
echo '<br><br>----<br><br>';
for ($i = 0; $i < 5; $i++) {
	$book = clone $barPrototype;
	$book->setTitle('Bar Book No ' . $i);
	echo $book->getTitle().', ';
}

