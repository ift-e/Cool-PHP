<p style="margin-bottom: 15px;">
    <a href="index.php?task=report">All Students</a> 
    <?php if (hasPrivilege()) : ?>
        | <a href="index.php?task=add">Add New Students</a>
        <?php endif; ?>
    <?php if(isAdmin()):?>
        | <a href="index.php?task=seed">Seed</a>
    <?php endif; ?>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
        <a href="auth.php?logout=true" class="float-right">Log Out (<?php echo $_SESSION['role']; ?>)</a>
    <?php
    else :
    ?>
        <a href="auth.php" class="float-right">Log in</a>
    <?php
    endif;
    ?>
</p>