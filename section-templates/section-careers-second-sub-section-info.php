<?php 
// Section template for Careers Sub Page Section Selector
?>
<?php $info_sections = get_field('tab'); ?>
<?php $unique_identifier = get_field('unique_identifier'); ?>
<div class="container-fluid" id="careers-main-tab-selector">

	<div class="row">

		<div class="col-12">
			<div class="accordian-sub-container <?php echo $unique_identifier; ?>">
				<?php if ( $info_sections ) { ?>
					<?php if( have_rows('tab') ):
								$count= 1;
								while ( have_rows('tab') ) : the_row();
						?>
						<?php $tab_colour = get_sub_field('tab_colour'); ?>
						<?php $tab_text_colour = get_sub_field('tab_text_colour'); ?>
					<div class="accordian-sub-wrapper accordian-sub-wrapper-<?php echo $count; ?>" style="background-color:rgb(<?php echo $tab_colour; ?>);color:rgb(<?php echo $tab_text_colour; ?>)">
						<?php $title = get_sub_field('title'); ?>
						  <strong><?php echo $title; ?></strong>
					</div>
					<script>
						$(".<?php echo $unique_identifier; ?> .accordian-sub-wrapper-<?php echo $count; ?>").click(function(){
						  $(".sub-content").removeClass("active");
							$(".accordian-wrapper").removeClass("active");
							$('.accordian-container').css('height','80');
							$(".accordian-wrapper .info").removeClass("active");
							$(".section-button-container .wp-block-button").removeClass("active");
							$(".section-content-container .section").removeClass("active");
						  $(".accordian-sub-wrapper").not(this).removeClass("active");
							$(".accordian-sub-wrapper .info").not($(this).find(".info")).removeClass("active");
						  $(".sub-content-<?php echo $count; ?>").addClass("active");
						  $(".accordian-sub-wrapper-<?php echo $count; ?>").addClass("active");
						});
					</script>
				<?php $count++; endwhile; endif; ?>
	          <?php } ?>
			</div>	
			<div class="section-sub-content-container">
				<?php if ( $info_sections ) { ?>
					<?php if( have_rows('tab') ):
								$count= 1;
								while ( have_rows('tab') ) : the_row();
						?>
					<div class="sub-content sub-content-<?php echo $count; ?>">
						<?php $content = get_sub_field('content'); ?>
							  <?php echo $content; ?>
					</div>
				<?php $count++; endwhile; endif; ?>
	          <?php } ?>
			</div>	
		</div>
	</div>
	
</div>