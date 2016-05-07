<?php
$db = get_db();

$npTable = $db->getTable('NewspapersNewspaper');

$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
$newspaper = $npTable->findByCollection($collection->id);

$statsArray = $npTable->getStats(array('newspaperIds' => array($newspaper->id)));
$stats = $statsArray[0];

echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); 

?>



<h1><?php echo $collectionTitle; ?></h1>
<p class="view-items-link"><?php echo link_to_items_browse(__('Newspapers from %s', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id'))); ?></p>
<?php 

    echo $this->partial('newspapers-stats.php', 
           array(
               'stats' => $stats,
           ));
?>



<?php echo all_element_texts('collection'); ?>

<div id="collection-items">
</div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
