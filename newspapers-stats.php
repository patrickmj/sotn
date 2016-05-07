

<h3>Issues: <?php echo $stats['issues_count']; ?></h3>

<div class='newspaper-data-wrapper newspapers'>
    <div>
        <h3>Average Columns: <?php echo round($stats['avgColumns']); ?></h3>
    </div>

    <div>
        <h3>Max Columns: <?php echo $stats['maxColumns']; ?></h3>
    </div>
    
    
    <div>
        <h3>Min Columns: <?php echo $stats['minColumns']; ?></h3>
    </div>
    
    <div>
        <h3>Columns SD: <?php echo $stats['stdColumns']; ?></h3>
    </div>

    
    <div>
        <h3>Average Width: <?php echo $stats['avgPageWidth']; ?></h3>
    </div>

    
    <div>
        <h3>Min Width: <?php echo $stats['minPageWidth']; ?></h3>
    </div>
    
    
    <div>
        <h3>Max Width: <?php echo $stats['maxPageWidth']; ?></h3>
    </div>
    <div>
        <h3>Page Width SD: <?php echo $stats['stdPageWidth']; ?></h3>
    </div>    
    
    <div>
        <h3>Average Height: <?php echo $stats['avgPageHeight']; ?></h3>
    </div>
    
    
    <div>
        <h3>Min Height: <?php echo $stats['minPageHeight']; ?></h3>
    </div>
    
    <div>
        <h3>Max Height: <?php echo $stats['maxPageHeight']; ?></h3>
    </div>
    <div>
        <h3>Page Height SD: <?php echo $stats['stdPageHeight']; ?></h3>
    </div>
    
</div>