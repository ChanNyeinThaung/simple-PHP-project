<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location: login.php");
    exit();
}

if (isset($_GET['delete'])) {
    if ($_GET['delete'] == 'fail') {
        echo "<p>Delete Failed</p>";
    }
}
include 'config/config.php';
$con = $GLOBALS['con'];

$total = $con->query("select * from user");
$total = $total->num_rows;

$limit = 3;
$start = 0;
if (isset($_GET['start'])) {
    $start = $_GET['start'];
}

$next = $start + $limit;
$prev = $start - $limit;
?>
<html>
    <head>
        <title>User List...</title>
    </head>
    <body>
        <a href="logout.php">Log Out</a>
        <table border="1px" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM user order by id limit $start, $limit";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $age = $row['age'];
                        $pword = $row['password'];
                        $role=$row['role'];
                        $image=$row['image'];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $pword; ?></td>
                            <td><?php echo $role; ?></td>
                            <td><img src="upload/<?php echo $image; ?>" height="100"></td>
        <?php
        if ($_SESSION['auth'] == 'admin') {
            ?>
                                <td><a href="user_edit.php?id=
                                <?php echo $id; ?>">Edit</a></td>
                                <td><a href="user_del.php?id=<?php echo $id; ?> &image=<?php echo $image; ?>"
                                       onClick="return confirm('Are you sure?')">Delete</a></td>         
            <?php
        } else if ($_SESSION['auth'] == 'manager') {
            ?>
                                <td><a href="user_edit.php?id=
                                    <?php echo $id; ?>">Edit</a></td>
                                       <?php
                                   }
                                   ?>
                        </tr>
                                <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>
            </tbody>
        </table>
        
        <div class="paging">
            <?php if ($prev < 0) { ?>
                <span>&laquo; Previous</span>
            <?php } else { ?> 
                <a href="?start=<?php echo $prev; ?>">&laquo; Previous</a>
            <?php } ?>

            <?php if ($next >= $total) { ?>
                <span>Next &raquo;</span>
            <?php } else { ?> 
                <a href="?start=<?php echo $next; ?>">Next &raquo;</a>
            <?php } ?>
        </div>

    </body>
</html>