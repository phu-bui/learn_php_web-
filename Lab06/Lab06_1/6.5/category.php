<?php
$server = "127.0.0.1";
$username = "root";
$password = "1111";
$my_db = "mydb";

// Create connection
$conn = mysqli_connect($server, $username, $password, $my_db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST["submit"])){
    $cat_id = $_POST["cat_id"];
    $title = $_POST["title"];
    $description = $_POST["description"];

    if($cat_id != null && $title != null && $description != null){
        $sql = "INSERT INTO Category (Category_ID, Title, Description) VALUES ('$cat_id', '$title', '$description')";
        if (mysqli_query($conn, $sql)) {
            echo "New record is inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

?>

<html>
<head><title>Category admin</title></head>
<style>
    table, th, td {
        border: 1px solid #000000;
    }
</style>
<body>
<h2>Category Administration</h2>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <table>
        <tr>
            <th>CatID</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        <?php
        $sql = "SELECT * FROM Category";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" .$row["Category_ID"]."</td>";
                echo "<td>" .$row["Title"]."</td>";
                echo "<td>" .$row["Description"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <tr>
            <td><input type="text" size="15" name="cat_id"></td>
            <td><input type="text" size="30" name="title" ></td>
            <td><input type="text" size="30" name="description"><br/></td>
        </tr>
    </table>
    <input type="submit" value="Add category" name="submit">
</form>

</body>
</html>