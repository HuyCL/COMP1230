<?php
require 'model/functions.inc.phtml';
include('model/database.pdo.php');

// Re-direct user to login page until valid login is provided
if(!isset($_SESSION["employeeId"])) {
    header("Location:view/login.phtml");
}

// Variables for creating clients
$compName = '';
$busNum = '';
$fname = '';
$lname = '';
$phNum = '';
$cellNum = '';
$carrier = '';
$hstNum = '';
$website = '';
$type = '';


// Variables for creating employees
$efname = '';
$elname = '';
$eemail = '';
$ecell = '';
$position = '';
$password = '';
$estatus = '';

// variable for creating notification

$nname='';
$ntype='';
$nstatus='';

// This will grab the PAGE the user is on
if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['action'])){
        switch($_POST['action']){
            case "createclient":
                // This process will REQUIRE users to enter Type, brand, model, size and price.
                $compName = validate($_POST['compName']);
                $busNum = validate($_POST['busNum']);
                $fname = validate($_POST['fname']);
                $lname = validate($_POST['lname']);
                $phNum = validate($_POST['phNum']);
                $cellNum = validate($_POST['cellNum']);
                $carrier = validate($_POST['carrier']);
                $hstNum = validate($_POST['hst']);
                $website = validate($_POST['website']);
                $type = validate($_POST['type']);

                // This user_input will be displayed in the URL 
                $user_input = 'compName='.$compName.'&busNum='.$busNum.'&fname='.$fname.'&lname='.$lname.'&phNum='.$phNum.'&cellNum='.$cellNum.'&carrier='.$carrier.'&hst='.$hstNum.'&website='.$website.'&type='.$type;
              
                // If certain fields are not filled out, it will show error on page
                if (empty($compName)){
                    header("Location: ?page=createclient&error=Company Name is required&$user_input");
                }else if (empty($busNum)){
                    header("Location: ?page=createclient&error=Bussines Number is required&$user_input");
                }else if (empty($fname)){
                    header("Location: ?page=createclient&error=First Name is required&$user_input");
                }else if(empty($lname)){
                    header("Location: ?page=createclient&error=Last Name is required&$user_input");
                }else if(empty($phNum)){
                    header("Location: ?page=createclient&error=Phone Number is required&$user_input");
                }else if(empty($cellNum)){
                    header("Location: ?page=createclient&error=Cell Number is required&$user_input");
                }else if(empty($carrier)){
                    header("Location: ?page=createclient&error=Carrier is required&$user_input");
                }else if(empty($hstNum)){
                    header("Location: ?page=createclient&error=HST Number is required&$user_input");
                }else if(empty($website)){
                    header("Location: ?page=createclient&error=Website is required&$user_input");
                }else if(empty($type)){
                    header("Location: ?page=createclient&error=Type is required&$user_input");
                }
                else{
                    // Will echo out the data that will be added to the database
                    echo "<br><br>Adding<br>";
                $row_values = array("'$compName'","'$busNum'","'$fname'","'$lname'","'$phNum'","'$cellNum'","'$carrier'","'$hstNum'","'$website'","'$type'");
                $query="INSERT INTO client (CompanyName,BusinessNumber,contactFirstName,contactlastname,phoneNumber,cellNumber,carrier,HST,website,status1)
                        VALUES($row_values[0],$row_values[1],$row_values[2],$row_values[3],$row_values[4],$row_values[5],$row_values[6],$row_values[7],$row_values[8],$row_values[9]);";
                echo $query;
                $prepared_query=$db_conn->prepare($query);
                $success=$prepared_query->execute();   
                    if($success){
                    // If successful the page will echo the below
                    var_dump($sql_results);
                    echo "<br>Successful Execution of query <br>";
                    }
                // Variables we grab from the user to insert data into data log table
                $emp_id = $_SESSION['employeeId'];
                $date_time = date("Y-m-d h:i:sa");
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $log_query = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                             VALUES ('$emp_id','client','add client','$date_time','$ip_address');";  
                echo $log_query;
                $prepared_log_query=$db_conn->prepare($log_query);
                $log_success=$prepared_log_query->execute();   
                    if($log_success){
                    var_dump($sql_results);
                    echo "<br>Successful Execution of query <br>";
                    } 
                }
                break;
                case "editclient":
                    // This process will REQUIRE users to enter Type, brand, model, size and price.
                    $cid = validate($_GET['cid']);
                    $compName = validate($_POST['compName']);
                    $busNum = validate($_POST['busNum']);
                    $fname = validate($_POST['fname']);
                    $lname = validate($_POST['lname']);
                    $phNum = validate($_POST['phNum']);
                    $cellNum = validate($_POST['cellNum']);
                    $carrier = validate($_POST['carrier']);
                    $hstNum = validate($_POST['hst']);
                    $website = validate($_POST['website']);
                    $type = validate($_POST['type']);

                    // This user_input will be displayed in the URL 
                    $user_input = 'compName='.$compName.'&busNum='.$busNum.'&fname='.$fname.'&lname='.$lname.'&phNum='.$phNum.'&cellNum='.$cellNum.'&carrier='.$carrier.'&hst='.$hstNum.'&website='.$website.'&type='.$type;
                    
                    // If certain fields are not filled out, it will show error on page
                    if (empty($compName)){
                        header("Location: ?page=createclient&error=Company Name is required&$user_input");
                    }else if (empty($busNum)){
                        header("Location: ?page=createclient&error=Bussines Number is required&$user_input");
                    }else if (empty($fname)){
                        header("Location: ?page=createclient&error=First Name is required&$user_input");
                    }else if(empty($lname)){
                        header("Location: ?page=createclient&error=Last Name is required&$user_input");
                    }else if(empty($phNum)){
                        header("Location: ?page=createclient&error=Phone Number is required&$user_input");
                    }else if(empty($cellNum)){
                        header("Location: ?page=createclient&error=Cell Number is required&$user_input");
                    }else if(empty($carrier)){
                        header("Location: ?page=createclient&error=Carrier is required&$user_input");
                    }else if(empty($hstNum)){
                        header("Location: ?page=createclient&error=HST Number is required&$user_input");
                    }else if(empty($website)){
                        header("Location: ?page=createclient&error=Website is required&$user_input");
                    }else if(empty($type)){
                        header("Location: ?page=createclient&error=Type is required&$user_input");
                    }
                    else{
                        // If no errors, updates selected employee to be updated
                        $query = "UPDATE client 
                        SET CompanyName='$compName',BusinessNumber='$busNum',contactFirstName='$fname',contactLastName='$lname',phoneNumber='$phNum',cellNumber='$cellNum',carrier='$carrier',HST='$hstNum',website='$website',status1='$type'
                        WHERE clientId=$cid;";
                        echo $query;
                        $prepared_query = $db_conn->prepare($query);
                        $success=$prepared_query->execute();
                            if($success5){
                            // If successful the page will echo the below
                            echo "<br>Successful Execution of query <br>";
                            }
                        // Variables we grab from the user to insert data into data log table
                        $emp_id = $_SESSION['employeeId'];
                        $date_time = date("Y-m-d h:i:sa");
                        $ip_address = $_SERVER['REMOTE_ADDR'];
                        $log_query2 = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                                VALUES ('$emp_id','client','edit client','$date_time','$ip_address');";  
                        echo $log_query2;
                        $prepared_log_query2=$db_conn->prepare($log_query2);
                        $log_success2=$prepared_log_query2->execute();   
                        if($log_success2){
                        var_dump($sql_results);
                        echo "<br>Successful Execution of query <br>";
                        } 
                    }
                   break;
            case "createemployee":
                $efname = validate($_POST['efname']);
                $elname = validate($_POST['elname']);
                $eemail = validate($_POST['eemail']);
                $ecell = validate($_POST['ecell']);
                $position = validate($_POST['position']);
                $password = validate($_POST['password']);
                $estatus = validate($_POST['type']);

                // This e_input will be displayed in the URL 
                $e_input = 'efname='.$efname.'&elname='.$elname.'&eemail='.$eemail.'&ecell='.$ecell.'&position='.$position.'&password='.$password.'&estatus='.$estatus;

                // If certain fields are not filled out, it will show error on page
                if (empty($efname)){
                    header("Location: ?page=createemployee&error=First Name is required&$e_input");
                }else if (empty($elname)){
                    header("Location: ?page=createemployee&error=Last Name is required&$e_input");
                }else if (empty($eemail)){
                    header("Location: ?page=createemployee&error=Email is required&$e_input");
                }else if(empty($ecell)){
                    header("Location: ?page=createemployee&error=Cell Phone is required&$e_input");
                }else if(empty($position)){
                    header("Location: ?page=createemployee&error=Position is required&$e_input");
                }else if(empty($password)){
                    header("Location: ?page=createemployee&error=Password is required&$e_input");
                }else if(empty($estatus)){
                    header("Location: ?page=createemployee&error=Status is required&$e_input");
                }else {
                    // Will echo out the data that will be added to the database
                    echo "<br><br>Adding<br>";
                    $row_values1 = array("'$efname'","'$elname'","'$eemail'","'$ecell'","'$position'","'$password'","'$estatus'");
                    $query1="INSERT INTO employee (firstName,lastName,email,cellNumber,position,e_password,status1)
                            VALUES($row_values1[0],$row_values1[1],$row_values1[2],$row_values1[3],$row_values1[4],$row_values1[5],$row_values1[6]);";
                    echo $query1;
                    $prepared_query1=$db_conn->prepare($query1);
                    $success1=$prepared_query1->execute();   
                        if($success1){
                        // If successful the page will echo the below
                        var_dump($sql_results);
                        echo "<br>Successful Execution of query <br>";
                        } 
                    // Variables we grab from the user to insert data into data log table
                    $emp_id = $_SESSION['employeeId'];
                    $date_time = date("Y-m-d h:i:sa");
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $log_query2 = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                             VALUES ('$emp_id','employee','add employee','$date_time','$ip_address');";  
                    echo $log_query2;
                    $prepared_log_query2=$db_conn->prepare($log_query2);
                    $log_success2=$prepared_log_query2->execute();   
                        if($log_success2){
                        var_dump($sql_results);
                        echo "<br>Successful Execution of query <br>";
                        } 
       
                }
                break;
            case "editemployee":
                $eid = validate($_GET['eid']);
                $efname = validate($_POST['efname']);
                $elname = validate($_POST['elname']);
                $eemail = validate($_POST['eemail']);
                $ecell = validate($_POST['ecell']);
                $position = validate($_POST['position']);
                $password = validate($_POST['password']);
                $estatus = validate($_POST['type']);

                // If certain fields are not filled out, it will show error on page
                $e_input = 'eid='.$eid.'&efname='.$efname.'&elname='.$elname.'&eemail='.$eemail.'&ecell='.$ecell.'&position='.$position.'&password='.$password.'&type='.$estatus;

                if (empty($efname)){
                    header("Location: ?page=editemployee&error=First Name is required&$e_input");
                }else if (empty($elname)){
                    header("Location: ?page=editemployee&error=Last Name is required&$e_input");
                }else if (empty($eemail)){
                    header("Location: ?page=editemployee&error=Email is required&$e_input");
                }else if(empty($ecell)){
                    header("Location: ?page=editemployee&error=Cell Phone is required&$e_input");
                }else if(empty($position)){
                    header("Location: ?page=editemployee&error=Position is required&$e_input");
                }else if(empty($password)){
                    header("Location: ?page=editemployee&error=Password is required&$e_input");
                }else if(empty($estatus)){
                    header("Location: ?page=editemployee&error=Status is required&$e_input");
                }else {
                    // If no errors, updates selected employee to be updated
                    $query = "UPDATE employee 
                            SET firstName='$efname',lastName='$elname',email='$eemail',cellNumber='$ecell',position='$position',e_password='$password',status1='$estatus'
                            WHERE employeeId=$eid;";
                            echo $query;
                $prepared_query = $db_conn->prepare($query);
                $success=$prepared_query->execute();
                    if($success){
                    var_dump($sql_results);
                    echo "<br>Successful Execution of query <br>";
                    } 
                // Variables we grab from the user to insert data into data log table
                $emp_id = $_SESSION['employeeId'];
                $date_time = date("Y-m-d h:i:sa");
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $log_query2 = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                         VALUES ('$emp_id','employee','edit employee','$date_time','$ip_address');";  
                echo $log_query2;
                $prepared_log_query2=$db_conn->prepare($log_query2);
                $log_success2=$prepared_log_query2->execute();   
                    if($log_success2){
                    var_dump($sql_results);
                    echo "<br>Successful Execution of query <br>";
                    } 
                }
                break;
            case "notification":
                $nname = validate($_POST['nname']);
                $ntype = validate($_POST['ntype']);
                $nstatus =validate($_POST['type']);
                // This n_input will be displayed in the URL 
                $n_input = 'nName='.$nname.'&ntype='.$nType.'&type='.$nstatus;

                // If certain fields are not filled out, it will show error on page
                if (empty($nname)){
                    header("Location: ?page=notification&error=Name is required&$n_input");
                }else if (empty($ntype)){
                    header("Location: ?page=notification&error=Notification type is required&$n_input");
                }else if(empty($nstatus)){
                    header("Location: ?page=notification&error=Status is required&$n_input");
                }else{
                    // Will echo out the data that will be added to the database
                    echo "<br><br>Adding<br>";
                    $row_values1 = array("'$nname'","'$ntype'","'$nstatus'");
                    $query5="INSERT INTO notifications (Notification_Name,Notification_Type,Notification_Action)
                            VALUES($row_values1[0],$row_values1[1],$row_values1[2]);";
                    echo $query5;
                    $prepared_query5=$db_conn->prepare($query5);
                    $success5=$prepared_query5->execute();  
                    var_dump($success5); 
                    if($success5){
                    // If successful the page will echo the below
                    echo "<br>Successful Execution of query <br>";
                    }
                    // Variables we grab from the user to insert data into data log table
                    $emp_id = $_SESSION['employeeId'];
                    $date_time = date("Y-m-d h:i:sa");
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $log_query2 = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                            VALUES ('$emp_id','notification','add notification','$date_time','$ip_address');";  
                    echo $log_query2;
                    $prepared_log_query2=$db_conn->prepare($log_query2);
                    $log_success2=$prepared_log_query2->execute();   
                        if($log_success2){
                        var_dump($sql_results);
                        echo "<br>Successful Execution of query <br>";
                        } 

                }
                break;
            case "editnotification":
                $nid = validate($_GET['nid']);
                $nname = validate($_POST['nname']);
                $ntype = validate($_POST['ntype']);
                $nstatus =validate($_POST['type']);
                // This n_input will be displayed in the URL 
                $n_input = 'nName='.$nname.'&ntype='.$nType.'&type='.$nstatus;

                // If certain fields are not filled out, it will show error on page
                if (empty($nname)){
                    header("Location: ?page=notification&error=Name is required&$n_input");
                }else if (empty($ntype)){
                    header("Location: ?page=notification&error=Notification type is required&$n_input");
                }else if(empty($nstatus)){
                    header("Location: ?page=notification&error=Status is required&$n_input");
                }else{
                        // If no errors, updates selected employee to be updated
                    $query = "UPDATE notifications 
                    SET Notification_Name='$nname',Notification_Type='$ntype',Notification_Action='$nstatus'
                    WHERE notificationId=$nid;";
                    echo $query;
                    $prepared_query = $db_conn->prepare($query);
                    $success=$prepared_query->execute();
                    if($success){
                        var_dump($sql_results);
                        echo "<br>Successful Execution of query <br>";
                        } 
                    // Variables we grab from the user to insert data into data log table
                    $emp_id = $_SESSION['employeeId'];
                    $date_time = date("Y-m-d h:i:sa");
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $log_query2 = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                            VALUES ('$emp_id','notification','edit notification','$date_time','$ip_address');";  
                    echo $log_query2;
                    $prepared_log_query2=$db_conn->prepare($log_query2);
                    $log_success2=$prepared_log_query2->execute();   
                        if($log_success2){
                        var_dump($sql_results);
                        echo "<br>Successful Execution of query <br>";
                        }
                }
                break;
            case 'cnotification':
                $cid = validate($_POST['cid']);
                $nid = validate($_POST['nid']);
                $date = validate($_POST['date']);
                $frequency = validate($_POST['frequency']);
                $status = validate($_POST['type']);
                $client_data = get_client_data($db_conn);
                $notif_data = get_notification_data($db_conn);
                
                // This n_input will be displayed in the URL 
                $n_input = 'cid='.$cid.'&nid='.$nid.'&date='.$date.'&frequency='.$frequency.'&type='.$status;

                $cIdChecker=validateCId($client_data,$cid);
                // If certain fields are not filled out, it will show error on page
                if (empty($cid)){
                    header("Location: ?page=cnotification&error=Client ID is required&$n_input");    
                }else if (empty($nid)){
                    header("Location: ?page=cnotification&error=Notification ID is required&$n_input");  
                }else if(empty($date)){
                    header("Location: ?page=cnotification&error=Date is required&$n_input");
                }else if(empty($frequency)){
                    header("Location: ?page=cnotification&error=Frequency is required&$n_input");
                }else if(empty($status)){
                    header("Location: ?page=cnotification&error=Status is required&$n_input");
                }else {
                    if($cIdChecker==0){
                    // If no errors, creates client notification
                    $row_values1 = array("'$cid'","'$nid'","'$date'","'$frequency'","'$status'");
                    $query5="INSERT INTO clientnotification (clientId,notificationId,date1,frequency,status1)
                            VALUES($row_values1[0],$row_values1[1],$row_values1[2],$row_values1[3],$row_values1[4]);";
                    echo $query5;
                    $prepared_query5=$db_conn->prepare($query5);
                    $success5=$prepared_query5->execute();  
                    var_dump($success5); 
                    if($success5){
                    // If successful the page will echo the below
                    echo "<br>Successful Execution of query <br>";
                    }
                    // Variables we grab from the user to insert data into data log table
                    $emp_id = $_SESSION['employeeId'];
                    $date_time = date("Y-m-d h:i:sa");
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $log_query2 = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                            VALUES ('$emp_id','client notification','add client notification','$date_time','$ip_address');";  
                    echo $log_query2;
                    $prepared_log_query2=$db_conn->prepare($log_query2);
                    $log_success2=$prepared_log_query2->execute();   
                    if($log_success2){
                    var_dump($sql_results);
                    echo "<br>Successful Execution of query <br>";
                    } 
                    } else {
                        header("Location: ?page=cnotification&error=Please Try again&$n_input");  
                    }
                }

                
                break;
                case 'editclientnotif':
                    $cid = validate($_GET['cid']);
                    $nid = validate($_GET['nid']);
                    $date = validate($_POST['date']);
                    $frequency = validate($_POST['frequency']);
                    $status = validate($_POST['type']);
                    $client_data = get_client_data($db_conn);
                    $notif_data = get_notification_data($db_conn);

                    // This n_input will be displayed in the URL 
                    $n_input = 'cid='.$cid.'&nid='.$nid.'&date='.$date.'&frequency='.$frequency.'&type='.$status;

                    // If certain fields are not filled out, it will show error on page
                    if (empty($cid)){
                        header("Location: ?page=editclientnotif&error=Client ID is required&$n_input");
                        foreach ($client_data as $client){
                            if ($client['clientId'] != $cid){
                                header("Location: ?page=editclientnotif&error=Client ID Does Not Exist&$n_input");
                            }
                        }
                    }else if (empty($nid)){
                        header("Location: ?page=editclientnotif&error=Notification ID is required&$n_input");
                        foreach ($notif_data as $notif){
                            if ($notif['notificationId'] != $nid){
                                header("Location: ?page=editclientnotif&error=Notification ID Does Not Exist&$n_input");
                            }
                        }
                    }else if(empty($date)){
                        header("Location: ?page=editclientnotif&error=Date is required&$n_input");
                    }else if(empty($frequency)){
                        header("Location: ?page=editclientnotif&error=Frequency is required&$n_input");
                    }else if(empty($status)){
                        header("Location: ?page=editclientnotif&error=Status is required&$n_input");
                    }else{
                                // If no errors, updates selected employee to be updated
                                $query = "UPDATE clientnotification 
                                SET date1='$date',frequency='$frequency',status1='$status'
                                WHERE clientId=$cid AND notificationId=$nid;";
                                echo $query;
                                $prepared_query = $db_conn->prepare($query);
                                $success=$prepared_query->execute();
                                if($success){
                                var_dump($sql_results);
                                echo "<br>Successful Execution of query <br>";
                                } 
                                // Variables we grab from the user to insert data into data log table
                                $emp_id = $_SESSION['employeeId'];
                                $date_time = date("Y-m-d h:i:sa");
                                $ip_address = $_SERVER['REMOTE_ADDR'];
                                $log_query2 = "INSERT INTO `log` (`employeeId`, `moduleName`, `action`, `dateTime`, `IP`)
                                        VALUES ('$emp_id','client notification','edit client notification','$date_time','$ip_address');";  
                                echo $log_query2;
                                $prepared_log_query2=$db_conn->prepare($log_query2);
                                $log_success2=$prepared_log_query2->execute();   
                                if($log_success2){
                                var_dump($sql_results);
                                echo "<br>Successful Execution of query <br>";
                                } 
                        }
                            break;
        }
    }
}

