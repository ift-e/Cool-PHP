# Dependency Injection
এটার আরও একটি নাম আছে **(IOC) Inversion Of Control** তো দুটো নামই বেশ খটমটে, কিন্তু আমরা যখন ব্যাবহার করতে যাবো কোডের মধ্যে দেখবো বিষয়টা একবারে সহজ, জাস্ট শুধু একটা কনসেপ্ট। থিওরী হলো সঠিক ভাবে কীভাবে একটা অবজেক্টের মধ্যে আরেকটি অবজেক্ট পাস করা যাই।

#### চলুন আগে ভুল ভাবে কীভাবে ডিপেন্ডেন্সি ইনজেকশন লিখে থাকে তা দেখে নেই।

```php
    interface BikeEngine{
        function engineName();
    }
    class BikeEngine1 implements BikeEngine{
        function engineName(){
            echo "Single cylinder engines";
        }
    }
    class Bike{
        private $engine;
        function __construct(){
            $this->engine = new BikeEngine1;
            $this->engine->engineName();
        }
    }

    $bike = new Bike;
```
এখন আমদের কোড সব এখানে ঠিক আছে কাজ করছে কিন্তু __Hard Coded Dependency__ তৈরী হয়ে গেছে। উপরে লক্ষ করলে দেখতে পাবেন __Bike Class__ এর মধ্যে নতুন অবজেক্ট __Initialize__ (আরম্ভ বা শুরু) করছি, এখানে জোর পূর্বক সরাসরি ভাবে অবজেক্ট শুরু করার কারনে এখানে __Hard Coded Dependency__ হয়েছে, কারণ __Bike Class__ নিজেই সিদ্ধান্ত নিলো যে কোন __Engine__ বা কোন __Dependency__ নিবো বা কীভাবে নিয়ে কাজ করব। তো এইযে একটা __Dependency__ এটাকে আমরা কীভাবে আরও ভালো ভাবে লিখতে পারি?

বেশি কিছু করা লাগবে না, জোর পূর্বক সরাসরি ভাবে অবজেক্ট __Initialize__ না করে আমরা শুধু মেথড এর মধ্যে অবজেক্টকে পাস করে দিবো।

```php
    interface BikeEngine{
        function engineName();
    }
    class BikeEngine1 implements BikeEngine{
        function engineName(){
            echo "Single cylinder engines";
        }
    }
    class Bike{
        private $engine;
        function __construct(BikeEngine $engine){
            $this->engine = $engine;
            $this->engine->engineName();
        }
    }

    $engine = new BikeEngine1;
    $bike = new Bike($engine);
```
এইতো আশা করি ব্যাপারটা বুঝতে পেরেছেন। আমরা যদি বাইকের ইঞ্জিন এর জায়গায় প্ল্যান এর ইঞ্জিন দেয় কাজ করবে? করবে না এই জন্য __Type Hint__ করে দিয়েছি ***function __construct(BikeEngine $engine)*** যেন নির্ধারিত অবজেক্ট ছাড়া অন্য কোনো অবজেক্ট পাস করতে না পারে।

#### আরও সুন্দর দুইটি উদাহরণ দেখতে উপরের দুইটি ফাইল দেখতে পারেন, এবং Dependency Injection সম্পর্কে আরো ভালো ভাবে জানতে এই ভিডিওটি দেখতে পারেন। [Link: ](https://youtu.be/S4kHxihAlLA) https://youtu.be/S4kHxihAlLA