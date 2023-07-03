<main class="sidebar">
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
    <h2>Categories</h2>

			<a class="new" href="/user/categoryAdd">Add new category</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			foreach ($categories as $cat) {
				echo '<tr>';
				echo '<td>' . $category['name'] . '</td>';
				echo '<td><a style="float: right" href="editcategory.php?id=' . $category['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deletecategory.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';
            ?>
    </section>
</main>