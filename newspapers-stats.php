<?php if(isset($collection)): ?>
<div class='newspaper-basic-data'>
<span>Start Year</span>: <?php echo metadata($collection, array('Newspaper Metadata', 'start_year')); ?>
<span>End Year</span>: <?php  echo metadata($collection, array('Newspaper Metadata', 'end_year')); ?>
<span>Total Issues: <?php echo $newspaper->issues_count; ?></span>
<span>Newspapers Imported (N): <?php echo $collection->totalItems(); ?> </span>
</div>

<?php endif; ?>

<?php

$baseFrontPageUrl = WEB_ROOT . '/items/browse';

if ( isset($newspaper)) {
    $baseFrontPageUrl .= "?newspaper_id=" . $newspaper->id . "&";
} else {
    $baseFrontPageUrl .= "?";
}

$maxColumnsLink = $baseFrontPageUrl. 'columns='. $stats['maxColumns'];
$minColumnsLink = $baseFrontPageUrl. 'columns='. $stats['minColumns'];
$avgColumnsLink = $baseFrontPageUrl. 'columns='. $stats['avgColumns'];

$maxWidthLink = $baseFrontPageUrl. 'width='. $stats['maxPageWidth'];
$minWidthLink = $baseFrontPageUrl. 'width='. $stats['minPageWidth'];
$avgWidthLink = $baseFrontPageUrl. 'width='. $stats['avgPageWidth'];

$maxHeightLink = $baseFrontPageUrl. 'columns='. $stats['maxPageHeight'];
$minHeightLink = $baseFrontPageUrl. 'columns='. $stats['minPageHeight'];
$avgHeightLink = $baseFrontPageUrl. 'columns='. $stats['avgPageHeight'];


?>

<table class='newspaper-data-wrapper newspapers'>
    <tr>
        <td></td>
        <th>Columns</th>
        <th>Width</th>
        <th>Height</th>
    </tr>

    <tr class='max'>
        <td>Max</td>
        <td><a href='<?php echo $maxColumnsLink; ?>'><?php echo $stats['maxColumns']; ?></a></td>
        <td><a href='<?php echo $maxWidthLink; ?>'><?php echo round($stats['maxPageWidth'] / 1200, 2); ?>"</a></td>
        <td><a href='<?php echo $maxHeightLink; ?>'><?php echo round($stats['maxPageHeight'] / 1200, 2); ?>"</a></td>
    </tr>
    <tr class='min'>
        <td>Min</td>
        <td><a href='<?php echo $minColumnsLink; ?>'><?php echo $stats['minColumns']; ?></a></td>
        <td><a href='<?php echo $minWidthLink; ?>'><?php echo round($stats['minPageWidth'] / 1200, 2); ?>"</a></td>
        <td><a href='<?php echo $minHeightLink; ?>'><?php echo round($stats['minPageHeight'] / 1200, 2); ?>"</a></td>
    </tr>
    <tr class='avg'>
        <td>Average</td>
        <td><a href='<?php echo $avgColumnsLink; ?>'><?php echo round($stats['avgColumns']);?></a></td>
        <td><a href='<?php echo $avgWidthLink; ?>'><?php echo round($stats['avgPageWidth'] / 1200, 2); ?>"</a></td>
        <td><a href='<?php echo $avgHeightLink; ?>'><?php echo round($stats['avgPageHeight'] / 1200, 2); ?>"</a></td>
    </tr>
    <tr class='sd'>
        <td>Standard Deviation</td>
        <td><?php echo $stats['stdColumns']; ?></td>
        <td><?php echo round( $stats['stdPageWidth'] / 1200, 2); ?></td>
        <td><?php echo round( $stats['stdPageHeight'] / 1200, 2); ?></td>
    </tr>
</table>



