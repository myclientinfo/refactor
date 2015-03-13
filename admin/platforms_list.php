<?php
include_once '../header.php';
include_once '../config.php';

$query = 'SELECT * FROM platforms ORDER BY id';

$result = mysql_query($query);
?>
    <h2>All Platforms</h2>

    <div class="row">

        <div class="col-lg-4">

            <div class="list-group">
                <a href="index.php" class="list-group-item">Admin Home</a>
                <a href="content_list.php" class="list-group-item">Content</a>
                <a href="genres_list.php" class="list-group-item">Genres</a>
                <a href="platforms_list.php" class="list-group-item active">Platforms</a>
            </div>

        </div>

        <div class="col-lg-8">

            <table class="table">
                <?php while ($row = mysql_fetch_assoc($result)) {?>

                    <tr>
                        <td><a href="platform.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
                        <td></td>
                        <td><a href="platform.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                    </tr>

                <?php } ?>
            </table>

        </div>

    </div>

<?php
include_once '../footer.php';
?>