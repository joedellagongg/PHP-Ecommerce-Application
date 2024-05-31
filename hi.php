<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php
                    $mysql_esched = "SELECT * from `department`";
                    $query_esched = mysqli_query($conn, $mysql_esched);
                    while ($department_table = mysqli_fetch_array($query_esched)):
                        if ($dept_id == $department_table["id"]):
                ?>
                    <option class="input" name="department" value="<?php echo $department_table["id"]; ?>" selected>
                        <?php echo $department_table["dept_name"] ?>
                    </option>
                <?php endif ?>
                    <option class="input" name="department" value="<?php echo $department_table["id"]; ?>">
                        <?php echo $department_table["dept_name"] ?>
                    </option>
                <?php endwhile ?>
                </select>
                </div>
</body>
</html>