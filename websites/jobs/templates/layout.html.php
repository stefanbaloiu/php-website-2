<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?php $title ?></title>
	</head>
	<body>
	<header>
        <section>
            <aside>
                <h3>Office Hours:</h3>
                <p>Mon-Fri: 09:00-17:30</p>
                <p>Sat: 09:00-17:00</p>
                <p>Sun: Closed</p>
            </aside>
            <h1>Jo's Jobs</h1>
		</section>
	</header>
	<nav>
	    <ul>
            <li><a href="/job/home">Home</a></li>
            <li>Jobs
                <?php require 'navbar.html.php' ?>
            </li>
            <li><a href="/job/aboutUs">About Us</a></li>
            <li><a href="/job/contactUs">Contact Us</a></li>
        </ul>
        <li><a href="/user/login">Login</a></li>
    </nav>
    <img src="/images/randombanner.php">
        
    <?php $contents ?>

    <footer>
        &copy; Jo's Jobs 2023
    </footer>
    </body>
</html>