<?php
    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pricing Page</title>
        <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
        <style type="text/css">
            .container { margin-top: 100px;}
            .card { width: 300px; }
            .card:hover {
                -webkit-transform: scale(1.05);
                -moz-transform: scale(1.05);
                -ms-transform: scale(1.05);
                -o-transform: scale(1.05);
                transform: scale(1.05);
                -webkit-transition: all .3s ease-in-out;
                -moz-transition: all .3s ease-in-out;
                -ms-transition: all .3s ease-in-out;
                -o-transition: all .3 ease-in-out;
                transition: all .3s ease-in-out;
            }
            .list-group-item {
                border: 0px;
                padding: 5px;
            }
            .currency {
                position: relative;
                font-size: 25px;
                top: -31px;

            }
        </style>

</head>
<body>
    <div class="container">
        <?php
        $colNum = 1;
            foreach ($products as $productID => $attributes)
            {
                if ($colNum == 1)
                echo '<div class="row">';

            echo' 
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">npr</span>'.($attributes['price']/100).'</h2>
                    </div>
    
                    <div class="card-body text-center">
                        <div class="card-title">
                            <h1>'.$attributes['title'].'</h1>
                        </div>
                        <ul class="list-group">
                        ';

                        foreach($attributes['features'] as $feature)
                            echo '<li class="list-group-item">'.$feature.'</li>';
                            
                        echo '    
                        </ul>
                        <br>
                            <form action="stripeIPN.php?id='.$productID.'" method="POST">
                              <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                
                                data-key="'.$stripeDetails['publishableKey'].'"
                                data-amount="'.$attributes['price'].'"
                                data-name="'.$attributes['title'].'"
                                data-description="Widget"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                              </script>
                            </form>
                    </div>
    
                
            </div>
            ';

                if ($colNum = 3) {
                    echo '</div> <br>';
                    $colNum = 0;
                } else
                    $colNum++;
            }
        ?>
             
    </div>
</body>
</html>