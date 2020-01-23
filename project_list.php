<!DOCTYPE html>
<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
if(!isset($_SESSION['id'])){
    header("Location:signin.php");
}
?>
   
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Projects</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            table {
              width:100%;
            }
            table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
            }
            th, td {
              padding: 15px;
              text-align: center;
            }
            table#t01 tr:nth-child(even) {
              background-color: #111;
            }
            table#t01 tr:nth-child(odd) {
             background-color: #fff;
            }
            table#t01 th {
              background-color: black;
              color: white;
            }
        </style>
    </head>
    <body>
        <nav>
            <img src="logo.png" width="150" height="80">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="project.php">Submit Project</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
       <div class="card" style="width: 80rem; margin-top:100px; margin-left:110px;">
          <div class="card-body">
            <table>
                <thead>
                    <th style="text-align: center">Roll No</th>
                    <th style="text-align: center">Name</th> 
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Project Name</th>
                    <th style="text-align: center">Git-link</th>
                </thead>
                <tbody>
                    <?php
                    $connection = mysqli_connect('localhost','root','','website');
                    $query = "SELECT * FROM project ORDER BY roll";

                    $select_all_query = mysqli_query($connection,$query);
                    if(!$select_all_query)
                    die(mysqli_error($connection)." ".mysqli_errno($connection));

                    while($row = mysqli_fetch_array($select_all_query)){
                        if($_SESSION['id'] == $row['roll'])
                        {
                    ?>
                        <tr class="table-success">
                        <td><a href="edit.php"><?php echo $row['roll']; ?> </a> </td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['p_name']; ?></td>
                        <td><a href="<?php echo $row['git_link']; ?>">Tap to go</a></td>
                        </tr>
                    <?php   
                        }
                        else
                        {
                    ?>
                        <tr>
                        <td><?php echo $row['roll']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['p_name']; ?></td>
                        <td><a href="<?php echo $row['git_link']; ?>">Tap to go</a></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
          </div>
        </div>

    </body>
</html>