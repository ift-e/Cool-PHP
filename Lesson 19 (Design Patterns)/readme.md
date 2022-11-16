# Design Patterns
যখন আমরা একজন প্রোগ্রামার বা ডেভলোপের তখন খেয়াল করলে দেখবো যে প্রতিনিয়ত যে প্রজেক্ট-গুলো তে কাজ করি সে প্রজেক্ট-গুলোতে একই টাইপের কিছু প্রবলেম বার বার নিজের মতো কোড করে স্লোভ করে থাকি, আবার এমনও দেখা যাই যে একই প্রবলেমের সমাধান আমরা ভিন্ন ভিন্ন ভাবে করে থাকি। ঠিক আমাদের মতোই ওয়ার্ল্ড ওয়াইড আরো অনেক প্রোগ্রামার বা ডেভলোপার আছেন যারা এই ধরণের প্রবলেম প্রতিনিয়ত সল্ভ করছেন তো এই রকম কমন কিছু প্রবলেমের জন্য রেকমেন্ডেড কিছু সমাধান আছে বড় বড় ডেভলোপেরা তারা রেকমেন্ডেড করেছেন এইগুলোকে বলা হয়ে ডিজাইন প্যাটার্ন তো এটার মানে হচ্ছে এক ধরণের সাজেস্টেড সল্যুশন যে একটা পার্টিকুলার প্রবলেমে পরি তাহলে এই সল্যুশনটি ব্যবহার করতে পারি বা এই ভাবে কোড ডিজাইন করতে পারি। আমাদের বাধ্যতামূলক এমন কোডই লিখতে হবে তা না এই ডিজাইন প্যাটার্নগুলো জানা থাকলে দেখবেন ভালো কোড লেখা আমাদের জন্য সহজ হয়ে যাবে, ও এই ডিজাইন প্যাটার্নগুলো কিন্তু কোন ল্যাঙ্গুয়েজ স্পেসিফিক না আমরা যে ল্যাঙ্গুয়েজই ব্যাবহার করি না কেন আল্টিমেটলি প্রবলেমটা কিন্তু চেঞ্জ হচ্ছে না তো প্রবলেম এর সল্যুশন একই রকম হবে। তো অনেক অনেক ডিজাইন প্যাটার্ন আছে আমরা বেশ কিছু দেখবো তবে আমরা কোডে প্রাকটিক্যাল ভাবে বেশি দেখবো তাহলে বুঝতে সহজ হবে কারণ থিওরি নলেজ এর চেয়ে প্রাকটিক্যাল নলেজ এর গুরুত্ব বেশি তো চলেন ডিজাইন প্যাটার্ন শিখা শুরু করি।

