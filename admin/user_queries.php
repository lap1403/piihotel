<?php  require('inc/essentinals.php');
    require('inc/db_config.php');
    adminLogin();
    if(isset($_GET['seen'])){
        $frm_data = filteration($_GET);
        if($frm_data['seen']=='all'){
            $q="UPDATE `user_que` SET `seen`=? ";
            $values=[1];
            if(update($q,$values,'i')){
                alert('success','All Read');
            }
            else{
                alert('error','False');
            }
        }
        else{
            $q="UPDATE `user_que` SET `seen`=? WHERE `sr_no`=?";
            $values=[1,$frm_data['seen']];
            if(update($q,$values,'ii')){
                alert('success','Read');
            }
            else{
                alert('error','False');
            }
        }
    }
    if(isset($_GET['del'])){
        $frm_data = filteration($_GET);
        if($frm_data['del']=='all'){
            $q="DELETE FROM `user_que`";
            if(mysqli_query($con,$q)){
                alert('success','All data delete');
            }
            else{
                alert('error','False');
            }
        }
        else{
            $q="DELETE FROM `user_que` WHERE `sr_no`=?";
            $values=[$frm_data['del']];
            if(del($q,$values,'i')){
                alert('success','data delete');
            }
            else{
                alert('error','False');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-User Queries</title>
    <?php
    require('inc/links.php');
    ?>
</head>
<body class="bg-light">
   <?php require('inc/header.php'); ?>

   
   <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">User queries</h3>
                <div class="card boder-0 shadow-sm mb-4" >
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href="?seen=all" class="btn btn-dark rounded shadow-none btn-sm">
                            <i class="bi bi-check-all"></i>  Mark as Read</a>
                            <a href="?del=all" class="btn btn-danger rounded shadow-none btn-sm">
                            <i class="bi bi-check-all"></i> Delete all</a>
                        </div>
                        <div class="table-responsive-md" style="height: 450px;overflow:scroll;">
                        <table class="table">
                            <thead class="stiky-top">
                                <tr class="bg-dark text-light">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $q="SELECT * FROM `user_que` ORDER BY `sr_no` DESC";
                                    $data=mysqli_query($con,$q);
                                    $i=1;
                                    while($row = mysqli_fetch_assoc($data))
                                    {
                                        $seen='';
                                        if($row['seen']!=1){
                                            $seen="<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>AS READ</a>";
                                        }
                                        $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger'>Delete</a>";
                                        echo<<<querry
                                        <tr>
                                            <td>$i</td>
                                            <td>$row[name]</td>
                                            <td>$row[email]</td>
                                            <td>$row[subject]</td>
                                            <td>$row[message]</td>
                                            <td>$row[date]</td>
                                            <td>$seen</td>
                                        </tr>    
                                        querry;
                                        $i++;
                                    }
                                ?>
                            </tbody>
                            </table>
                        </div>                      
                    </div>
                </div>
               
                <!--  -->
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php') ?>

</body>
</html>