<?php
$pageTitle = __('Browse Newspapers');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
$db = get_db();

$newspapersTable = $db->getTable('NewspapersNewspaper');

$newspaperIds = array();
foreach (loop('collections') as $collection) {
    $newspaper = $newspapersTable->findByCollection($collection->id);
    $newspaperIds[] = $newspaper->id;
    
}

$allStats = $newspapersTable->getStats(array('newspaperIds' => $newspaperIds));
?>

<h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h1>

<?php echo pagination_links(); ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Date Added')] = 'added';
?>
<!-- 
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>
 -->
<div style='clear:both'>
<p>Statistics presented here reflect the newspapers on the current page.
    The full data is on the <a href='/overall-newspaper-statistics'>Overall Statistics page</a></p> 
</div>
<?php

    echo $this->partial('newspapers-stats.php', 
           array(
               'stats' => $allStats,
           ));
?>

<?php foreach (loop('collections') as $collection): ?>
<?php 
    $newspaper = $newspapersTable->findByCollection($collection->id);
    $stats = $newspapersTable->getStats(array('newspaperIds' => array($newspaper->id)));
?>
<div class="collection record">

    <h2><?php echo link_to_collection(); ?></h2>
    <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
        <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
    <?php endif; ?>

    <div class="collection-meta">

        <div class="collection-description">
            <?php
                echo $this->partial('newspapers-stats.php', 
                       array(
                           'stats' => $stats,
                           'newspaper' => $newspaper,
                           'collection' => $collection,
                       ));
            ?>
        </div>

    <?php if ($collection->hasContributor()): ?>
    <div class="collection-contributors">
        <p>
        <strong><?php echo __('Contributors'); ?>:</strong>
        <?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?>
        </p>
    </div>
    <?php endif; ?>
    <div class='newspaper-links'>
        <p class="chronam-linkback"><a target='_blank' href='<?php echo "http://chroniclingamerica.loc.gov/lccn/{$newspaper->lccn}"; ?>'>More info on Chronicling America</a></p>
        <p class="view-items-link"><?php echo link_to_items_browse(__('Newspapers from %s', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id'))); ?></p>
    </div>
    <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>

    </div>

</div><!-- end class="collection" -->

<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
