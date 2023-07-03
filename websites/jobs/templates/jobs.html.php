<ul>
<?php foreach ($jobs as $job) { ?>
    <li>
        <div class="details">
            <h2><?php $job['title'] ?></h2>
            <h3><?php $job['salary'] ?></h2>
            <p>Category: <?= $job->getCategory ?> </p>
            <p>Location: <?= $job['location'] ?> </p>
            <p><?php nl2br($job['description']) ?></p>
            <a class="more" href="">Apply for this job</a>
        </div>
    </li>
<?php } ?>
</ul>