<?php
$db = get_db();

$npTable = $db->getTable('NewspapersNewspaper');

$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
$newspaper = $npTable->findByCollection($collection->id);

$stats = $npTable->getStats(array('newspaperIds' => array($newspaper->id)));

echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); 

?>



<h1><?php echo $collectionTitle; ?></h1>
<?php echo link_to_items_browse(__('Front pages from %s', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?>
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
