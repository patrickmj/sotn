<?php
if (!empty($formActionUri)):
    $formAttributes['action'] = $formActionUri;
else:
    $formAttributes['action'] = url(array('controller'=>'items',
                                          'action'=>'browse'));
endif;
$formAttributes['method'] = 'GET';


$statesArray = array(
    "Alabama" => "Alabama",
    "Alaska" => "Alaska",
    "Arizona" => "Arizona",
    "Arkansas" => "Arkansas",
    "California" => "California",
    "Colorado" => "Colorado",
    "Connecticut" => "Connecticut",
    "Delaware" => "Delaware",
    "District of Columbia" => "District of Columbia",
    "Florida" => "Florida",
    "Georgia" => "Georgia",
    "Hawaii" => "Hawaii",
    "Idaho" => "Idaho",
    "Illinois" => "Illinois",
    "Indiana" => "Indiana",
    "Iowa" => "Iowa",
    "Kansas" => "Kansas",
    "Kentucky" => "Kentucky",
    "Louisiana" => "Louisiana",
    "Maine" => "Maine",
    "Maryland" => "Maryland",
    "Massachusetts" => "Massachusetts",
    "Michigan" => "Michigan",
    "Minnesota" => "Minnesota",
    "Mississippi" => "Mississippi",
    "Missouri" => "Missouri",
    "Montana" => "Montana",
    "Nebraska" => "Nebraska",
    "Nevada" => "Nevada",
    "New Hampshire" => "New Hampshire",
    "New Jersey" => "New Jersey",
    "New Mexico" => "New Mexico",
    "New York" => "New York",
    "North Carolina" => "North Carolina",
    "North Dakota" => "North Dakota",
    "Ohio" => "Ohio",
    "Oklahoma" => "Oklahoma",
    "Oregon" => "Oregon",
    "Pennsylvania" => "Pennsylvania",
    "Rhode Island" => "Rhode Island",
    "South Carolina" => "South Carolina",
    "South Dakota" => "South Dakota",
    "Tennessee" => "Tennessee",
    "Texas" => "Texas",
    "Utah" => "Utah",
    "Vermont" => "Vermont",
    "Virginia" => "Virginia",
    "Washington" => "Washington",
    "West Virginia" => "West Virginia",
    "Wisconsin" => "Wisconsin",
    "Wyoming" => "Wyoming"
)


?>

