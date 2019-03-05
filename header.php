           <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
              <li class="nav-header">
                    <div class="dropdown profile-element"> 
                    <center>
                            <img alt="image" class="img-circle" src="networking.png">
                             </center>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <center><h2>We Connect</h2> </center> </a>
                    </div>
                </li>
            <?php
            switch ($role) {
            case "admin":
                echo '<li><a href="allcomplaint.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label"> View All Complaints</span> </a></li>';
               echo '  <li >
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label">Corporator</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="addcorporator.php"><i class="fa fa-caret-right"></i>Add Corporator</a></li>
                        <li><a href="viewcorporator.php"><i class="fa fa-caret-right"></i>View Corporator</a></li>
                        
                    </ul>
                </li>';
              break;
           case "user":
                echo '<li><a href="allcomplaint.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label"> View All Complaints</span> </a></li>';
               echo ' <li >
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label">Complaint</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="addcomplaint.php"><i class="fa fa-caret-right"></i>Add Complaint</a></li>
                        <li><a href="viewcomplaint.php"><i class="fa fa-caret-right"></i>View Complaint</a></li>
                        
                    </ul>
                </li>';
                 break;
              case "wardofficer":
                echo '<li><a href="wardofficer.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label">Wardofficer</span> </a></li>';
               
                 break;
             case "corporator":
                echo '<li><a href="corporator.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label">Corporator</span> </a></li>';
               
             break;
             case "division":
                echo '<li><a href="division.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label"> View All Complaints</span> </a></li>';
               
             break;
             case "mayor":
                echo '<li><a href="mayor.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label"> View All Complaints</span> </a></li>';
               
             break;
            case "commissioner":
                echo '<li><a href="commissioner.php"><i class="fa fa-comments-o" aria-hidden="true"></i><span class="nav-label"> View All Complaints</span> </a></li>';
               
             break;


    default:
        echo "No Data Found";
}
?>
                    
                
            </ul>

        </div>
    </nav>
