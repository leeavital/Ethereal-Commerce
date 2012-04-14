<?php get_header(); ?>

<h2>Showing Results For <?php echo $_GET["q"] ?></h2>
<br />

<?php while ($epc_query->hasNext()): ?>
<?php echo $epc_query->current()->name; ?> 
for only: 
<i><?php p_price(); ?></i>
<br />
<?php echo $epc_query->current()->description; ?>

<br />
<br />

<?php $epc_query->next(); ?>
<?php endwhile ?>

<?php get_footer(); ?>
