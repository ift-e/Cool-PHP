# SOLID Principles
অবজেক্ট ওরিয়েন্টেড প্রোগ্রামিং এর কিছুটা জটিল টাইপের বিষয়ে বলা যায় SOLID প্রিন্সিপাল।নামটা শুনে বা পড়ে মনে হবে এটা একটা প্রিন্সিপাল কিন্তু আসলে তা না এটা পাঁচটা প্রিন্সিপালের একটা কালেকশন। এই SOLID প্রিন্সিপালের যে পাঁচটা কালেকশন এগুলো এক একটা প্রিন্সিপাল যদি  আপনার কোডে  ইম্প্লেমেন্ট করেন তাহলে আপনি যে প্রোগ্রামটা লিখছেন সেটা অনেক Readable, Maintainable, Extensible সব দিক দিয়ে ভালো হবে, কিন্তু শুনলে বা পড়লে ব্যাপারটা যতটা সহজ মনে হয় ব্যাপারটা ততো সহজ না। তো চলেন আমরা SOLID প্রিন্সিপাল কিছু পড়ি এবং জানি। S.O.L.I.D এই প্রত্যেকটা লেটার কিন্তু এক একটা প্রিন্সিপাল যেমনঃ
### 1. _Single responsibility principle_ 
আমরা যখন একটা ক্লাস লিখবো সে ক্লাসটা যেন একটা পার্টিকুলার কাজই করে অর্থাৎ একটা ক্লাসের মধ্যে জগাখিচুড়ীর মতো বিভিন্ন ধরনের কাজ এক সাথে না করে একটা কাজেরই তার রিলেটেড মেথডগুলো বানিয়ে কাজ করা হোক বা বলা যাই একটা অবজেক্ট দিয়ে একটা কাজই করা হোক, একটা অবজেক্ট দিয়ে মাল্টিপল টাইপের কাজ না করা হোক। চলুন একটা উদাহরণ দেখে বিষয়টা আরেকটু বুজার চেষ্টা করা যাক। প্রথমে আমরা ভুল ধরনের ক্লাস লেখার কোড দেখব তারপর সেটাকে আমরা ইম্প্রুভ করব। একটি ব্লগপোস্ট ক্লাস কল্পনা করুনঃ
```php
class BlogPost
{
    private Author $author;
    private string $title;
    private string $content;
    private \DateTime $date;

    public function getData(): array
    {
        return [
            'author' => $this->author->fullName(),
            'title' => $this->title,
            'content' => $this->content,
            'timestamp' => $this->date->getTimestamp(),
        ];
    }
 
    public function printJson(): string
    {
        return json_encode($this->getData());
    }
 
    public function printHtml(): string
    {
        return `<article>
                    <h1>{$this->title}</h1>
                    <article>
                        <p>{$this->date->format('Y-m-d H:i:s')}</p>
                        <p>{$this->author->fullName()}</p>
                        <p>{$this->content}</p>
                    </article>
                </article>`;
    }
}
```
এখানে ভুলটা কি? এখানে BlogPost ক্লাসটি অনেক কিছু করছে, কিন্তু আমরা জানি একটি ক্লাস একটি জিনিস করা উচিত। এখানে প্রধান সমস্যা হল যে প্রয়োজন হলে বিভিন্ন ফরম্যাট json, html এবং আরও অনেক কিছুতে প্রিন্ট করার জন্য রেস্পন্সিবল হচ্ছে। তাহলে দেখা যাক কিভাবে এটিকে ইম্প্রোভ করা যায়।

