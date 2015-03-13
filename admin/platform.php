<?php
include_once '../config.php';
include_once '../header.php';


if(!empty($_POST)){

    if($_POST['id']) {
        $query = 'UPDATE platforms SET
                    name = "' . mysql_real_escape_string($_POST['name']) . '"
                        WHERE id = ' . mysql_real_escape_string($_POST['id']);

        mysql_query($query);

    } else {
        $query = 'INSERT INTO platforms(name) VALUES(
                        "' . mysql_real_escape_string($_POST['name']) . '"';

        $id = mysql_query($query);

        header('location:platform.php?id='.$id);
    }

}
?>

    <h2>Edit Platform</h2>

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

            <?php
            $query = 'SELECT * FROM platform WHERE id = '.$_GET['id'];

            $result = mysql_query($query);

            while ($row = mysql_fetch_assoc($result)) {
                ?>
                <input name="id" id="id" value="<?php echo $row['id']?>" type="hidden">
                <div class="panel">
                    <form class="form-horizontal" id="content_form" method="post">
                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">Title</label>

                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $row['name'] ?>" class="form-control" id="name" name="name" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>
                </div>

            <?php
            }
            ?>

        </div>

    </div>


<?php
include_once '../footer.php';
?>