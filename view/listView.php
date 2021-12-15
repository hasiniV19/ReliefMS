<?php
use app\controller\listView\BoxView;

/** @var $boxes */
/** @var $title */
?>

<style>
    <?php include "css/list.css" ?>
</style>
<div class="container">
    <h1 class="title"><?php echo $title?></h1>
    <div class="row">
        <?php foreach ($boxes as $box){
            echo "
                <div class='box-container col-12 col-lg-4 col-md-6'>
                    <div class='box'>
                        <h2 class=''>";
            echo $box->getBoxTitle();

            echo "</h2>";
            $boxStatus = strtolower($box->getBoxStatus());
            if($boxStatus === "medical" || $boxStatus === "approved"){
                echo "<div class='status-bar border border-success text-success'>";
            } else if($boxStatus === "declined"){
                echo "<div class='status-bar border border-danger text-danger'>";
            }else{
                echo "<div class='status-bar border border-warning text-warning'>";
            }
            echo $boxStatus;
            echo        "</div>
                        <a class='link ' href='' >View</a>
                    </div>
                </div>    
            
            ";
        }?>

    </div>
</div>



