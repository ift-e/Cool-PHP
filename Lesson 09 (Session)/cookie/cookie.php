<?php
setcookie('username', 'hasin', time() + 300, '/cookie');
// echo $_COOKIE['username'];
setcookie('data', 'Hello World', time() + 300);
setcookie("array[id]", '1', time() + 300);
setcookie("array[name]", 'ifte', time() + 300);
print_r($_COOKIE['array']);
?>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

<script>
    alert(Cookies.get('data2'));
</script>