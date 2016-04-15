<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<?php 
$db = get_db();
$frontpage = $db->getTable('NewspapersFrontPage')->findByItemId($item->id);
$issue = $db->getTable('NewspapersIssue')->find($frontpage->issue_id);
$newspaper = $db->getTable('NewspapersNewspaper')->find($issue->newspaper_id);
$files = $item->Files;
$altoOmekaFile = $files[0];
$svgOmekaFile = $files[1];
$svgPath = FILES_DIR . '/' . $svgOmekaFile->getStoragePath();
$svg = file_get_contents($svgPath);
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
        <p>Page Width: <?php echo $frontpage->page_width; ?> </p>
        <p>Pages: <?php echo $issue->pages; ?></p>
        
    </div>


    <div class='sotn-images'>
        <div class='sotn-direct-links'>
            <a href="<?php echo metadata($altoOmekaFile, 'uri'); ?>"><?php echo __('LoC ALTO'); ?></a>
            <a href="<?php echo metadata($svgOmekaFile, 'uri'); ?>"><?php echo __('SVG'); ?></a>
        </div>
        
        <iframe class='ca-container' src='<?php echo $frontpage->pdf_url; ?>' ></iframe>
        
        <div class='svg'>
            
            <?php echo $svg; ?>
        </div>
        
        
    </div>
    <div style='clear:both'></div>
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
