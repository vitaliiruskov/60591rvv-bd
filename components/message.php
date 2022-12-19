<div class="container">
    <h1 >
        <p class="error">
            <?php
            if ($message){
                echo ($message);
            }
            if ($_SESSION['message']){
                echo ($_SESSION['message']);
                $_SESSION['message'] = null;
            }
            ?>
        </p>
    </h1>
</div>
