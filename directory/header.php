<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5" style="font-family: cursive "><b>Shreemontinee</b></h3>  
        </a>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
            
            <span class="navbar-toggler-icon"></span>
            
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class=" px-5"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                        if(isset($_SESSION['cart'])){
                            $count=count($_SESSION['cart']);
                            echo "<span id=\"card_count\" class=\"text-warning\">$count</span>";
                        }else{
                           
                          echo "<span id=\"card_count\" class=\"text-warning\"></span>";

                        }
                        ?>
                    </h5>
                </a>
            </div>  
        </div>
    </nav>
</header>
