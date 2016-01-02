<?php
$db = get_db();
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
$newspaper = $db->getTable('NewspapersNewspaper')->findByCollection($collection->id);
$issues = $db->getTable('NewspapersIssue')->findBy(array('newspaper_id' => $newspaper->id));
$frontPages = array();
foreach($issues as $issue) {
    $frontPages = array_merge($frontPages, $db->getTable('NewspapersFrontPage')->findBy(array('issue_id' => $issue->id)));
    
}

/**
 * Find the minimum and maximum for a column value
 * Result is a 2ple of 'min' and 'max', with 'value' / object pairs for both
 * @param unknown_type $data
 * @param unknown_type $column
 */
function minMax($records, $column)
{
    
    $result = array('min' => array('value', 'record'), 'max' => array('value', 'object'));
    $minIndex = 0;
    $maxIndex = 0;
    
    $minValue = 0;
    $maxValue = 0;
    foreach($records as $index=>$record) {
        $currentValue = metadata($record, $column);
        if ($minValue == 0 ) {
            $minValue = $currentValue;
        }
        
        if ( $currentValue < $minValue) {
            $minValue = $currentValue;
            $minIndex = $index;
        }
        
        if ($currentValue > $maxValue) {
            $maxValue = $currentValue;
            $maxIndex = $index;
        }
    }
    return array('min' => array('value' => $minValue, 'record' => $records[$minIndex]),
                 'max' => array('value' => $maxValue, 'record' => $records[$maxIndex])
            );
    
}

$minMaxPageWidth = minMax($frontPages, 'page_width');

?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>



<h1><?php echo $collectionTitle; ?></h1>
<?php 
$minWidthItem = $db->getTable('NewspapersFrontPage')->findItemByFrontPage($minMaxPageWidth['min']['record']); 
$maxWidthItem = $db->getTable('NewspapersFrontPage')->findItemByFrontPage($minMaxPageWidth['max']['record']);


?>
<p>Min pw: <?php echo $minMaxPageWidth['min']['value']; ?><?php echo link_to($minWidthItem, 'show', metadata($minWidthItem, array('Dublin Core', 'Title')));  ?></p>
<p>Max pw: <?php echo $minMaxPageWidth['max']['value']; ?><?php echo link_to($maxWidthItem, 'show', metadata($maxWidthItem, array('Dublin Core', 'Title')));  ?></p>
<p>Issues: <?php echo count($issues);?></p>
<p>FP widths</p>
<ul>
<?php foreach($frontPages as $frontPage): ?>
<li><?php echo metadata($frontPage, 'page_width'); ?></li>
<?php endforeach; ?>
</ul>
<?php echo all_element_texts('collection'); ?>

<div id="collection-items">
</div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
