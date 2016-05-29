<?php
$db = get_db();

$npTable = $db->getTable('NewspapersNewspaper');

$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
$newspaper = $npTable->findByCollection($collection->id);

$stats = $npTable->getStats(array('newspaperIds' => array($newspaper->id)));

echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); 
$locLink = rtrim(metadata('collection', array('Newspaper Metadata', 'url')) , '.json');
?>



<h1><?php echo $collectionTitle; ?></h1>

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

<?php echo all_element_texts('collection'); ?>

<div id="collection-items">
</div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
