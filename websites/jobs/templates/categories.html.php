<main class = "sidebar">
    <section class="left">
        <ul>
			<?php foreach($categories as $cat) { ?>
        		<li>
            		<a href=""><?php $cat['name'] ?></a>
        		</li>
    		<?php } ?> 
		</ul>
    </section>

    <section class="right">
        <h1> <?php $head ?> Jobs</h1>
        <form method="get" action="">
	        <label for="sort">Sort by location:</label>
	        <select name="sort">
		        <?php foreach ($jobs as $job) { ?>
			        <option value="<?php $job['location'] ?>"><?php $job['location'] ?></option>
		        <?php } ?>
	        </select>
			<input type="hidden" name="page" value="<?=$_GET['page']?>" />
	        <input type="submit" name="submit" value="Sort" />
        </form>
        <ul class="listing">
            <?php require 'jobs.html.php';?>
        </ul>
    </section>
</main>