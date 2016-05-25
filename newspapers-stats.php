<?php if(isset($collection)): ?>
<div class='newspaper-basic-data'>
<span>Start Year</span>: <?php echo metadata($collection, array('Newspaper Metadata', 'start_year')); ?>
<span>End Year</span>: <?php  echo metadata($collection, array('Newspaper Metadata', 'end_year')); ?>
<span>Total Issues: <?php echo $newspaper->issues_count; ?></span>
<span>Newspapers Imported (N): <?php echo $collection->totalItems(); ?> </span>
</div>

<?php endif; ?>

<?php
//put in advanced search urls for these
//stats + the newspaper?
$maxColumnsLink = 'maxColumns';
$minColumnsLink = 'minColumns';
$avgColumnsLink = 'avgColumns';

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
        <td><?php echo $stats['maxPageWidth']; ?></td>
        <td><?php echo $stats['maxPageHeight']; ?></td>
    </tr>
    <tr class='min'>
        <td>Min</td>
        <td><a href='<?php echo $minColumnsLink; ?>'><?php echo $stats['minColumns']; ?></a></td>
        <td><?php echo $stats['minPageWidth']; ?></td>
        <td><?php echo $stats['minPageHeight']; ?></td>
    </tr>
    <tr class='avg'>
        <td>Average</td>
        <td><a href='<?php echo $avgColumnsLink; ?>'><?php echo round($stats['avgColumns']);?></a></td>
        <td><?php echo $stats['avgPageWidth']; ?></td>
        <td><?php echo $stats['avgPageHeight']; ?></td>
    </tr>
    <tr class='sd'>
        <td>Standard Deviation</td>
        <td><?php echo $stats['stdColumns']; ?></td>
        <td><?php echo $stats['stdPageWidth']; ?></td>
        <td><?php echo $stats['stdPageHeight']; ?></td>
    </tr>
</table>



