<?php
$db = get_db();
set_current_record('item', $item);
$frontPage = $db->getTable('NewspapersFrontPage')->findByItemId($item->id);
$issue = $db->getTable('NewspapersIssue')->find($frontPage->issue_id);
$newspaper = $db->getTable('NewspapersNewspaper')->find($issue->newspaper_id);
$thumbDown = web_path_to('images/silk-icons/thumb_down.png');
?>
<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <h3><?php echo link_to($item, 'show', strip_formatting($title)); ?></h3>
   <?php if(metadata($item,'Collection Name')): ?>
      <div id="collection" class="element">
        <h3><?php echo __('Newspaper'); ?></h3>
        <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
      </div>
   <?php endif; ?>
   
   <div class='front-page'>
   <?php echo metadata($item, array('Dublin Core', 'Title'));?>
   </div>
   <a target='_blank' href="<?php echo str_replace('.pdf', '', $frontPage->pdf_url); ?>">More info on Chronicling America</a>
   <a target='_blank' href="<?php echo str_replace('.pdf', '/ocr.xml', $frontPage->pdf_url); ?>"><?php echo __('LoC ALTO'); ?></a>
   

    <table class='stats'>
        <thead>
            <th>Pages</th>
            <th>Width</th>
            <th>Height</th>
            <th>Columns</th>
        </thead>
        <tbody>
            <td><?php echo $issue->pages; ?></td>
            <td><?php echo $frontPage->page_width; ?></td>
            <td><?php echo $frontPage->page_height; ?></td>
            <td class='newspapers-columns'><?php echo $frontPage->columns; ?>
                <span class='corrections-button'><img src='<?php echo $thumbDown; ?>'></img>Correct the data:</span>
                <input type='text' size='2' class='columns-correction' />
                <input type='hidden' class='frontpage-id' value='<?php echo $frontPage->id; ?>' />
                <input type='hidden' class='newspaper-id' value='<?php echo $newspaper->id; ?>' />
                <input type='hidden' class='original-columns' value='<?php echo $frontPage->columns; ?>' />
            </td>
        </tbody>
    </table>
    
    <div style='clear:both'></div>
    
    <div class='newspaper-data-wrapper front-page'>
        <div class='svg'>
            <?php echo $frontPage->dimensionsSvg(); ?>
        </div>
    </div>
       
   <iframe class='ca-container' src='<?php echo $frontPage->pdf_url; ?>' ></iframe>

   
   <div style='clear:both'></div>
   
     <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata($item,'has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>

    <!-- Items metadata -->
    <div id="item-metadata">
        <?php echo all_element_texts($item); ?>
    </div>
</div>
