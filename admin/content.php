<?php
include_once '../config.php';
include_once '../header.php';


if(!empty($_POST)){

    if($_POST['id']) {
        $query = 'UPDATE content SET
                    title = "' . mysql_real_escape_string($_POST['title']) . '",
                    summary = "' . mysql_real_escape_string($_POST['summary']) . '",
                    content = "' . mysql_real_escape_string($_POST['content']) . '",
                    publish_date = "' . mysql_real_escape_string($_POST['publish_date']) . '",
                    genre_id = "' . mysql_real_escape_string($_POST['genre_id']) . '",
                    platform_id = "' . mysql_real_escape_string($_POST['platform_id']) . '",
                    type_id = "' . mysql_real_escape_string($_POST['type_id']) . '",
                    rating = "' . mysql_real_escape_string($_POST['rating']) . '",
                    active = "' . mysql_real_escape_string($_POST['active']) . '"
                        WHERE id = ' . mysql_real_escape_string($_POST['id']);

        mysql_query($query);

    } else {
        $query = 'INSERT INTO content(title, summary,content, publish_date, genre_id,
                      platform_id, type_id, rating, active) VALUES(
                        "' . mysql_real_escape_string($_POST['title']) . '",
                        "' . mysql_real_escape_string($_POST['summary']) . '",
                        "' . mysql_real_escape_string($_POST['content']) . '",
                        "' . mysql_real_escape_string($_POST['publish_date']) . '",
                        "' . mysql_real_escape_string($_POST['genre_id']) . '",
                        "' . mysql_real_escape_string($_POST['platform_id']) . '",
                        "' . mysql_real_escape_string($_POST['type_id']) . '",
                        "' . mysql_real_escape_string($_POST['rating']) . '",
                        "' . mysql_real_escape_string($_POST['active']) . '")';

        $id = mysql_query($query);

        header('location:content.php?id='.$id);
    }

}
?>

    <h2>Edit Content</h2>


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

            <?php
            $query = 'SELECT c.*, g.name as genre, p.name as platform , t.name as type FROM content AS c
                        LEFT JOIN genres AS g ON g.id = c.genre_id
                        LEFT JOIN platforms AS p ON p.id = c.platform_id
                        LEFT JOIN types AS t ON t.id = c.type_id
                          WHERE publish_date < NOW()
                          AND c.id = '.$_GET['id'];

            $result = mysql_query($query);

            while ($row = mysql_fetch_assoc($result)) {
                ?>

                <div class="panel">
                    <form class="form-horizontal" id="content_form" method="post">

                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">Title</label>

                            <div class="col-lg-10">
                                <input type="text" value="<?php echo $row['title'] ?>" class="form-control" id="title" name="title" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Type</label>
                            <?php
                            $query = 'SELECT * FROM types';
                            $type_result = mysql_query($query);
                            ?>
                            <div class="col-lg-10">
                                <select name="type" id="type">
                                <?php while ($type_row = mysql_fetch_assoc($type_result)) {
                                    ?>
                                    <option value="<?php echo $type_row['id']?>"<?php echo $type_row['id'] == $row['type_id'] ? ' selected="selected"' : '' ?>><?php echo $type_row['name']?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="summary" class="col-lg-2 control-label">Summary</label>

                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="message" name="summary"><?php echo $row['summary']?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-lg-2 control-label">Content</label>

                            <div class="col-lg-10">
                                <textarea class="form-control" rows="10" id="message" name="content"><?php echo $row['content']?></textarea>
                            </div>
                        </div>

                        <fieldset>
                            <legend>Reviews Only</legend>

                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">Genre</label>
                                <?php
                                $query = 'SELECT * FROM genres';
                                $genre_result = mysql_query($query);
                                ?>
                                <div class="col-lg-10">
                                    <select name="genre" id="genre">
                                        <option>Not Applicable</option>
                                        <?php while ($genre_row = mysql_fetch_assoc($genre_result)) {?>
                                            <option value="<?php echo $genre_row['id']?>"<?php echo $genre_row['id'] == $row['genre_id'] ? ' selected="selected"' : '' ?>><?php echo $genre_row['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">Reviewed on</label>
                                <?php
                                $query = 'SELECT * FROM platforms';
                                $platform_result = mysql_query($query);
                                ?>
                                <div class="col-lg-10">
                                    <select name="genre" id="genre">
                                        <option>Not Applicable</option>
                                        <?php while ($platform_row = mysql_fetch_assoc($platform_result)) {?>
                                            <option value="<?php echo $platform_row['id']?>"<?php echo $platform_row['id'] == $row['platform_id'] ? ' selected="selected"' : '' ?>><?php echo $platform_row['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rating" class="col-lg-2 control-label">Rating</label>

                                <div class="col-lg-3">
                                    <input type="text" value="<?php echo $row['rating'] ?>" class="form-control" id="rating" name="rating" placeholder="">
                                </div>
                            </div>
                        </fieldset>

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