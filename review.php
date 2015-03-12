<?php
include_once 'header.php';
include_once 'config.php';

$query = 'SELECT c.*, g.name as genre, p.name as platform , t.name as type FROM content AS c
            LEFT JOIN genres AS g ON g.id = c.genre_id
            LEFT JOIN platforms AS p ON p.id = c.platform_id
            LEFT JOIN types AS t ON t.id = c.type_id
              WHERE publish_date < NOW()
              AND c.id = '.$_GET['id'];

$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {?>

    <h2>Review - <?php echo $row['title'] ?></h2>

    <p class="text-muted">Published on <?php echo date('d M, Y', strtotime($row['publish_date']))?> - Reviewed on <?php echo $row['platform'] ?></p>

    <?php echo $row['content'] ?>

    <div class="well">
        <div class="rating"><?php echo $row['rating'] ?></div>
        <p><?php echo $row['summary'] ?></p>
    </div>
<?php
}
include_once 'footer.php';
?>