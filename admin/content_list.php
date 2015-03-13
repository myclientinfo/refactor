<?php
include_once '../header.php';
include_once '../config.php';

$query = 'SELECT c.*, g.name as genre, p.name as platform , t.name as type FROM content AS c
            LEFT JOIN genres AS g ON g.id = c.genre_id
            LEFT JOIN platforms AS p ON p.id = c.platform_id
            LEFT JOIN types AS t ON t.id = c.type_id
              ORDER BY publish_date';

$result = mysql_query($query);
?>
    <h2>Latest Content</h2>

    <div class="row">

        <div class="col-lg-4">

            <div class="list-group">
                <a href="index.php" class="list-group-item">Admin Home</a>
                <a href="content_list.php" class="list-group-item active">Content</a>
                <a href="genres_list.php" class="list-group-item">Genres</a>
                <a href="platforms_list.php" class="list-group-item">Platforms</a>
            </div>

        </div>

        <div class="col-lg-8">

            <table class="table">
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

                    <tr>
                        <td><a href="content.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></td>
                        <td></td>
                        <td><a href="content.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                    </tr>

                <?php } ?>
            </table>

        </div>

    </div>

<?php
include_once '../footer.php';
?>