আমরা ব্লগপোস্ট ক্লাস থেকে প্রিন্ট মেথডগুলো মুছে ফেলব, বাকিগুলি অপরিবর্তিত থাকবে। এবং আমরা একটি নতুন PrintableBlogPost ইন্টারফেস যোগ করবো এবং ব্লগপোস্ট প্রিন্ট করতে পারে এমন একটি মেথড রাখবো।
```php
interface PrintableBlogPost
{
    public function print(BlogPost $blogPost);
}
```
এখন আমরা এই ইন্টারফেসটিকে আমাদের প্রয়োজন অনুযায়ী অনেক ক্লাসে ব্যাবহার করতে পারবো যেমন:
```php
class JsonBlogPostPrinter implements PrintableBlogPost
{
    public function print(BlogPost $blogPost) {
        return json_encode($blogPost->getData());
    }
}
 
class HtmlBlogPostPrinter implements PrintableBlogPost
{
    public function print(BlogPost $blogPost) {
        return `<article>
                    <h1>{$blogPost->getTitle()}</h1>
                    <article>
                        <p>{$blogPost->getDate()->format('Y-m-d H:i:s')}</p>
                        <p>{$blogPost->getAuthor()->fullName()}</p>
                        <p>{$blogPost->getContent()}</p>
                    </article>
                </article>`;
    }
}
```
তো ফুল ব্যাপারটা দাঁড়ালো BlogPost ক্লাস শুধু ডাটা গুলো নিয়ে কাজ করবে, আর বিভিন্ন ধরনের ফরম্যাটে ডাটা প্রিন্ট করার জন্য ইন্টারফেসটিকে ইমপ্লিমেন্ট করে যার যার ফরম্যাটে ডাটাগুলো দেখিয়ে দিবে। আশা করি Single responsibility principle বুজতে পেরেছেন।

### 2. _Open/Closed principle_
Solid প্রিন্সিপালের দ্বিতীয় প্রিন্সিপাল হলো Open/Closed principle. এটার সাধারণ ব্যাখ্যা হল “code should be open for extension, but closed for modification”. অর্থাৎ আমাদের যখন একটা ক্লাস লেখা হয়ে যাবে এরপর যদি এখানে নতুন নতুন ফীচার অ্যাড করার প্রয়োজন হয় আমরা মেইন ক্লাসের মধ্যে মোডিফাই করবো না, কিন্তু ক্লাসটাকে শুরু বা প্রথম থেকে এমন ভাবে লেখবো যেন ক্লাসে নতুন নতুন ফীচার অ্যাড করা যাই। ব্যাপারটা অনেক প্যাঁচানো মনে হচ্ছে তাই না যে আমরা ক্লাসে নতুন নতুন ফীচার অ্যাড করব কিন্তু মডিফিকেশন করতে পারবো না। চলুন একটা উদাহরণ দেখে বিষয়টা আরেকটু বুজার চেষ্টা করা যাক। প্রথমে আমরা ভুল ভাবে কোড লেখব তারপর সেটাকে আমরা ইম্প্রুভ করব। ধরা যাক আমাদের বিভিন্ন প্রাণীর শ্রেণী রয়েছেঃ 
```php
class Dog
{
    public function bark(): string
    {
        return 'woof woof';
    }
}
class Duck
{
    public function quack(): string
    {
        return 'quack quack';
    }
}
class Cat
{
    public function whatDoesTheCatSay(): string
    {
        return 'meow';
    }
}
```
এবং একটি ক্লাসের ভেতর মেথড লেখবো যেটাতে আর্গুমেন্টে অবজেক্ট পাস করলে  তা প্রাণীদের যোগাযোগ করতে দেয়:
```php 
class Communication
{
    public function communicate($animal): string
    {
        switch (true) {
            case $animal instanceof Dog:
                return $animal->bark();
            case $animal instanceof Duck:
                return $animal->quack();
            case $animal instanceof Cat:
                return $animal->whatDoesTheCatSay();
            default:
                throw new Exception('Unknown animal');
        }
    }
}
```
instanceof ব্যবহার করা হয় একটি অবজেক্ট একটি শ্রেণীর অন্তর্গত কিনা তা পরীক্ষা করার জন্য। যদি অবজেক্টটি instanceof ক্লাসের অন্তর্গত হয় তবে সত্য প্রদান করে, আর যদি এটি না হয় তবে এটি মিথ্যা প্রদান করে।