## Singleton Pattern
সিঙ্গেলটন প্যাটার্নের মূল উদ্দেশ্যই হচ্ছে একটা ক্লাসকে বার বার __instantiated__ না করে যেন একটা __instance__, তৈরি করে বার বার ব্যাবহার করা যাই, চলুন বিষয়টি কোডে দেখা যাক।
```php
class Singleton
{
    private static $instance = [];

    private final function __construct() {}

    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new static();
        }
        return self::$instance[$class];
    }
}

class DB extends Singleton
{
    public $data = "DB";

    public function someData(){
        return "Hello World";
    }
}

// $db = new DB; এভাবে ক্লাস instantiated করা যাবে না কারন __construct() মেথডকে আমারা প্রাইভেট করে দিয়েছি।

$db = DB::getInstance(); //getInstance() মেথডটি লক্ষ করে দেখুন আমরা ওই জাগায় অবজেক্ট তৈরি করেছি,
echo $db->someData(); // এজন্য আমরা এখানে অবজেক্ট হিসাবে মেথড কল করতে পারছি । 

/*Output:
    Hello World
*/
```
তো আমরা __Singleton__ ক্লাসে __getInstance()__ মেথডে যে ভাবে লিখেছি তা একটি ক্লাসের জন্য একবারি অবজেক্ট তৈরি করবে যদি আমরা চাই যে একই ক্লাসের মাল্টিপল অবজেক্টের ভ্যালুর উপর ভিত্তি হয়ে আলাদা আলাদা অবজেক্ট তৈরি হবে তাহলে এই [Link](./Singleton/Singleton%201/singleton02.php) উদাহরণটি দেখতে পারেন। সিঙ্গেলটন প্যাটার্ন সম্পর্কে আরো বিস্তারিত বুজতে চাইলে: [Link.](https://youtu.be/-0-nRKXuRJk "Youtube.com")

## Adapter Pattern
আমরা বাসায় সবাই এডাপ্টার ব্যবহার করি তাই না, ধরেন যদি ২ পিন প্লাগ দিয়ে যদি ৩ পিন সকেট থেকে কারেন্ট নিতে চাই তাহলে আমরা কি করি মাঝ খানে আমরা একটি এডাপ্টার ব্যবহার করি। ঠিক এডাপ্টার ডিজাইন প্যাটার্নটি একদম সেম, ধরেন একটা ক্লাস যা আরেকটা  ক্লাসের মধ্যে ফিট হবে না তখন সেটাকে ফিট করানোর জন্য মাঝখানে যে ব্যাপারটা করা হয় তাই হলো এডাপ্টার প্যাটার্ন চলুন কোড দেখে বিষয়টি আরও ভালো ভাবে বুজা যাক।
```php
interface PaymentGateway{
    function sendPayment($payment);
}

class PaymentProcessor{
    private $gateway;
    function __construct(PaymentGateway $pg){
        $this->gateway = $pg;
    }
    function purchaseProduct($amount){
        $this->gateway->sendPayment($amount);
    }
}

class PayPal implements PaymentGateway{
    function sendPayment($payment){
        echo "{$payment} Dollar Processed From Paypal";
    }
}

$paypal = new PayPal();
$pp = new PaymentProcessor($paypal);
$pp->purchaseProduct(50);
/*OutPut
50 Dollar Processed From Paypal
*/
```
তো দেখুন আমরা পেমেন্ট করার জন্য পেপাল নিলাম এবং ধরে নেন আমরা অনেক জাগায় পেপাল ক্লাস এবং তার sendPayment() মেথড ব্যবহার করে ফেলেছি একটা সাডেন পর দেখা গেলো আমাদের আর পেপাল দিয়ে কাজ হচ্ছে না আমাদের বিকাশ বা নগদ লাগবে কিন্তু তাদের মধ্যে sendPayment() মেথড নাই অন্য মেথড তারা ব্যবহার করেছে বিষয়টা আরো ক্লিয়ার ভাবে বুঝার জন্য নিচের কোড দেখুনঃ
```php
class Bkash{
    function makePayment($amount, $currency=null){
        echo "{$amount} Processed From Bkash";
    }
}
```
এখন আমাদের কাজ হচ্ছে এই __Bkash__ ক্লাসকে __PaymentProcessor__ ক্লাসের সাথে ব্যবহার করা তো আমরা __Bkash__ ক্লাসকে ডিরেক্ট ব্যাবহার করতে পারব না কারণ এটি Payment Gateway ইন্টারফেস ইমপ্লিমেন্ট করে নাই তো এটা সমাধান করার জন্য এই দুটোর মধ্যে একটা ব্রিজ তৈরী করা দরকার এটাই হলো এডাপ্টার প্যাটার্ন তো ব্রিজিং ব্যাপারটা কোডে দেখা যাকঃ
```php
class BkashAdapter implements PaymentGateway{
    private $bkash;
    function __construct(Bkash $bkash){
        $this->bkash = $bkash;
    }

    function sendPayment($payment){
        $this->bkash->makePayment($payment);
    }
}
$bkash = new Bkash();
$bkashAdapter = new BkashAdapter($bkash);
$pp = new PaymentProcessor($bkashAdapter);
$pp->purchaseProduct(300);
/*
300 Processed From Bkash
*/
```
লক্ষ করে দেখুন ব্রিজিংটা আমরা কি ভাবে করেছি __BkashAdapter__ ক্লাসকে __PaymentGateway__ ধারা ইমপ্লিমেন্ট করে তার অ্যাবস্ট্রাক্ট __sendPayment()__ মেথড থেকে __Bkash__ ক্লাসের __makePayment()__ মেথডকে ডেকে দিয়েছি। সম্পূর্ণ কোডটি এক সাথে দেখার জন্য [Link.](./Adapter/adapter.php) আরও এডাপ্টার প্যাটার্ন সম্পর্কে জানতে বুঝতে গুগল ইউটিউব করে দেখে নিবেন।

## Decorator Pattern
নামটা পড়েই বোঝা যাচ্ছে এটার বেসিক্যালি কি কাজ করবে এটা হচ্ছে, সোজা কোথায় বলতে গেলে বিদ্যমান একটি অবজেক্ট নেই তার কোনো আউটপুট নেই এবং সে অউটপুটটাকে নতুন ভাবে মোডিফাই করে নতুন ভাবে ডিসপ্লে করে আরও ছোট ভাবে বলতে গেলে সে একটা আউটপুট এর স্টাইল বা প্রেসেন্টেশন চেঞ্জ করে চলেন একদম ছোট একটা এক্সামপ্লে এক্সাম্পল দিয়ে বিষয়টা সহজে বুঝিঃ
```php
class Name{
    function getName(){
        echo "My name is Ifte Hossain";
    }
}

class NameDecorator{
    public $name;
    function __construct(Name $name)
    {
        $this->name = $name;
    }

    function getName(){
        echo $this->name->getName() . " Badhon";
    }
}

$n = new Name;
$nd = new NameDecorator($n);
$nd->getName();

/*Output
My name is Ifte Hossain Badhon
/*
```
মুল ব্যাপারটা এতটুকুই এখন আমরা কনসেপ্টটা নিয়ে জটিল জটিল জায়গায় বা কোডে কাজ করতে পারি। আরেকটি সুন্দর এক্সাম্পল দেখার জন্য [লিংক](./Decorator/decorator.php "Link") আর অবশ্যই অবশ্যই ডেকোরেটর প্যাটার্ন নিয়ে গুগল ইউটিউব করে আরো এক্সাম্পল দেখে নেবেন তাহলে বিষয়টা নিয়ে ক্লিয়ার হয়ে যাবেন।