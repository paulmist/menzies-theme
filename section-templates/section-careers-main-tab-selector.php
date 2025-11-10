<?php 
// Section template for Careers Main Page Tab Selector
?>
<?php $tab = get_field('tab'); ?>
<?php $unique_identifier = get_field('unique_identifier'); ?>
<div class="container-fluid" id="careers-main-tab-selector">

	<div class="row">

		<div class="col-12">
			<div class="accordian-container <?php echo $unique_identifier; ?>">
				<?php if ( $tab ) { ?>
					<?php if( have_rows('tab') ):
								$count= 1;
								while ( have_rows('tab') ) : the_row();
						?>
					<div class="accordian-wrapper">
						<?php $title = get_sub_field('title'); ?>
						<?php $content = get_sub_field('content'); ?>
						<?php $tab_colour = get_sub_field('tab_colour'); ?>
						<?php $tab_text_colour = get_sub_field('tab_text_colour'); ?>
						  <p class="top-p" style="background-color:rgb(<?php echo $tab_colour; ?>);color:rgb(<?php echo $tab_text_colour; ?>)"><strong><?php echo $title; ?></strong></p>
							<div class="info">
							  <?php echo $content; ?>
							</div>
					</div>
				<?php $count++; endwhile; endif; ?>
	          <?php } ?>
			</div>	
		</div>
		<script>
			$(".<?php echo $unique_identifier; ?> .accordian-wrapper").click(function(){
			  	$(".accordian-wrapper").not(this).removeClass("active");
				$(".accordian-wrapper .info").not($(this).find(".info")).removeClass("active");
				$(".accordian-sub-wrapper").removeClass("active");
				$(".accordian-sub-wrapper .info").removeClass("active");
				$(".sub-content").removeClass("active");
				$(".section-button-container .wp-block-button").removeClass("active");
				$(".section-content-container .section").removeClass("active");
				$(this).toggleClass("active");
				$('.accordian-container').css('height','80');
				$(".<?php echo $unique_identifier; ?>").removeClass("active");
				$(this).parent(".<?php echo $unique_identifier; ?>").addClass("active");
				$(this).parent('.<?php echo $unique_identifier; ?>.active').css('height',$(this).children('.info').height() + 80);
			  $(this).children(".info").addClass("active");
			});
		</script>
		
	</div>
	
</div>