এখন আমাদের Communication ক্লাসের কোড পরিবর্তন না করে একটি নতুন এনিম্যাল ক্লাস যোগ করতে পারবো? উত্তরঃ না। একটি নতুন এনিম্যাল ক্লাস যোগ করা হলে communicate() ফাংশনে সুইচের পরিবর্তনের প্রয়োজন হবে। তাই আমাদের প্রিন্সিপালের সাথে মেনে চলতে আমাদের কোডটি কেমন হওয়া উচিত? আসুন আমাদের ক্লাসগুলিকে কিছুটা উন্নত করার চেষ্টা করি।
```php
interface Communicative
{
    public function speak(): string;
}
```
আমরা একটি Communicative ইন্টারফেস নিলাম যেটা আমাদের এনিম্যাল ক্লাসগুলো ইন্টারফেসটি ব্যবহার তাদের ভাষা বলতে পারে।
```php
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
```
এর পরে, আমরা Communication ক্লাস পরিবর্তন করতে পারি যাতে এটি ওপেনের/ক্লোস্ড প্রিন্সিপাল মেনে চলে।
```php
class Communication
{
    public function communicate(Communicative $animal): string
    {
        return $animal->speak();
    }
    // another way
    public function communicate($animal): string
    {
        if($animal instanceof Communicative){
            return $animal->speak();
        }else{
            throw new Exception('Unknown animal');
        }
    }
}
```
দেখুন আমরা এখানে type hinting ও instanceof এর মাধ্যেমে আমরা বাছাই করতে পারছি। তো এখন যদি নতুন এনিম্যাল আসলে শুধু Communicative ইন্টারফেসকে ইম্প্লেমেন্ট করবে ব্যাস হয়ে গেল মূল কোডে আর মোডিফাই করা লাগছে না। আশা করি Open/Closed principle বুজতে পেরেছেন।
### 3. _Liskov substitution principle_
Solid প্রিন্সিপালের তৃতীয় প্রিন্সিপাল হলো __Liskov substitution principle__. এই প্রিন্সিপালের অথর হচ্ছে __Barbara Liskov__ উনি যেটা বলেছেন সংক্ষেপে কোথাও যদি পার্টিকুলার টাইপের অবজেক্ট একসেপ্ট করি তাহলে ওই একই জায়গায় ওই অবজেক্টের যদি সাবক্লাস থাকে সেগুলোকেও পেরামিটার হিসাবে পাস করতে পারবো ব্যাপারটা আমরা পার্সোনাল ভাষায় বলতে গেলে ব্যাপারটা এমন যে মেইন ক্লাসের যে সব যোগ্যতা আছে তা সাবক্লাসের থাকতে হবে সাবক্লাসের বেশি যোগ্যতা হলে সমস্যা নাই কিন্তু সাবক্লাসের মধ্যে মেইন ক্লাসের যোগ্যতা থাকতে হবে বাধতামুলক না থাকে তাহলে লিস্কভ সাবস্টিটিউশন ভঙ্গ করবে, তো মেইন ক্লাস এমন ভাবেই লেখতে হবে যে সাবক্লাসের সাথে ওই যোগ্যতাটা যাই, তো কোডে না দেখলে লিস্কভ সাবস্টিটিউশন বুজা কিছুটা জটিল। প্রথমে আমরা ভুল ভাবে কোড লেখব তারপর সেটাকে আমরা ইম্প্রুভ করব। চলেন আমরা পাখি নিয়ে কাজ করিঃ
```php
abstract class Bird{
    abstract function eat();
    abstract function sleep();
    abstract function fly();
}

class BirdManager{
    function MaintainBird(Bird $b){
        $b->eat();
        $b->sleep();
        $b->fly();
    }
}

class Eagle extends Bird{
    function eat(){}

    function sleep(){}

    function fly(){}
}

class Penguin extends Bird{
    function eat(){}

    function sleep(){}

    function fly(){
        throw new Exception("Penguins can't fly,  they walking");
    }

    function walk(){/* walk the bird*/}
}
```
দেখুন পেঙ্গুইন কিন্তু পাখি কিন্তু সে উড়তে পারেনা হাটাহাঁটি করে তো উড়া এবং হাটা এই ব্যাপারটি নিয়ে প্রিন্সিপালটি ভঙ্গ হচ্ছে। প্রিন্সিপালটি যেন ভঙ্গ না করে তার জন্য ইম্প্রোভ কোডঃ
```php
abstract class Bird{
    abstract function eat();
    abstract function sleep();
}

abstract class FlyingBird extends Bird{
    abstract function fly();
}

abstract class WalkingBird extends Bird{
    abstract function walk();
}

class BirdManager{
    function maintain(Bird $b){
        $b->eat();
        $b->sleep();
    }

    function moveFlyingBird(FlyingBird $fb){
        $fb->fly();
    }

    function moveWalkingBird(WalkingBird $wb){
        $wb->walk();
    }

}

class Eagle extends FlyingBird{
    function eat(){}

    function sleep(){}

    function fly(){}
}


class Penguin extends WalkingBird{
    function eat(){}

    function sleep(){}

    function walk(){}
}
```
এখন __Penguin ও Eagle__ দুই পাখিই কিন্তু __Bird__ ক্লাসের সাবক্লাস, দেখুন এখানে __FlyingBird, WalkingBird__ কিন্তু __Bird__ ক্লাস ও মেনে চলছে আবার নতুন বৈশিষ্ট্যও আছে, তো এই কোডটিতে __LSP Principle__ মানছে বা মেইনটেইন হচ্ছে। আপনারা লিস্কভ সাবস্টিটিউশন প্রিন্সিপাল নিয়ে আরেকটু ঘাটাঘাটি করে বুজার চেষ্টা করবেন।

