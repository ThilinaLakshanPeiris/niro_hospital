<?php include("db.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <style>
        .container {
            margin: 20px auto;
            width: 100%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            text-align: center;
        }
        
        h1 {
            margin-top: 0;
        }

        p {
            margin-bottom: 0;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            /* background-color: aqua; */
            background-color: #f9f9f9;
        }

        tr {
            margin-top: 100px;
            padding-top: 100 px;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php include "nav.php" ?>

        <h1>EDIT RESPONSE</h1>

        <?php
		// Check connection
		$sql = "SELECT * FROM contact";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {
				echo "" . $row["id"] . " " . $row["name"] . " " . $row["phone"] . "" ;
				echo '<a href="' . "edit.php?id=" . $row["id"] . '" >  edit</a>' . "<br/>";
			}
			
		} else {
			echo "0 results";
		}
		// $conn->close();
        $sql = "SELECT * FROM contact where id=".htmlspecialchars($_GET["id"]);
			$result = $conn->query($sql);
        global $id,$name,$address,$email,$phone,$msg;

			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {
					$id=$row["id"];
					$name= $row["name"];
					$address=$row["address"];
					$email=$row["email"];
					$phone=$row["phone"];
					$msg=$row["msg"];
				  
				}
			} 
		?>

        <form method="post" id="contactform">

            <table style=" display: flex; justify-content: center;">

                <tr>
                    <td>
                        <label for="name"><strong>ID:</strong></label>
                    </td>
                    <td>
                        <input type="text" name="id"  id="id" readonly="readonly" value='<?php echo  htmlspecialchars($_GET["id"]); ?>'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name"><strong>Name:</strong></label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Your Name" id="name" value='<?php echo $name; ?>'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address"><strong>Address:</strong></label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Your Address" id="address" value='<?php echo $address; ?>'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email"><strong>Email:</strong></label>
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="Your email" id="email" value='<?php echo $email; ?>'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone"><strong>Telphone:</strong></label>
                    </td>
                    <td>
                        <input type="text" name="phone" placeholder="Your phone Number" id="phone" value='<?php echo $phone; ?>'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="msg"><strong>Message:</strong></label>
                    </td>
                    <td>
                        <textarea  name="msg" id="msg"><?php echo $msg; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <button type="submit" name="submit" id="submit" >SUBMIT</button>
                    </td>

                </tr>

            </table>
        </form>
        
        <br>
        <?php
            // Insert Data to the database (niro_hospital)
            if(isset($_POST['submit'])){

                $name=$_POST['name'];
                $address=$_POST['address'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $msg=$_POST['msg'];
               
                $sql = "INSERT INTO contact (name, address, email, phone, msg)
                VALUES ('$name', '$address', '$email', '$phone', '$msg')";
                
                if (mysqli_query($conn, $sql)) {
                echo $name." Your Message Sent successfully...";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            ?>

        <?php include "footer.php" ?>

    </div>

</body>

</html>