<?php
include_once 'header.php';
include_once 'config.php';

$query = 'SELECT c.*, g.name as genre, p.name as platform , t.name as type FROM content AS c
            LEFT JOIN genres AS g ON g.id = c.genre_id
            LEFT JOIN platforms AS p ON p.id = c.platform_id
            LEFT JOIN types AS t ON t.id = c.type_id
              WHERE publish_date < NOW()
              AND t.name = "News"';

$result = mysql_query($query);
?>
<h2>News</h2>

<div class="index">
    <?php while ($row = mysql_fetch_assoc($result)) {?>

        <?php
        switch($row['type']){
            case 'Review': $class = 'primary';
                break;
            case 'Preview': $class = 'info';
                break;
            default: $class = 'success';
                break;
        }
        $type = strtolower($row['type']);
        ?>

        <div class="panel panel-<?php echo $class ?>">
            <div class="panel-heading"><h3 class="panel-title"><a href="<?php echo $type ?>.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a> - <?php echo $row['type'] ?></h3></div>
            <div class="panel-body">
                <p><?php echo $row['summary'] ?></p>
            </div>
            <div class="panel-footer">Published on <?php echo date('d M, Y', strtotime($row['publish_date']))?></div>
        </div>

    <?php } ?>
</div>
<?php
include_once 'footer.php';
?>