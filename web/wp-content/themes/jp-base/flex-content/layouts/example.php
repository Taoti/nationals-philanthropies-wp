<?php
### Most layouts will retrieve the field values with get_sub_field() and feed those as arguments to one of the modules, then render the module. Modules are supposed to make it easy to reuse components in different parts of the site.

use Modules\Example;

$args = array(
    'args_will_go_here' => get_sub_field('sub_field_name'),
);
$example_object = new Example($args);
$example_object->render();


########################################
########################################
########################################


### ALTERNATIVELY, if a module seems overkill for this layout you can add the HTML/PHP here. Especially if this would be the only place the module would be used.
?>

<?php if( get_sub_field('example') ): ?>
<div class="example">
	<div class="example-inner">

		<?php if( get_sub_field('example_heading') ): ?>
			<h2 class="example-heading"><?php echo get_sub_field('example_heading'); ?></h2>
		<?php endif; ?>

		<?php
		// More fields as necessary
		?>

	</div>
</div>
<?php endif; ?>