<form <?php echo tag_attributes($formAttributes); ?>>
    <div id="search-keywords" class="field">
        <?php echo $this->formLabel('keyword-search', __('Search for Keywords')); ?>
        <div class="inputs">
        <?php
            echo $this->formText(
                'search',
                @$_REQUEST['search'],
                array('id' => 'keyword-search', 'size' => '40')
            );
        ?>
        </div>
    </div>
    <div id="search-narrow-by-fields" class="field">
        <div class="label"><?php echo __('Narrow by Specific Fields'); ?></div>
        <div class="inputs">
        <?php
        // If the form has been submitted, retain the number of search
        // fields used and rebuild the form
        if (!empty($_GET['advanced'])) {
            $search = $_GET['advanced'];
        } else {
            $search = array(array('field'=>'','type'=>'','value'=>''));
        }

        //Here is where we actually build the search form
        foreach ($search as $i => $rows): ?>
            <div class="search-entry">
                <?php
                //The POST looks like =>
                // advanced[0] =>
                //[field] = 'description'
                //[type] = 'contains'
                //[terms] = 'foobar'
                //etc
                echo $this->formSelect(
                    "advanced[$i][element_id]",
                    @$rows['element_id'],
                    array(
                        'title' => __("Search Field"),
                        'id' => null,
                        'class' => 'advanced-search-element'
                    ),
                    get_table_options('Element', null, array(
                        'record_types' => array('Item', 'All'),
                        'sort' => 'orderBySet')
                    )
                );
                echo $this->formSelect(
                    "advanced[$i][type]",
                    @$rows['type'],
                    array(
                        'title' => __("Search Type"),
                        'id' => null,
                        'class' => 'advanced-search-type'
                    ),
                    label_table_options(array(
                        'contains' => __('contains'),
                        'does not contain' => __('does not contain'),
                        'is exactly' => __('is exactly'),
                        'is empty' => __('is empty'),
                        'is not empty' => __('is not empty'),
                        'starts with' => __('starts with'),
                        'ends with' => __('ends with'))
                    )
                );
                echo $this->formText(
                    "advanced[$i][terms]",
                    @$rows['terms'],
                    array(
                        'size' => '20',
                        'title' => __("Search Terms"),
                        'id' => null,
                        'class' => 'advanced-search-terms'
                    )
                );
                ?>
                <button type="button" class="remove_search" disabled="disabled" style="display: none;"><?php echo __('Remove field'); ?></button>
            </div>
        <?php endforeach; ?>
        </div>
        <button type="button" class="add_search"><?php echo __('Add a Field'); ?></button>
    </div>

    <div id="search-by-range" class="field">
        <?php echo $this->formLabel('range', __('Search by a range of ID#s (example: 1-4, 156, 79)')); ?>
        <div class="inputs">
        <?php
            echo $this->formText('range', @$_GET['range'],
                array('size' => '40')
            );
        ?>
        </div>
    </div>

    <div class="field">
        <?php echo $this->formLabel('collection-search', __('Search By Newspaper')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'collection',
                @$_REQUEST['collection'],
                array('id' => 'collection-search'),
                get_table_options('Collection')
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('states', 'States'); ?>
        <div class="inputs">
        <?php 
            echo $this->formMultiCheckbox(
                'states',
                @$_REQUEST['states'],
                array(),
                $statesArray
            );
        ?>
        </div>
    </div>
    
    <div class='exact-before-after'>
    <div class="field">
        <?php echo $this->formLabel('columns', 'Exact Columns'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'columns'
            );
        ?>
        </div>
    </div>
    
    
    <div class="field">
        <?php echo $this->formLabel('columns_greater_then', 'Columns greater than'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'columns_greater_than'
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('columns_less_then', 'Columns less than'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'columns_less_than'
            );
        ?>
        </div>
    </div>
    </div>
    
    <div class='exact-before-after'>
    <div class="field">
        <?php echo $this->formLabel('fp_date', 'Exact Date (YYYY-MM-DD)'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'dp_date'
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('fp_date_before', 'Before Date'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'fp_date_before'
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('fp_date_after', 'After Date'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'fp_date_after'
            );
        ?>
        </div>
    </div>
    </div>
    
    
    <div class='exact-before-after'>
    <div class="field">
        <?php echo $this->formLabel('width', 'Approximate width (in inches)'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'width'
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('width_greater_then', 'Width greater than'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'width_greater_than'
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('width_less_then', 'Width less than'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'width_less_than'
            );
        ?>
        </div>
    </div>
    </div>
    
    <div class='exact-before-after'>
    <div class="field">
        <?php echo $this->formLabel('height', 'Approximate height (in inches)'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'height'
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('height_greater_then', 'Height greater than'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'height_greater_than'
            );
        ?>
        </div>
    </div>
    
    <div class="field">
        <?php echo $this->formLabel('height_less_then', 'Height less than'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'height_less_than'
            );
        ?>
        </div>
    </div>
    </div>
    
    
    
    
    
    <?php fire_plugin_hook('public_items_search', array('view' => $this)); ?>
    <div>
        <?php if (!isset($buttonText)) $buttonText = __('Search for Newspaper Front Pages'); ?>
        <input type="submit" class="submit" name="submit_search" id="submit_search_advanced" value="<?php echo $buttonText ?>">
    </div>
</form>

<?php echo js_tag('items-search'); ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.Search.activateSearchButtons();
    });
</script>
