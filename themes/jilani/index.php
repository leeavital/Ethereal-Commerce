<?php get_header(); ?>

		

			
			
			<div class = "special_deal">		

<br />			

				<img class = "special_deal_img" src = "<?php p_image_url(); ?>" />

				<div class = "special_deal_txt">

					<span class = "special_deal_price"><?php p_price(); ?></span>

					<div class = "title"><a href = "<?php p_href(); ?>"><?php p_title(); ?></a></div>

					<div class = "special_deal_info">
						<?php p_description(); ?>
					</div>

				</div>

			</div>

			<?php $epc_query->next(); ?>

			<div class = "related_boxes clearfix">

				<?php for($i = 0; $i < 4; $i++): ?>
				<span class = "related_product">

					<img src = "<?php p_image_url(); ?>" />

					<div class = "related_product_info"><a href ="<?php p_href(); ?>"><?php p_title(); ?></a>

						<div class = "related_product_price"><?php p_price(); ?></div>

					</div>

					

					

				</span>
				<?php $epc_query->next();  ?>
				<?php endfor; ?>
<!--
				<span class = "related_product">

					<img src = "images/stock.jpg" />

					<div class = "related_product_info"><a href ="#">{Cologne Name}</a>

						<div class = "related_product_price">$16.99</div>

					</div>

					

					

				</span>

				<span class = "related_product">

					<img src = "images/stock.jpg" />

					<div class = "related_product_info"><a href ="#">{Cologne Name}</a>

						<div class = "related_product_price">$16.99</div>

					</div>

					

					

				</span>

				<span class = "related_product">

					<img src = "images/stock.jpg" />

					<div class = "related_product_info"><a href ="#">{Cologne Name}</a>

						<div class = "related_product_price">$16.99</div>

					</div>

					

					

				</span>
-->
			</div>	

			

				

		

		</div>

		

	</div>

	<?php get_footer(); ?>