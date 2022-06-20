# Method Chaining
বিষয়টা খুবই মজাদার এবং দরকারি একটা জিনিস, এক লাইনে Multiple Method ব্যবহার করে অনেক গুলো কাজ এক সাথে করা যায়। একটা মেথডের রিটার্নে যদি একই অবজেক্টে রিটার্ন করি তাহলে একই অবজেক্টের অন্য মেথডগুলো ব্যাবহার করতে পারবো।

### Example
```php
class test {
    function first(){
        echo "This is first method\n";
        return $this;
    }
    function second(){
        echo "This is second method\n";
        return $this;
    }
    function third(){
        echo "This is third method\n";
        return $this;
    }
}

$test = new test;
$test->first()->second()->third();

// Output 
This is first method
This is second method
This is third method
```
উপরে লক্ষ করলে দেখতে পারবেন আমরা প্রতি মেথডের শেষে __return $this__ দিয়েছি , __$this__ মানেই হলো এই একই অবজেক্ট, একই অবজেক্ট রিটার্ন করার কারনে পরের মেথডগুলো ব্যাবহার করতে পারছি। আশা করি বিষয়টি বুঝতে পেরেছেন।

#### আরও সুন্দর একটি উদাহরণ দেখতে [উপরের ফাইলটিতে](./o1.php) চলে যান। :)