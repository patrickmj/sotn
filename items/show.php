<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<?php 

require(NEWSPAPERS_PLUGIN_DIR . '/helpers/Newspapers_View_Helper_NewspaperImageMarkup.php');

//$fileMarkup = new Omeka_View_Helper_FileMarkup;
$newspapersFileMarkup = new Newspapers_View_Helper_NewspaperImageMarkup;




$db = get_db();
$frontPageTable = $db->getTable('NewspapersFrontPage');
$frontPage = $frontPageTable->findByItemId($item->id);
$issue = $db->getTable('NewspapersIssue')->find($frontPage->issue_id);
$newspaper = $db->getTable('NewspapersNewspaper')->find($issue->newspaper_id);
$files = $item->Files;
$altoOmekaFile = $files[0];
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
   
   <a href="<?php echo metadata($altoOmekaFile, 'uri'); ?>"><?php echo __('LoC ALTO'); ?></a>
   <?php echo $this->partial('front-page-stats.php', 
           array('frontPage' => $frontPage,
                 'issue'     => $issue,
                 'newspapersFileMarkup' => $newspapersFileMarkup,
                 'statsProps' => array('left' => '100px'),
                   ));
   ?>
   <iframe style='position: relative; width: 50%; height:550px; left: 300px; top: -100px' class='ca-container' src='<?php echo $frontPage->pdf_url; ?>' ></iframe>

   
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
