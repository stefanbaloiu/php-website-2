<ul>
    <?php foreach($categories as $cat) { ?>
        <li>
            <a href="/job/categories?page=<?= $cat['name'] ?>"><?php echo $cat['name'] ?></a>
        </li>
    <?php } ?>    
</ul>
