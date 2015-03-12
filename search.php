<?php
include_once 'header.php';
include_once 'config.php';

if(isset($_POST['search'])) {

    $query = 'SELECT c.*, g.name as genre, p.name as platform , t.name as type FROM content AS c
            LEFT JOIN genres AS g ON g.id = c.genre_id
            LEFT JOIN platforms AS p ON p.id = c.platform_id
            LEFT JOIN types AS t ON t.id = c.type_id
              WHERE publish_date < NOW()
              AND c.title LIKE "%' . $_POST['search'] . '%"';

    $result = mysql_query($query);
    ?>
    <h2>Search for "<?php echo $_POST['search'] ?>"</h2>

    <div class="index">
        <?php while ($row = mysql_fetch_assoc($result)) { ?>

            <?php
            switch ($row['type']) {
                case 'Review':
                    $type = 'primary';
                    break;
                case 'Preview':
                    $type = 'info';
                    break;
                default:
                    $type = 'success';
                    break;
            }
            ?>

            <div class="panel panel-<?php echo $type ?>">
                <div class="panel-heading"><h3 class="panel-title"><?php echo $row['title'] ?>
                        - <?php echo $row['type'] ?></h3></div>
                <div class="panel-body">
                    <p><?php echo $row['summary'] ?></p>
                </div>
                <div class="panel-footer">Published
                    on <?php echo date('d M, Y', strtotime($row['publish_date'])) ?></div>
            </div>

        <?php } ?>
    </div>

<?php

} else {
?>
<h2>Content search</h2>

    <div class="panel">
    <form class="form-horizontal" id="search_form" method="post">
        <div class="form-group">
            <label for="search" class="col-lg-2 control-label">Search for:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="search" name="search" placeholder="search word....">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>

    </form>
    </div>
<?php
}


include_once 'footer.php';
?>