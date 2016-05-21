


<table class='newspaper-data-wrapper newspapers'>
    <tr>
        <td></td>
        <th>Columns</th>
        <th>Width</th>
        <th>Height</th>
    </tr>
    <tr class='avg'>
        <td>Average</td>
        <td><?php echo round($stats['avgColumns']); ?></td>
        <td><?php echo $stats['avgPageWidth']; ?></td>
        <td><?php echo $stats['avgPageHeight']; ?></td>
    </tr>
    <tr class='max'>
        <td>Max</td>
        <td><?php echo $stats['maxColumns']; ?></td>
        <td><?php echo $stats['maxPageWidth']; ?></td>
        <td><?php echo $stats['maxPageHeight']; ?></td>
    </tr>
    <tr class='min'>
        <td>Min</td>
        <td><?php echo $stats['minColumns']; ?></td>
        <td><?php echo $stats['minPageWidth']; ?></td>
        <td><?php echo $stats['minPageHeight']; ?></td>
    </tr>
    
    <tr class='sd'>
        <td>SD</td>
        <td><?php echo $stats['stdColumns']; ?></td>
        <td><?php echo $stats['stdPageWidth']; ?></td>
        <td><?php echo $stats['stdPageHeight']; ?></td>
    </tr>
</table>



