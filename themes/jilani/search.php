<?php get_header(); ?>

<?php while($epc_query->hasNext()): ?>

	<div class = "related_boxes">
			<?php while($epc_query->hasNext()): ?>
				<span class = "related_product">

					<img src = "<?php p_image_url(); ?>" />

					<div class = "related_product_info"><a href ="<?php p_href(); ?>"><?php p_title(); ?></a>

						<div class = "related_product_price"><?php p_price(); ?></div>

					</div>

					

					

				</span>
			<?php $epc_query->next(); ?>
			<?php endwhile; ?>

			</div>	



<?php  $epc_query->next(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>