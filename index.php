<?php
//de include om connectie te maken met de database
include 'includes/database.php';
include 'includes/functions.php';

//de header van je HTML pagina
include "header.php"; 
include "includes/filter.php";
?>

<section>
    <div class="container mt-4">
        <div class="row">
            <?php


            if($filter == false){
                $sql = "SELECT * FROM cottages";
            }
            else{

                $sql_add = "";

               if(count($arrFrmFilter) > 0){
                    $sql_add = "AND cf.facility_id in (" . implode (", ", $arrFrmFilter) . ")";
               } 


                $sql = "SELECT * FROM cottages c WHERE c.cottage_id in 
                    (
                        SELECT cottage_id FROM cottages_facilities cf
                        WHERE cf.cottage_id = c.cottage_id " .
                        $sql_add .
                    ")";
            }
            ?>

            <?php

            //$tblCottages = getData($sql, "fetchAll");
            //echo "<pre>"; 
            //var_dump($tblCottages);

            ?>

            <?php
                // foreach($tblCottages AS $cottage) {
                // echo "-------------";
                // var_dump($cottage);
                // echo "-------------";
                // }
            ?>
            <?php if(count($tblCottages) == 0){ ?>


                <div class="col-12">
                    <div class="alert alert-warning" role="alert">Helaas er zijn geen huisjes met de volgende selectie: <?php echo $selection; ?> </div>
                </div>

                <?php } else { ?>

                    <?php foreach($tblCottages AS $cottage) { ?>
                <div class="col-12 col-md-4 mb-4 d-flex align-self-stretch">
                    <div class="card">
                        <img class="card-img-top" src=<?php echo 'images/'. $cottage['cottage_img']; ?> alt="cottage_name"><!-- maak image en naam dynamisch -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $cottage['cottage_name']; ?></h5> <!-- maak naam dynamisch -->
                                <p class="card-text"><?php echo $cottage['cottage_excerpt']; ?></p> <!-- maak omschrijving dynamisch -->
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo $cottage['cottage_price_a']; ?></li><!-- maak prijs volwassenen dynamisch -->
                                    <li class="list-group-item"><?php echo $cottage['cottage_price_c']; ?></li><!-- maak prijs kinderen dynamisch -->
                                </ul>
                                <a href="huisjes.php?cottageID=<?php echo $cottage['cottages_id'];?>" class="btn btn-secondary mt-2">Lees meer...</a><!-- maak href dynamisch -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php }?>
        </div>
    </div>
</section>

<?php 
include 'footer.php';
?>