<?php get_header(); ?>

<?php while ($epc_query->hasNext()):  ?>


<a href="<?= p_href();  ?>">
<?php p_title(); ?> <br />
</a>
<?php p_description(); ?> <br />
<?php p_controls(); ?> <br />

<?php p_category(); ?>

<br />
<br />
<br />

<?php $epc_query->next(); ?>
<?php endwhile ?>
	

<?php get_footer(); ?>
