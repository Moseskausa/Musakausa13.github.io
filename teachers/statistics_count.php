<?php 
session_start();
if (!isset($_SESSION["user_id"])){
	header("Location: ../login_teacher.php");
}
include '../config.php';
error_reporting(0);

//$sql="SELECT * FROM exm_list";

  $course_id = $_POST['exid'];
    // Perform further actions based on the selected category
    

$sql ="SELECT e.exname,r.firstname, r.lastname, r.gender,r.organisation, r.district, r.duration FROM `exm_list` e
JOIN `registeredtrainingmap` r ON r.trainingid = e.exid
WHERE e.exid = '$course_id'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Select training </title>
    <link rel="stylesheet" href="css/dash.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script language="javascript" type="text/javascript">

  function exportToExcel() {
  var location = 'data:application/vnd.ms-excel;base64,';
  var excelTemplate = '<html> ' +
    '<head> ' +
    '<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/> ' +
    '</head> ' +
    '<body> ' +
    document.getElementById("table-conatainer").innerHTML +
    '</body> ' +
    '</html>'
  window.location.href = location + window.btoa(excelTemplate);

  alert("Download to begin shortly ");
}

</script>  

   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-diamond'></i>
      <span class="logo_name">Welcome</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dash.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="exams.php">
            <i class='bx bx-book-content' ></i>
            <span class="links_name">Trainings</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
          <i class='bx bxs-bar-chart-alt-2'></i>
            <span class="links_name">Results</span>
          </a>
        </li>
        <li>
          <a href="records.php">
           <i class='bx bxs-user-circle'></i>
            <span class="links_name">Records</span>
          </a>
        </li>
        <li>
          <a href="messages.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="settings.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
        </li>
        <li>
          <a href="help.php">
            <i class='bx bx-help-circle' ></i>
            <span class="links_name">Help</span>
          </a>
        </li>
        <li class="log_out">
        <a href="../logout.php">
            <i class='bx bx-log-out-circle' ></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Trainer's Dashboard</span>
      </div>
      <div class="profile-details">
      <img src="<?php echo $_SESSION['img'];?>" alt="pro">
        <span class="admin_name"><?php echo $_SESSION['fname'];?></span>

      </div>
    </nav>

    <div class="home-content">
      <div class="stat-boxes">
      <div id="table-conatainer" class="recent-stat box" style="padding: 0px 0px;width:100%;">
               <table>
                    <thead>
                        <tr>
                            <th>Training no.</th>
                            <th>training</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>Organisation</th>
                            <th>District</th>
                            <th>Duration</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        if(mysqli_num_rows($result) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $row['exname'];?></td>
                                <td><?php  echo $row['firstname']; ?></td>
                                <td><?php  echo $row['lastname']; ?></td>
                                <td><?php  echo $row['organisation']; ?></td>
                                <td><?php  echo $row['district']; ?></td>
                                <td><?php  echo $row['duration']; ?></td>
                                <td>
                                   
                                </td>
                            </tr>
                        <?php
                          
                            } 
                        }
                        ?>


                    </tbody>


                </table>


          <div class="box">
          <div class="right-side">
          <div class="box-topic">Total number of trained participants</div>
          <div class="number"><?php  $sql="SELECT COUNT(e.exname),r.firstname, r.lastname, r.gender,r.organisation, r.district, r.duration FROM `exm_list` e
          JOIN `registeredtrainingmap` r ON r.trainingid = e.exid
          WHERE e.exid = '$course_id'"; $result = mysqli_query($conn, $sql); $rows = mysqli_fetch_array($result); echo $rows['0'];?></div>
          <div class="brief">
           
           <form method="post" action="">


          <button type="submit" name="excelbutton" class="btn" onclick="exportToExcel(this)">download</button>

          <?php  
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Something posted
                  
                 if (isset($_POST['excelbutton'])) {

                   
         
                 

               } else {
                 // Assume no data to download
                 }
               }                 

           ?>
           </form>  
       



            <!--<button type="submit" name="excelbutton" class="btn">download</button>-->


            
          <div>
            
          </div>

          </div>
          </div>
          
        </div>


        </div>
      </div>
    </div>
  </section>

<script src="../js/script.js"></script>


</body>
</html>