### 4. _Interface segregation principle_
Solid প্রিন্সিপালের চতুর্থ প্রিন্সিপাল হলো __Interface segregation principle__ এই প্রিন্সিপালটি সহজ, সহজ বাংলাই বলতে গেলে একটা ইন্টারফেসের মধ্যে এমন কিছু রাখা উচিত না যেটা কারো কাজে লাগছে না। অনেক কিছু মিলিয়ে একটা ইন্টারফেস বানানোর বদলে ছোট-ছোট যেটুকু যেটুকু লাগে তা দিয়ে মাল্টিপল ইন্টারফেস বানানো বরং বেশি কাজের বা উচিত। তো চলেন এক্সাম্পলের দেখে বিষয়টি আরো ভালো ভাবে বুজা যাক। প্রথমে আমরা ভুল ভাবে কোড লেখব তারপর সেটাকে আমরা ইম্প্রুভ করব।
```php 
interface Exportable
{
    public function getPDF();
    public function getCSV();
}

class Invoice implements Exportable
{
    public function getPDF() {}
    public function getCSV() {}
}
class CreditNote implements Exportable
{
    public function getPDF() {
        throw new \NotUsedFeatureException();
    }

    public function getCSV() {}
}
```
দেখুন Invoice ক্লাসটি থেকে PDF ও CSV ডাউনলোড করতে পারছি, আর CreditNote থেকে শুধু CSV ডাউনলোড করতে পারছি এখানে CreditNote ক্লাসে __getPDF()__ যা অকেজো এটি __Interface segregation principle__ ভঙ্গ করে। আমাদের ইন্টারফেসে এমন মেথড ফোর্স করা উচিত নয় যা অন্যান্য ক্লাসের জন্য অকেজো বা কাজে লাগছে না। ইম্প্রোভ কোডঃ
```php
interface ExportablePdf
{
    public function getPDF();
}

interface ExportableCSV
{
    public function getCSV();
}

class Invoice implements ExportablePdf, ExportableCSV
{
    public function getPDF() {}
    public function getCSV() {}
}

class CreditNote implements ExportableCSV
{
    public function getCSV() {}
}
```
তো এখন CreditNote ক্লাসকে getPDF() নিয়ে মাথা ঘামাতে হচ্ছে না, তার যদি কোন সময় ইচ্ছা হয় PDF ফরম্যাট দিবে তাহলে ExportablePdf ইমপ্লিমেন্ট করে getPDF() মেথডটি দিয়ে দিলেই হবে। দেখলেন মাল্টিপল ইন্টারফেস লেখা কতটা উপকারী। আরেকটি সুন্দর এক্সাম্পল দেখতে চাইলেঃ [লিংক](./is.php "file")

### 5. _Dependency inversion principle_
Solid প্রিন্সিপালের শেষ প্রিন্সিপাল হলো __Dependency inversion principle__. এই প্রিন্সিপাল বলেঃ
* High level modules should not depend on low level modules. both should depend on abstractions.
* Abstractions should not depend on details.  Details should depend upon abstractions.

কত জটিল কথা তাই না মাথা ঘামানোর ঘামানোর দরকার নাই, __Dependency Injection ও Dependency inversion principle__ অলমোস্ট একই জিনিস। __Dependency Injection__ জানতেঃ [লিংক](../Dependency%20Injection)। __Dependency Injection__ শুধু যেটা পাস করতাম তার উপর টাইপ হিন্ট আর এখন হবে অপসারণ গুলোর উপরে মানেঃ __interface, abstract.__ তো চলেন এক্সাম্পলের দেখে বিষয়টি আরো ভালো ভাবে বুজা যাক। প্রথমে আমরা ভুল ভাবে কোড লেখব তারপর সেটাকে আমরা ইম্প্রুভ করব।

