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

    <div class="field">
        <h3><?php echo $this->formLabel('collection-search', __('Search By Newspaper')); ?></h3>
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
    
    <div class="field states">
        <h3><?php echo $this->formLabel('states', 'States'); ?></h3>
        <div class="inputs">
        <?php
            echo $this->formMultiCheckbox(
                'states',
                @$_REQUEST['states'],
                array('class' => 'state-input'),
                $statesArray
            );
        ?>
        </div>
    </div>
    
    <h3>Columns</h3>
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
    
    <h3>Dates</h3>
    <div class='exact-before-after'>
    <div class="field">
        <?php echo $this->formLabel('fp_date', 'Exact Date (YYYY-MM-DD)'); ?>
        <div class="inputs">
        <?php 
            echo $this->formText(
                'fp_date'
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
    
    <h3>Width</h3>
    <p>Current (2016-06-15) Average Width: <?php echo round(NEWSPAPERS_AVG_WIDTH / 1200, 2); ?>"</p>
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
    
    <h3>Height</h3>
    <p>Current (2016-06-15) Average Height: <?php echo round(NEWSPAPERS_AVG_HEIGHT / 1200, 2); ?>"</p>
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
    

    <div id="search-by-range" class="field">
        <h3><?php echo $this->formLabel('range', __('Search by a range of Item (i.e, Newspaper Front Page) ID#s (example: 1-4, 156, 79)')); ?></h3>
        <div class="inputs">
        <?php
            echo $this->formText('range', @$_GET['range'],
                array('size' => '40')
            );
        ?>
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
