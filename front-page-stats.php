<?php

$props = array();
$imageType = 'square_thumbnail';

?>


<div class='newspaper-data-wrapper'>

    <div style='float: left; width: 300px;'>
        <?php echo $frontPage->dimensionsSvg(); ?>
    </div>

    <ul>
        <li>Dimensions: <?php echo $frontPage->page_width; ?> x <?php echo $frontPage->page_height; ?></li>
        <li>Columns: <?php echo $frontPage->columns; ?></li>
        <li>Pages: <?php echo $issue->pages; ?></li>
    
    </ul>


</div>