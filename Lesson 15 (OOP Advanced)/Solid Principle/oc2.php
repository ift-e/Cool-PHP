<?php
interface Communicative
{
    public function speak(): string;
}
class Dog implements Communicative
{
    public function speak(): string
    {
        return 'woof woof';
    }
}
class Duck implements Communicative
{
    public function speak(): string
    {
        return 'quack quack';
    }
}
class Cat implements Communicative
{
    public function speak(): string
    {
        return 'meow';
    }
}

class Man{
    function speak(){
        return "Hello";
    }
}
class Communication
{
    public function communicate($animal): string
    {
        if ($animal instanceof Communicative) {
            return $animal->speak();
        } else {
            throw new Exception('Unknown animal');
        }
    }
}
echo (new Communication)->communicate(new Man);