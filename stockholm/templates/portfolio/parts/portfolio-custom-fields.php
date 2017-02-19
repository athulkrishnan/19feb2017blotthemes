<?php
$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
if (is_array($portfolios) && count($portfolios)){
	usort($portfolios, "comparePortfolioOptions");
	foreach($portfolios as $portfolio) {
		?>
		<div class="info portfolio_single_custom_field">
			<?php if($portfolio['optionLabel'] != "") { ?>
				<h6 class="info_section_title"><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
			<?php } ?>
			<p>
				<?php if($portfolio['optionUrl'] != "") {  ?>
					<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
						<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
					</a>
				<?php } else { ?>
					<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
				<?php } ?>
			</p>
		</div> <!-- close div.info.portfolio_single_custom_field -->
	<?php
	}
}
?>