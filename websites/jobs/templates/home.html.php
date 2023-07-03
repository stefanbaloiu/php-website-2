<main class="home">
    <p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</a></p>
	    <section>
		    <h2>Select the type of job you are looking for:</h2>
		    <ul>
			<?php foreach($category as $cat) { ?>
        		<li>
            	    <a href=""><?php $cat['name'] ?></a>
        		</li>
    		<?php } ?> 
		    </ul>
	    </section>
	    <section>
		    <h2>Jobs about to expire:</h2>
		        <ul class= "listing">
			    <?php require 'jobs.html.php' ?>
		        </ul>
</main>