<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<?php 
$db = get_db();
$frontpage = $db->getTable('NewspapersFrontPage')->findByItemId($item->id);
$issue = $db->getTable('NewspapersIssue')->find($frontpage->issue_id);
$newspaper = $db->getTable('NewspapersNewspaper')->find($issue->newspaper_id);
?>

<div id="primary">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

   <?php if(metadata('item','Collection Name')): ?>
      <div id="collection" class="element">
        <h3><?php echo __('Newspaper'); ?></h3>
        <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
      </div>
   <?php endif; ?>
   
   <div class='front-page'>
   <?php echo metadata('item', array('Dublin Core', 'Title'));?>
   </div>
   
    <div id='front-page-data'>
        <h2>Front page data</h2>
        <p>Columns: <?php echo $frontpage->columns; ?> </p>
        
    </div>


    <h3><?php echo __('Files'); ?></h3>
    <div id="item-images">
         <?php echo files_for_item(); ?>
    </div>



     <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>

    <!-- Items metadata -->
    <div id="item-metadata">
        <?php echo all_element_texts('item'); ?>
    </div>
    
    
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
