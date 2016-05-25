<?php
$statsStyle = '';
if (isset($statsProps)) {
    
    foreach($statsProps as $key => $value) 
        $statsStyle .= "$key: $value; ";
}



?>

<table class='stats' style="<?php echo $statsStyle; ?>">
    <thead>
        <th>Width</th>
        <th>Height</th>
        <th>Columns</th>
        <th>Pages</th>
    </thead>
    <tbody>
        <td><?php echo $frontPage->page_width; ?></td>
        <td><?php echo $frontPage->page_height; ?></td>
        <td><?php echo $frontPage->columns; ?></td>
        <td><?php echo $issue->pages; ?></td>
    </tbody>
</table>


<div class='newspaper-data-wrapper front-page'>
    <div class='svg'>
        <?php echo $frontPage->dimensionsSvg(); ?>
    </div>
</div>


