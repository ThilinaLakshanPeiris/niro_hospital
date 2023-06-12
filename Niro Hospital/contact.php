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

        <h1>Contact Us</h1>

        <form method="post" id="contactform">

            <table style=" display: flex; justify-content: center;">

                <tr>
                    <td>
                        <label for="name"><strong>Name:</strong></label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Your Name" id="name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address"><strong>Address:</strong></label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Your Address" id="address" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email"><strong>Email:</strong></label>
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="Your email" id="email" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone"><strong>Telphone:</strong></label>
                    </td>
                    <td>
                        <input type="text" name="phone" placeholder="Your phone Number" id="phone" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="msg"><strong>Message:</strong></label>
                    </td>
                    <td>
                        <textarea  name="msg" placeholder="Type Your Message Here" id="msg" required></textarea>
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
        <a href="edit.php"><button >EDIT</button></a>
        
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