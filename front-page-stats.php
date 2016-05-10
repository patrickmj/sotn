<?php
$statsStyle = '';
if (isset($statsProps)) {
    
    foreach($statsProps as $key => $value) 
        $statsStyle .= "$key: $value; ";
}

?>

<div class='newspaper-data-wrapper front-page'>
    <div class='svg'>
        <?php echo $frontPage->dimensionsSvg(); ?>
    </div>
    <ul class='stats' style="<?php echo $statsStyle; ?>">
        <li>Width: <?php echo $frontPage->page_width; ?></li>
        <li>Height: <?php echo $frontPage->page_height; ?></li>
        <li>Columns: <?php echo $frontPage->columns; ?></li>
        <li>Pages: <?php echo $issue->pages; ?></li>
    </ul>
</div>


