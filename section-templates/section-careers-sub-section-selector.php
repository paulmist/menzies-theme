<?php 
// Section template for Careers Sub Page Section Selector
?>
<?php $section = get_field('tab'); ?>
<?php $unique_identifier = get_field('unique_identifier'); ?>
<div class="container-fluid" id="careers-main-tab-selector">

	<div class="row">

		<div class="col-12">
			<div class="section-button-container <?php echo $unique_identifier; ?>">
				<?php if ( $section ) { ?>
					<?php if( have_rows('tab') ):
								$count= 1;
								while ( have_rows('tab') ) : the_row();
						?>
						<?php $tab_colour = get_sub_field('tab_colour'); ?>
						<?php $tab_text_colour = get_sub_field('tab_text_colour'); ?>
					<button class="count-<?php echo $count; ?> wp-block-button wp-block-button__link" style="background-color:rgb(<?php echo $tab_colour; ?>); color:rgb(<?php echo $tab_text_colour; ?>);">
						<?php $title = get_sub_field('title'); ?>
						  <strong><?php echo $title; ?></strong>
					</button>
					<script>
						$(".<?php echo $unique_identifier; ?> .count-<?php echo $count; ?>").click(function(){
						  $(".section").not(this).removeClass("active");
							$(".accordian-wrapper").removeClass("active");
							$('.accordian-container').css('height','80');
							$(".accordian-wrapper .info").removeClass("active");
							$(".accordian-sub-wrapper").removeClass("active");
							$(".accordian-sub-wrapper .info").removeClass("active");
							$(".sub-content").removeClass("active");
							$(".section-content-container .section").removeClass("active");
						  $("button[class^='count-']").removeClass("active");
						  $(".section-content-container.<?php echo $unique_identifier; ?> .info-count-<?php echo $count; ?>").addClass("active");
						  $(this).addClass("active");
						});
					</script>
				<?php $count++; endwhile; endif; ?>
	          <?php } ?>
			</div>	
			<div class="section-content-container <?php echo $unique_identifier; ?>">
				<?php if ( $section ) { ?>
					<?php if( have_rows('tab') ):
								$count= 1;
								while ( have_rows('tab') ) : the_row();
						?>
					<div class="section info-count-<?php echo $count; ?>">
						<?php $content = get_sub_field('content'); ?>
							  <?php echo $content; ?>
					</div>
				<?php $count++; endwhile; endif; ?>
	          <?php } ?>
			</div>	
		</div>
	</div>
	
</div>