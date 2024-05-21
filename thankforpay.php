<?php
    require('admin/inc/db_config.php');
    session_start();


    if(isset($_GET['partnerCode']))
    {
    $partnerCode=$_GET['partnerCode'];
    $orderId=$_GET['orderId'];
    $amount=$_GET['amount'];
    $orderInfo=$_GET['orderInfo'];
    $orderType=$_GET['orderType'];
    $transId=$_GET['transId'];
    $payType=$_GET['payType'];
    $code_order=rand(0,9999);
    }

    $insert_momo ="INSERT INTO momo_bank(partner_code,  order_id ,  amount ,  order_info ,  order_type ,  trans_id ,  pay_type , code_cart ) 
    VALUES ( '".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$orderType."','".$transId."','".$payType."','".$code_order."')";
    
    $cart_querry=mysqli_query($con,$insert_momo);

    if($cart_querry){
    // foreach($_SESSION['cart'] as $key =>$value){
    //     $id =$value['id'];
    //     $name=$value['name'];
    //     $price=$value['price'];
    //     $insert_order_details="INSERT INTO `cart_details`(`id`, `name`, `price`) VALUES ( '".$id."','".$name."','".$price."')";
    //     mysqli_query($con,$insert_order_details);
    // }

    echo '<h3>Giao dich thanh cong!!!</h3>';
    echo '<p>Vui long vao trang <a target="_blank" href="#">Xem chi tiet</a></p>';
    }
    else{
    echo 'Giao dich that bai';
    }

?>  

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="jumbotron mt-4">
            <h1 class="display-4">Cảm ơn!</h1>
            <p class="lead">Chúng tôi rất biết ơn sự hỗ trợ của bạn.</p>
            <hr class="my-4">
            <p>Cảm ơn bạn đã ghé thăm trang web của chúng tôi.</p>
            <a class="btn btn-primary btn-lg" href="index.php" role="button">Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html> -->