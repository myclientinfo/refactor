<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/superhero/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">

    <h1>Wicked Games <i class="fa fa-gamepad"></i></h1>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
<?php
$contentPages = [
  '/preview_list.php','/review_list.php','/news_list.php','/preview.php','/review.php','/news.php'
];
?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $_SERVER['PHP_SELF'] == '/index.php' ? 'active' : ''?>"><a href="/">Home</a></li>
                    <li class="dropdown<?php echo in_array($_SERVER['PHP_SELF'], $contentPages) ? ' active' : ''?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Content <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/review_list.php">Reviews</a></li>
                            <li><a href="/preview_list.php">Previews</a></li>
                            <li><a href="/news_list.php">News</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $_SERVER['PHP_SELF'] == '/search.php' ? 'active' : ''?>"><a href="/search.php">Search</a></li>
                    <li class="<?php echo $_SERVER['PHP_SELF'] == '/contact.php' ? 'active' : ''?>"><a href="/contact.php">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

