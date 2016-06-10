<?php
$statsStyle = '';
if (isset($statsProps)) {
    
    foreach($statsProps as $key => $value) 
        $statsStyle .= "$key: $value; ";
}



?>

<?php

$baseFrontPageUrl = WEB_ROOT . '/items/browse';

if ( isset($newspaper)) {
    $baseFrontPageUrl .= "?newspaper_id=" . $newspaper->id . "&";
} else {
    $baseFrontPageUrl .= "?";
}

$columnsLink = $baseFrontPageUrl. 'columns='. $frontPage->columns;
$pagesLink = $baseFrontPageUrl. 'pages='. $frontPage->pages;
?>


<table class='stats' style="<?php echo $statsStyle; ?>">
    <thead>
        <th>Width</th>
        <th>Height</th>
        <th>Columns</th>
        <th>Pages</th>
    </thead>
    <tbody>
        <td><?php echo $frontPage->getWidth(); ?></td>
        <td><?php echo $frontPage->getHeight(); ?></td>
        <td><a href='<?php echo $columnsLink; ?>'><?php echo $frontPage->columns; ?></a></td>
        <td><a href='<?php echo $pagesLink; ?>'><?php echo $issue->pages; ?></a></td>
    </tbody>
</table>




