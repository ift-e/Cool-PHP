<?php
// Chain Method
class StringUtility
{
    private $string;
    private $search;
    public $ifte;

    function __construct($string)
    {
        $this->string = $string;
    }

    function search($search)
    {
        $this->search = $search;
        return $this;
    }

    function replace($replaceString)
    {
        $this->ifte = "ifte";
        if (!isset($this->search)) {
            throw new Exception("Nothing To Replace");
        }
        $this->string  = str_replace($this->search, $replaceString, $this->string);
        $this->search = "";
        return $this;
    }

    function upperCase()
    {
        $this->string = strtoupper($this->string);
        return $this;
    }

    function lowercase()
    {
        $this->string = strtolower($this->string);
        return $this;
    }

    function display()
    {
        echo $this->string;
        return $this;
    }
}

$s = new StringUtility("Hello World");

$s->search("World")
->replace("Earth")
->search("Hello")
->replace("Hi")
->upperCase()
->display()
->ifte
->display();
