<div class="collection record">
    <?php
    $title = metadata($collection, array('Dublin Core', 'Title'));
    $description = metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    
    
    
    
    
    <h3><?php echo link_to($this->collection, 'show', strip_formatting($title)); ?></h3>

<p>Total issues: <?php echo $newspaper->issues_count; ?> Front Pages: <?php echo $collection->totalItems(); ?></p>
<p><a href='<?php echo $locLink; ?>'>More info on Chronicling America</a></p>

<?php echo link_to_items_browse(__('Front pages from %s', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?>
<?php 
    echo $this->partial('newspapers-stats.php', 
           array(
               'stats' => $stats,
               'newspaper' => $newspaper,
           ));
?>
    
</div>