একজন ক্লায়েন্ট এসে বললো পেপাল পেমেন্ট গেটওয়ে অ্যাড করে দেও, তো আমরা
```php
class Paypal{
    function process(){
        return "Payment Completed";
    }
}

class Payment{
    function __construct(Paypal $payment){
        $this->payment = $payment;
    }

    function process(){
        return $this->payment->process();
    }
}

$paypal = new Paypal;
$payment = new Payment($paypal);
echo $payment->process();

// output: Payment Completed
```
দেখুন কত সুন্দর Single responsibility principle মেইনটেইন করা ও ডিপেন্ডেন্সি ইনজেকশন করা কোড, কিন্তু সমস্যা কি? হঠাৎ করে যদি ক্লায়েন্ট বলে আমাকে ক্রেডিট কার্ড পেমেন্ট গেটওয়ে দেও তাহলে আমরা নতুন একটা ক্রেডিট কার্ড ক্লাস নিয়ে আবার Payment ক্লাসে গিয়ে টাইপ হিন্ট এর জাগায় paypal বাদ দিয়ে creditCard দিবো যা __Open/Closed principle__ ভঙ্গ করে তো এটার সমাধানের জন্য ডিপেন্ডেন্সি ইনভার্শন। ইম্প্রোভ কোডঃ
```php
abstract class AbstractPayment{
    abstract function process();
}

class Paypal extends AbstractPayment{
    function process(){
        // will do whatever have to do with the payment
        return "Paypal payment Completed..";
    }
}

class CreditCard extends AbstractPayment{
    function process(){
        // will do whatever have to do with the payment
        return "Creadit Card payment Completed..";
    }
}

class Payment{
    function __construct(AbstractPayment $payment){
        $this->payment = $payment;
    }

    function paymentProcess(){
        return $this->payment->process();
    }
}

$creditCard = new CreditCard();
$payment = new Payment($creditCard);
echo $payment->paymentProcess();
// output: Creadit Card payment Completed..

// Again, if customs or client think will pay it with PayPal or other system
$paypal = new Paypal();
$payment = new Payment($creditCard);
echo $payment->paymentProcess();
// output: Paypal payment Completed..
```
লক্ষ করে দেখুন আমরা __Payment__ ক্লাসের মধ্যে অ্যাবস্ট্রাক্ট ক্লাসকে টাইপ হিন্ট করে দিয়েছি যাতে যেকোনো পেমেন্ট গেটওয়ে সিস্টেম অ্যাবস্ট্রাক্ট ক্লাসকে এক্সটেনডস করার পর ব্যাবহার করতে পারে এটাই __Dependency inversion principle__
##### __সলিড প্রিন্সিপাল নিয়ে আরো জানতেঃ [Article->PHP ](https://accesto.com/blog/solid-php-solid-principles-in-php/ "link"),  [Youtube->JAVA](https://youtube.com/playlist?list=PLZ1tJSgII-L-TqDR1e7mi7Qehl_HVJeGn "link"), [Youtube->PHP](https://youtube.com/playlist?list=PL9fcHFJHtFaYbvOwdxMXih0HSGkhM14Lw "link")__ 

#### এই ডিজাইন প্রিন্সিপাল গুলো একদিনে হাতে আসবে না। আপনারা যখন অবজেক্ট ওরিয়েন্টেড ওয়েতে প্রজেক্ট করবেন তখন  প্রিন্সিপাল গুলো খেয়াল রাখবেন এবং কোড লেখে নিজের কোড নিজে রিভিউ করবেন যে কোন কোড গুলো ডিজাইন কোন প্রিন্সিপালে পরলো না তা ধরে ধরে ঠিক করবেন এবং কোনো একটা টাস্ক প্রব্লেম পাওয়ার সাথে সাথে কোড শুরু করে দিবেন না ওই ব্যাপারটা নিয়ে রুট থেকে আগে পরে কি হতে পারে ভেবে কোড করবেন দেখবেন আস্তে আস্তে আপনি জিনিস গুলোর সাথে ফ্লেক্সিবল হয়ে যাচ্ছেন এবং আপনার কোড সুন্দর হচ্ছে।
