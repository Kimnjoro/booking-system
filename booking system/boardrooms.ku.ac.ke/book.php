<?php
// Database connection
$servername = "localhost"; // change to your server name
$username = "root"; // change to your MySQL username
$password = ""; // change to your MySQL password
$dbname = "kenyattaversity"; // the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch building names from the database
$sql = "SELECT 'name' FROM buildings";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kenyatta University  Boardroom Booking System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link
    rel="stylesheet"
      href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

        <script>
            webshims.setOptions('forms-ext', {
                types: 'date'
            });
            webshims.polyfill('forms forms-ext');
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
        <script src="ajax.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("names").change(function() {
                    var building_name = $('#names').val();
                    

                    $.ajax({
                        type: "POST",
                        url: "ajax_boardroom.php",
                        data: {"names":names},
                        dataType: "json",
                        success: function(data) {
                            $(".boardroom").append("<option value='"+data[i]+"'>"+data[i]+"</option>");
                        }
                    });
                });
            });
        </script>
    </head>
    <!--    The following is the user accessibility script  -->
    <script>
        (function(d) {
            var s = d.createElement("script");
            /* uncomment the following line to override default position*/
            s.setAttribute("data-position", 1);

            s.setAttribute("data-account", "peHkTc4v1K");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            (d.body || d.head).appendChild(s);
        }
        )(document)
        $(document).ready(function() {
            $("#datte").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
        $(document).ready(function() {
            $('.form-control serv').select2();
        });

    </script>
    <!--  Accessibility SCRIPT ENDS      -->
    <body>
        <div class="container" style="display:block;overflow:auto;">
            <div class="container-fluid" style="background-color:#003366; border-radius: 5px;">
                <img class="img-responsive center-block" src="logo.png" width="500px" alt="KU logo">
            </div>
            <div class="container-fluid text-left" style="background-color:#FFFFCC; border-radius: 5px; min-height:400px;">
                <!----------  navigation ------------------------->
                <ul class="nav nav-pills">
                    <li role="presentation"<!-- class="active" --> <a href="index.php"><< Back Home</a></li>
                </ul>
<!--------------------- 0 0 0 0 0 -------------------->
<h3>
    <b>Boardroom Request Form</b>
</h3>
<form action="_book.php" method="post" name="booking_form">
    <hr style="width: 100%; color: black; height: 1px; background-color:black;"/>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 text-right">
            <label>Meeting Name:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="m_name" required/>
        </div>
        <div class="col-sm-2 text-right">
            <label>Meeting Purpose:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="m_purpose" required/>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <p>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 text-right">
            <label>Preferred Location:</label>
        </div>
        <div class="col-sm-3">
            <select name="location" class="form-control location" id="building" required>
                <option selected="selected" value="">--Select Building--</option>
                <?php
                // // PHP code to fetch building names from the database
                // $servername = "localhost"; // change to your server name
                // $username = "root"; // change to your MySQL username
                // $password = ""; // change to your MySQL password
                // $dbname = "kenyattaversity"; // the name of your database

                // // Create connection
                // $conn = new mysqli($servername, $username, $password, $dbname);

                // // Check connection
                // if ($conn->connect_error) {
                //     die("Connection failed: " . $conn->connect_error);
                // }

                // // Fetch building names from the database
                // $sql = "SELECT building_name FROM building";
                // $result = $conn->query($sql);

                // // Display building options dynamically
                // if ($result->num_rows > 0) {
                //     while ($row = $result->fetch_assoc()) {
                //         echo "<option value='" . $row['names'] . "'>" . $row['names'] . "</option>";
                //     }
                // }
                ?>
            </select>
        </div>
        <div class="col-sm-2 text-right">
            <label>Preferred Boardroom:</label>
        </div>
        <div class="col-sm-3">
            <select name="boardroom" class="form-control boardroom" id="boardroom" required>
                <option selected="selected" value="">--Select Boardroom--</option>
                <?php
                // // PHP code to fetch building names from the database
                // $servername = "localhost"; // change to your server name
                // $username = "root"; // change to your MySQL username
                // $password = ""; // change to your MySQL password
                // $dbname = "kenyattaversity"; // the name of your database

                // // Create connection
                // $conn = new mysqli($servername, $username, $password, $dbname);

                // // Check connection
                // if ($conn->connect_error) {
                //     die("Connection failed: " . $conn->connect_error);
                // }

                // // Fetch building names from the database
                // $sql = "SELECT boardroom_name FROM ";
                // $result = $conn->query($sql);

                // // Display building options dynamically
                // if ($result->num_rows > 0) {
                //     while ($row = $result->fetch_assoc()) {
                //         echo "<option value='" . $row['names'] . "'>" . $row['names'] . "</option>";
                //     }
                // }
                ?>
            </select>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 text-right">
            <label>Date:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" id="datepicker" class="form-control date_input" name="datte" required/>
        </div>
        <div class="col-sm-2 text-right">
            <label>No.Of People :</label>
        </div>
        <div class="col-sm-3">
            <input type="text" name="noofpeople" class="form-control ed" required/>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <p>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 text-right">
            <label>Start Time:</label>
        </div>
        <div class="col-sm-3">
            <select class="unit form-control" name="starttime" required>
                <option selected></option>
                <option value="6:00 AM">6:00 AM</option>
                <option value="6:30 AM">6:30 AM </option>
                <option value="7:00 AM">7:00 AM </option>
                <option value="7:30 AM">7:30 AM </option>
                <option value="8:00 AM">8:00 AM</option>
                <option value="8:30 AM">8:30 AM </option>
                <option value="9:00 AM">9:00 AM </option>
                <option value="9:30 AM">9:30 AM </option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:30 AM">10:30 AM </option>
                <option value="11:00 AM">11:00 AM </option>
                <option value="11:30 AM">11:30 AM </option>
                <option value="12:00 PM">12:00 PM</option>
                <option value="12:30 PM">12:30 PM </option>
                <option value="1:00 PM">1:00 PM </option>
                <option value="1:30 PM">1:30 PM </option>
                <option value="2:00 PM">2:00 PM</option>
                <option value="2:30 PM">2:30 PM </option>
                <option value="3:00 PM">3:00 PM </option>
                <option value="3:30 PM">3:30 PM </option>
                <option value="4:00 PM">4:00 PM</option>
                <option value="4:30 PM">4:30 PM </option>
                <option value="5:00 PM">5:00 PM </option>
                <option value="5:30 PM">5:30 PM </option>
                <option value="6:00 PM">6:00 PM </option>
                <option value="6:30 PM">6:30 PM </option>
                <option value="7:00 PM">7:00 PM </option>
                <option value="7:30 PM">7:30 PM </option>
                <option value="8:00 PM">8:00 PM </option>
            </select>
        </div>
        <div class="col-sm-2 text-right">
            <label>End Time :</label>
        </div>
        <div class="col-sm-3">
            <select class="unit form-control" name="stoptime" required>
                <option selected></option>
                <option value="6:00 AM">6:00 AM</option>
                <option value="6:30 AM">6:30 AM </option>
                <option value="7:00 AM">7:00 AM </option>
                <option value="7:30 AM">7:30 AM </option>
                <option value="8:00 AM">8:00 AM</option>
                <option value="8:30 AM">8:30 AM </option>
                <option value="9:00 AM">9:00 AM </option>
                <option value="9:30 AM">9:30 AM </option>
                <option value="10:00 AM">10:00 AM</option>
                <option value="10:30 AM">10:30 AM </option>
                <option value="11:00 AM">11:00 AM </option>
                <option value="11:30 AM">11:30 AM </option>
                <option value="12:00 PM">12:00 PM</option>
                <option value="12:30 PM">12:30 PM </option>
                <option value="1:00 PM">1:00 PM </option>
                <option value="1:30 PM">1:30 PM </option>
                <option value="2:00 PM">2:00 PM</option>
                <option value="2:30 PM">2:30 PM </option>
                <option value="3:00 PM">3:00 PM </option>
                <option value="3:30 PM">3:30 PM </option>
                <option value="4:00 PM">4:00 PM</option>
                <option value="4:30 PM">4:30 PM </option>
                <option value="5:00 PM">5:00 PM </option>
                <option value="5:30 PM">5:30 PM </option>
                <option value="6:00 PM">6:00 PM </option>
                <option value="6:30 PM">6:30 PM </option>
                <option value="7:00 PM">7:00 PM </option>
                <option value="7:30 PM">7:30 PM </option>
                <option value="8:00 PM">8:00 PM </option>
            </select>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <p>
    <hr>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 text-right">
            <label>Your Name:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="sender_name" required/>
        </div>
        <div class="col-sm-2 text-right">
            <label>Corporate Email:</label>
        </div>
        <div class="col-sm-3">
            <input type="email" name="mail" class="form-control" required/>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <p>
    <p>
        <div class="col-sm-1"></div>
    </div>
    <p>
    <hr>
    <div class="row">
        <div class="col-sm-3 text-right">
            <label for="comment" class="form-group">Any Required Services ?:</label>
        </div>
        <div class="col-sm-3">
    <select name="services[]" class="form-control serv" id="dept" multiple required>
        <option select>--Select Service--</option>
        <option value="item">Projector</option>
        <option value="item">Laptop</option>
        <option value="item">HDMI</option>
        <option value="item">Mandazi</option>
    </select>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#dept').select2({
        placeholder: "--Select Service--",
        allowClear: true
    });
});
    </div>
    </div>
    <p>
    <div class="row">
        <div class="col-sm-12"></div>
        <button type="submit" name="booking" class="btn btn-primary center-block">Submit Your Request</button>
    </div>
</div><p>
</form>
<div class="container-fluid text-center" style="background-color:#003366; border-radius: 5px;">
    <font color="#FFFFFF">&copy;2024 Kenyatta University</font>
</div>
</div></body></html>