// This switch statement will redirect user to specific pages
if($page){
    switch($page){
        case 'createclient';
            include 'view/client.phtml';
            break;
        case 'createemployee';
            include 'view/employee.phtml';
            break;
        case 'viewclient';
            include 'view/viewclient.phtml';
            break;
        case 'editclient';
            include 'view/editclient.phtml';
            break;
        case 'viewemployee';
            include 'view/viewemployee.phtml';
            break;
        case 'editemployee';
            include 'view/editemployee.phtml';
            break;
        case 'searchclient';
            include 'view/searchclient.phtml';
            break;
        case 'searchemployee';
            include 'view/searchemployee.phtml';
            break;
        case 'notification';
            include 'view/notification.phtml';
            break;
        case 'viewnotification';
            include 'view/viewnotification.phtml';
            break;
        case 'editnotification';
            include 'view/editnotification.phtml';
            break;
        case 'homepage';
            include 'view/homepage.phtml';
            break;
        case 'log';
            include 'view/log.phtml';
            break;
        case 'cnotification';
            include 'view/clientnotif.phtml';
            break;
        case 'searchnotification';
            include 'view/searchnotification.phtml';
            break;
        case 'viewcnotification';
            include 'view/viewcnotification.phtml';
            break;
        case 'searchcnotification';
            include 'view/searchclientnotif.phtml';
            break;
        case 'editclientnotif';
            include 'view/editclientnotif.phtml';
            break;
    }
}else{
    include 'view/homepage.phtml';
}
?>

<?php show_source(__file__)?>