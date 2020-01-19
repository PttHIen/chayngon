<?php if (isset($_SESSION['id']) && $_SESSION['user_type'] == "hotel") { ?>


    <?php

    if (isset($_GET['detail'])) { //details page ?>


        <?php

        if (isset($_GET['order']) && !empty($_GET['detail'])) {

            //accept order

            if ($_GET['order'] == "accept") {


                $order_id = $_GET['detail'];

                $response = "1";

                $user_id = $_SESSION['id'];
                $user_reason = $_POST['reason'];


                $headers = array(

                    "Accept: application/json",

                    "Content-Type: application/json"

                );


                $data = array(

                    "order_id" => $order_id,
                    "response" => $response,
                    "reason" => $user_reason,

                    "user_id" => $user_id

                );


                $ch = curl_init($baseurl . '/restaurantOwnerResponse');


                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


                $return = curl_exec($ch);


                $json_data = json_decode($return, true);

                //var_dump($json_data);


                $curl_error = curl_error($ch);

                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


                //echo $json_data['code'];

                //die;


                if ($json_data['code'] !== 200) {

                    //echo "<div class='alert alert-danger'>".$json_data['msg']."</div>";

                    @header("Location: dashboard.php?p=hotel_order&page=liveOrders&action=error");

                    echo "<script>window.location='dashboard.php?p=hotel_order&page=liveOrders&action=error'</script>";


                } else {

                    //echo "<div class='alert alert-success'>".$json_data['msg']."</div>";

                    @header("Location: dashboard.php?p=hotel_order&page=liveOrders&action=success");

                    echo "<script>window.location='dashboard.php?p=hotel_order&page=liveOrders&action=success'</script>";

                }


                curl_close($ch);


            }

            //accept order = end


            //reject order

            if ($_GET['order'] == "reject") {


                $order_id = $_GET['detail'];

                $response = "2";

                $user_id = $_SESSION['id'];
                $user_reason = $_POST['reason'];


                $headers = array(

                    "Accept: application/json",

                    "Content-Type: application/json"

                );


                $data = array(

                    "order_id" => $order_id,
                    "reason" => $user_reason,
                    "response" => $response,

                    "user_id" => $user_id

                );


                $ch = curl_init($baseurl . '/restaurantOwnerResponse');


                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


                $return = curl_exec($ch);


                $json_data = json_decode($return, true);

                //var_dump($json_data);


                $curl_error = curl_error($ch);

                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


                //echo $json_data['code'];

                //die;


                if ($json_data['code'] !== 200) {

                    //echo "<div class='alert alert-danger'>".$json_data['msg']."</div>";

                    @header("Location: dashboard.php?p=hotel_order&detail=" . $_GET['detail'] . "&page=liveOrders&action=error");

                    echo "<script>window.location='dashboard.php?p=hotel_order&detail=" . $_GET['detail'] . "&page=liveOrders&action=error'</script>";


                } else {

                    //echo "<div class='alert alert-success'>".$json_data['msg']."</div>";

                    @header("Location: dashboard.php?p=hotel_order&detail=" . $_GET['detail'] . "&page=liveOrders&action=success");

                    echo "<script>window.location='dashboard.php?p=hotel_order&detail=" . $_GET['detail'] . "&page=liveOrders&action=success'</script>";

                }


                curl_close($ch);


            }

            //reject order = end

        }

        ?>


        <?php

        $order_id = $_GET['detail'];

        $user_id = $_SESSION['id'];


        $headers = array(

            "Accept: application/json",

            "Content-Type: application/json"

        );


        $data = array(

            "order_id" => $order_id,

            "user_id" => $user_id

        );


        $ch = curl_init($baseurl . '/showOrderDetail');


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $return = curl_exec($ch);


        $json_data = json_decode($return, true);

        //var_dump($json_data);


        $curl_error = curl_error($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        //echo $json_data['code'];

        //die;


        if ($json_data['code'] !== 200) {

            echo "<div class='alert alert-danger'>" . $json_data['msg'] . "</div>";

        } else {


            foreach ($json_data['msg'] as $str => $val) {

                //var_dump($val);

                $hotel_accepted = $val['Order']['hotel_accepted'];

                $currency = $val['Restaurant']['Currency']['symbol'];

                $tax = $val['Restaurant']['Tax']['tax'];

                ?>

                <div id="orderAccptReject" class="preloader" align="center" style="display:none;">

                    <a onclick="return hidepopup()">Hình thức</a>

                </div>

                <div class="left">

                    <h2 class="title">Đơn hàng # <?php echo $_GET['detail']; ?></h2>

                </div>


                <!--<a onclick="return popup()"> popup </a>-->


                <script>

                    function popup() {

                        alert('show');

                        document.getElementById("orderAccptReject").classList.add('showpopup');

                    }


                    function hidepopup() {

                        alert('hide');

                        document.getElementById("orderAccptReject").classList.add('hidepopup');

                    }

                </script>

                <style>

                    .showpopup {
                        display: block !important;
                    }

                    .hidepopup {
                        display: none !important;
                    }

                </style>


                <?php if ($hotel_accepted == 0) { ?>

                    <div class="right buttonsgroup">
                        <ul>
                            <li>
                                <!--<a href="dashboard.php?p=hotel_order&detail=<?php //echo $_GET['detail']; ?>&order=accept" onclick="return confirm('Do you really want to accept order?');"><button>Accept</button></a>-->

                                <a href="javascript:;" onClick="jQuery('#adddeals2').toggle();"
                                   class="filtericon acceptb"><span>Chấp nhận</span></a>
                                <div id="adddeals2" class="popup">
                                    <div class="popup_container col40"><a href="javascript:;"
                                                                          onClick="jQuery('#adddeals2').hide();"
                                                                          id="close">&times;</a>
                                        <div class="paddingallsides form">
                                            <h2 class="title" style="text-align:center">Hướng Dẫn Shipper</h2>
                                            <form action="dashboard.php?p=hotel_order&detail=<?php echo $_GET['detail']; ?>&page=liveOrders&order=accept"
                                                  id="hoteldealsfrmd" method="post">
                                                <p>
                                                <textarea class="textarea" name="reason" id="dsc"
                                                          placeholder="description"></textarea>
                                                </p>
                                                <p>
                                                    <input type="submit" value="Submit" name="">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><!--<a href="dashboard.php?p=hotel_order&detail=<?php //echo $_GET['detail']; ?>&order=reject" onclick="return confirm('Do you really want to reject order?');">
      <button>Reject</button>
      </a>
      -->
                                <a href="javascript:;" onClick="jQuery('#reg').toggle();"
                                   class="filtericon acceptb"><span>Từ Chối</span></a>
                                <div id="reg" class="popup">
                                    <div class="popup_container col40"><a href="javascript:;"
                                                                          onClick="jQuery('#reg').hide();" id="close">&times;</a>
                                        <div class="paddingallsides form">
                                            <h2 class="title" style="text-align:center">Lý Do Từ Chối</h2>
                                            <form action="dashboard.php?p=hotel_order&detail=<?php echo $_GET['detail']; ?>&page=liveOrders&order=reject"
                                                  id="hoteldealsfrmd" method="post">
                                                <p>
                                                <textarea class="textarea" name="reason" id="dsc"
                                                          placeholder="Nhập lý do từ chối"></textarea>
                                                </p>
                                                <p>
                                                    <input type="submit" value="Gửi" name="">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </li>
                        </ul>
                    </div>

                <?php } else { ?>

                    <div class="right buttonsgroup">

                        <ul>

                            <li>
                                <button onclick="back()">Quay lại</button>
                            </li>
                            <script>
                                function back() {
                                    window.history.go(-1);

                                }
                            </script>
                            <li>
                                <button style="opacity: 0.4;" hidden>Đồng Ý</button>
                            </li>

                            <li>
                                <button style="opacity: 0.4;" hidden>Từ Chối</button>
                            </li>


                        </ul>

                    </div>

                <?php } ?>

                <div class="clear"></div>


                <div class="orderinformation">

                    <div class="sect">

                        <h3>Chi tiết người mua</h3>

                        <p>
                            <i class="fa fa-user"></i> <?php echo $val['UserInfo']['first_name'] . " " . $val['UserInfo']['last_name']; ?>
                        </p>

                        <p><i class="fa fa-phone"></i> <?php echo $val['UserInfo']['phone']; ?></p>

                        <p>
                            <i class="fa fa-map-marker"></i> <?php echo $val['Address']['street'] . " " . $val['Address']['apartment'] . ", " . $val['Address']['city'] . ", " . $val['Address']['country']; ?>
                        </p>

                    </div>

                    <?php if (isset($val['RiderOrder']['Rider'])) { ?>

                        <div class="sect">

                            <h3>Chi tiết Shipper</h3>

                            <p>
                                <i class="fa fa-user"></i> <?php echo $val['RiderOrder']['Rider']['first_name'] . " " . $val['RiderOrder']['Rider']['last_name']; ?>
                            </p>

                            <p><i class="fa fa-phone"></i> <?php echo $val['RiderOrder']['Rider']['phone']; ?></p>

                        </div>

                    <?php } ?>

                    <div class="sect">

                        <h3>Chi Tiết Nhà Hàng</h3>

                        <p><i class="fa fa-adjust"></i> <?php echo $val['Restaurant']['name']; ?></p>

                        <p><i class="fa fa-map-marker"></i> <?php

                            $stret = $val['Restaurant']['RestaurantLocation']['street'];

                            if (!empty($stret)) {

                                echo $stret . ", ";

                            }

                            $city = $val['Restaurant']['RestaurantLocation']['city'];

                            if (!empty($city)) {

                                echo $city . ", ";

                            }

                            $country = $val['Restaurant']['RestaurantLocation']['country'];

                            if (!empty($country)) {

                                echo $country;

                            }

                            ?></p>

                    </div>

                    <div class="sect">

                        <h3>Chú thích</h3>

                        <p><i class="fa fa-exclamation-circle"></i> <?php echo $val['Order']['instructions']; ?></p>

                    </div>


                    <div class="sect">

                        <div class="menutable_div">

                            <table width="100%" class="menutable" cellpadding="0" cellspacing="0">

                                <tr height="50px">

                                    <td><h4>Menu Item</h4></td>

                                    <td width="100" class="textcenter"><h4>Số lượng</h4></td>

                                    <td width="100" class="textcenter"><h4>Giá</h4></td>

                                </tr>

                                <?php

                                foreach ($val['OrderMenuItem'] as $key => $value) {

                                    //var_dump($value);

                                    ?>

                                    <tr bgcolor="#efefef">

                                        <td style="padding: 15px 15px;"><p style="margin:0 0 5px;">
                                                <strong><?php echo $value['quantity'] . "X &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                    echo $value['name']; ?></strong></p></td>

                                        <td style="padding: 15px 15px;"
                                            class="textcenter"><?php echo $value['quantity']; ?></td>

                                        <td style="padding: 15px 15px;" class="textcenter"><?php echo $value['price'];
                                            echo $currency; ?></td>

                                    </tr>

                                    <?php


                                    if (count($value['OrderMenuExtraItem']) > 0) {

                                        foreach ($value['OrderMenuExtraItem'] as $key11 => $value11) {

                                            //var_dump($value11);

                                            echo "<tr height='0px'>
															<td colspan='3' style='padding:15px 15px 15px;'>
																<span style='display:inline-block;padding-bottom:5px;border-bottom:0.5px solid #ccc;'>" .
                                                $value11['name']; ?> &nbsp;&nbsp; +
                                            <?php echo $value11['price'];
                                            echo $currency . "
																</span>
															</td>
														</tr>";

                                        }

                                    }


                                }

                                ?>

                            </table>

                        </div>


                        <hr>

                        <table width="100%" class="totalcad_table" cellpadding="0" cellspacing="0">


                            <tr height="30px">

                                <td style="padding:5px 0;"><strong>Thuế<span
                                                style="color:grey; font-size:12px;">(<?php echo $tax; ?>%)</span></strong>
                                </td>

                                <td style="padding:5px 0;" width="200" class="textright">&nbsp;</td>

                                <td style="padding:5px 0;" width="200"
                                    class="textright"><?php echo $val['Order']['tax'];
                                    echo $currency; ?>  </td>

                            </tr>


                            <tr height="30px">

                                <td style="padding:5px 0 0;"><strong>Phương thức thanh toán</strong></td>

                                <td style="padding:5px 0 0;" width="200" class="textright">&nbsp;</td>

                                <td style="padding:5px 0 0;" width="200"
                                    class="textright"><?php if ($val['Order']['payment_method_id'] == "1") {

                                        if ($val['PaymentMethod']['paypal'] != "") {

                                            echo "PayPal";

                                        } else if ($val['PaymentMethod']['stripe'] != "") {

                                            echo "Credit Card";

                                        } else {
                                        }

                                    } else if ($val['Order']['cod'] == "1") {

                                        echo "Cash on Delivery (COD)";

                                    } else {
                                    } ?></td>

                            </tr>

                            <tr height="40px">

                                <td style="padding:5px 0;"><strong>Tổng <span style="color:grey; font-size:12px;">(Thanh toán của bạn)</span></strong>
                                </td>

                                <td style="padding:5px 0;" width="200" class="textright">&nbsp;</td>

                                <td style="padding:5px 0;" width="200" class="textright">
                                    <strong><?php echo $val['Order']['sub_total'];
                                        echo $currency; ?></strong></td>

                            </tr>


                        </table>

                    </div>

                </div>

                <?php

            }

            ///

        }


        curl_close($ch);

        ?>


    <?php } //details page = end

    else { //order history ?>
        <div>
            <h2 class="title">Đơn Hàng</h2>

        </div>
        <br/>
        <div class="left" style="width:100%;">
            <a href="dashboard.php?p=hotel_order&page=liveOrders"
               class="links_sublinks <?php if ($_GET['page'] == "liveOrders") {
                   echo "links_sublinks_active";
               } ?>">
                <span>Đơn Hàng Đang Đặt</span>
            </a>
            <div class="dropdown">
                <a class="dropbtn links_sublinks  <?php if ($_GET['page'] == "orderHistory") {
                    echo "links_sublinks_active";
                } ?>" onClick_dead="jQuery('#filtertoggle').toggle();" style="margin-left: 22px; cursor:pointer;">
                    <span>Lịch Sử</span>
                </a>
                <div class="dropdown-content">
                    <a href="dashboard.php?p=hotel_order&page=orderHistory">Đơn đã hoàn thành</a>
                    <a href="dashboard.php?p=hotel_order&page=cancelOrders">Đơn đã huỷ</a>
                </div>
            </div>
        </div>

        <div class="clear"></div>
        <br/>
        <div id="filtertoggle" class="popup">

            <div class="popup_container">


                <a href="javascript:;" onClick="jQuery('#filtertoggle').hide();" id="close">&times;</a>

                <div class="paddingallsides">

                    <h2 class="title">Search</h2>

                    <form action="dashboard.php" id="get">

                        <input type="hidden" name="p" value="hotel_order"/><input type="hidden" name="filter"
                                                                                  value="search"/>

                        <p><input type="text" name="start_date" placeholder="Start Date" id="datepicker" name=""/></p>

                        <p><input type="text" name="end_date" placeholder="End Date" id="datepicker2" name=""/></p>

                        <p><input type="submit" value="Filter Search"/></p>

                    </form>

                </div>


            </div>

        </div>

        <?php

        if (@$_GET['page'] == "liveOrders") {
            $user_id = $_SESSION['id'];
            $status = "1";
            $data = array(
                "user_id" => $user_id,
                "status" => $status
            );

            $headers = array(
                "Accept: application/json",
                "Content-Type: application/json"
            );
            $ch = curl_init($baseurl . '/showRestaurantOrders');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $return = curl_exec($ch);

            $json_data = json_decode($return, true);
            //var_dump($json_data);
            //die;
            $curl_error = curl_error($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //echo $json_data['code'];
            //die;


            ?>

            <script>

                jQuery(document).ready(function () {

                    jQuery('#myTable_row').pageMe({
                        pagerSelector: '#myPager',
                        showPrevNext: true,
                        hidePageNumbers: false,
                        perPage: 20
                    });

                });

            </script>

            <?php $rows = count($json_data['msg']);
            $_SESSION['orderCount'] = $rows;
            if ($rows == 0) {

                ?>

                <div class="textcenter nothingelse">

                    <img src="img/noorder.png" alt=""/>

                    <h3>Rất tiếc!</h3>

                </div>

                <?php

            }


            ?>
            <div id="orderDetails" class="popup">
                <div class="popup_container col70" style="background:#f7f7f7;"><a href="javascript:;"
                                                                                  onClick="jQuery('#orderDetails').hide();"
                                                                                  id="close">&times;</a>
                    <div id="Order_details" style="padding:30px;"></div>
                </div>
            </div>
            <?php
            echo "<table class='order_table' border='0' cellpadding='0' cellspacing='0' id='myTable'>
	
				<thead></thead>
	
				<tbody id='myTable_row'>";

            if ($json_data['code'] == 200) {
                foreach ($json_data['msg'] as $str => $val) {

                    //var_dump($val);

                    $currency = $val['Restaurant']['Currency']['symbol'];
                    foreach ($val['OrderMenuItem'] as $key => $value) {

                        //var_dump($value);

                        if ($key == 0) {

                            ?>

                            <tr>

                                <td><?php echo "#" . $val['Order']['id']; ?></td>

                                <td><?php if ($status == 1) {
                                        $view_status = 'Đang hoạt động';
                                    }
                                    echo $value['name'] . "<span class='blok' style='color:green; font-weight:500;'>" . $val['Order']['price'] . $currency . "</span>" . "<span class='blok' style='color:#BE2C2C; font-weight:400;'>Trạng thái: $view_status </span>"; ?></td>

                                <td class="textright"><?php echo $val['Order']['created'] . "<span class='blok'>" . $val['Address']['street'] . " " . $val['Address']['apartment'] . ", " . $val['Address']['city'] . ", " . $val['Address']['country'] . "</span>"; ?></td>

                                <td align="center">
                                    <a href="javascript:;"
                                       onClick="jQuery('#orderDetails').toggle(); showDetails(<?php echo $val['Order']['id']; ?>)">
                                        <button style=" <?php
                                        if ($val['Order']['hotel_accepted'] == "1") {
                                            echo "background:#D5B0B0;";
                                        } ?> ">
                                            <?php
                                            if ($val['Order']['hotel_accepted'] == "1") {
                                                echo "Đã chấp nhận đơn hàng";
                                            } else {
                                                echo "Chấp nhận đơn hàng";
                                            }
                                            ?>
                                        </button>
                                    </a>

                                </td>

                            </tr>

                            <?php

                        }

                    }


                }
            } else {

                echo " <div class=\"textcenter nothingelse\">

                    <img src=\"img/noorder.png\" alt=\"\"/>

                    <h3>Rất tiếc!</h3>

                </div>";
            }

            echo "</tbody></table> <nav><ul class='pagination pagination-sm' id='myPager'></ul></nav>";

            ///
            curl_close($ch);
        } else
            if ($_GET['page'] == "orderHistory") {
                $user_id = $_SESSION['id'];
                $status = "2";
                $data = array(
                    "user_id" => $user_id,
                    "status" => $status
                );

                $headers = array(
                    "Accept: application/json",
                    "Content-Type: application/json"
                );

                $ch = curl_init($baseurl . '/showRestaurantOrders');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $return = curl_exec($ch);

                $json_data = json_decode($return, true);
                //var_dump($json_data);
                //die;
                $curl_error = curl_error($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                //echo $json_data['code'];
                //die;


                ?>

                <script>

                    jQuery(document).ready(function () {

                        jQuery('#myTable_row').pageMe({
                            pagerSelector: '#myPager',
                            showPrevNext: true,
                            hidePageNumbers: false,
                            perPage: 20
                        });

                    });

                </script>

                <?php $rows = count($json_data['msg']);

                if ($rows == 0) {

                    ?>

                    <div class="textcenter nothingelse">

                        <img src="img/noorder.png" alt=""/>

                        <h3>Rất tiếc!</h3>

                    </div>

                    <?php

                }

                echo "<table class='order_table' border='0' cellpadding='0' cellspacing='0' id='myTable'>
	
				<thead></thead>
	
				<tbody id='myTable_row'>";
                if ($json_data['code'] == 200) {
                    foreach ($json_data['msg'] as $str => $val) {

                        //var_dump($val);

                        $currency = $val['Restaurant']['Currency']['symbol'];

                        foreach ($val['OrderMenuItem'] as $key => $value) {

                            //var_dump($value);

                            if ($key == 0) {

                                ?>

                                <tr>

                                    <td><?php echo "#" . $val['Order']['id']; ?></td>

                                    <td><?php echo $value['name'] . "<span class='blok' style='color:green; font-weight:500;'>" . $val['Order']['price'] . $currency . "</span>"; ?></td>

                                    <td class="textright"><?php echo $val['Order']['created'] . "<span class='blok'>" . $val['Address']['street'] . " " . $val['Address']['apartment'] . ", " . $val['Address']['city'] . ", " . $val['Address']['country'] . "</span>"; ?></td>

                                    <td align="center">
                                        <a href="dashboard.php?p=hotel_order&detail=<?php echo $val['Order']['id']; ?>">
                                            <button>Xem chi tiết</button>
                                        </a>

                                    </td>

                                </tr>

                                <?php

                            }

                        }


                    }
                } else {
                    echo " <div class=\"textcenter nothingelse\">

                        <img src=\"img/noorder.png\" alt=\"\"/>

                        <h3>Rất tiếc!</h3>

                    </div>";
                }


                echo "</tbody></table> <nav><ul class='pagination pagination-sm' id='myPager'></ul></nav>";

                ///
                curl_close($ch);
            } else
                if ($_GET['page'] == "cancelOrders") {
                    $user_id = $_SESSION['id'];
                    $status = "2";
                    $data = array(
                        "user_id" => $user_id,
                        "hotel_accepted" => $status
                    );

                    $headers = array(
                        "Accept: application/json",
                        "Content-Type: application/json"
                    );

                    $ch = curl_init($baseurl . '/showRestaurantOrders');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    $return = curl_exec($ch);

                    $json_data = json_decode($return, true);
                    //var_dump($json_data);
                    //die;
                    $curl_error = curl_error($ch);
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    //echo $json_data['code'];
                    //die;


                    ?>

                    <script>

                        jQuery(document).ready(function () {

                            jQuery('#myTable_row').pageMe({
                                pagerSelector: '#myPager',
                                showPrevNext: true,
                                hidePageNumbers: false,
                                perPage: 20
                            });

                        });

                    </script>

                    <?php $rows = count($json_data['msg']);

                    if ($rows == 0) {

                        ?>

                        <div class="textcenter nothingelse">

                            <img src="img/noorder.png" alt=""/>

                            <h3>Rất tiếc!</h3>

                        </div>

                        <?php

                    }

                    echo "<table class='order_table' border='0' cellpadding='0' cellspacing='0' id='myTable'>
	
				<thead></thead>
	
				<tbody id='myTable_row'>";
                    if ($json_data['code'] == 200) {
                        foreach ($json_data['msg'] as $str => $val) {

                            //var_dump($val);

                            $currency = $val['Restaurant']['Currency']['symbol'];

                            foreach ($val['OrderMenuItem'] as $key => $value) {

                                //var_dump($value);

                                if ($key == 0) {

                                    ?>

                                    <tr>

                                        <td><?php echo "#" . $val['Order']['id']; ?></td>

                                        <td><?php echo $value['name'] . "<span class='blok' style='color:green; font-weight:500;'>" . $val['Order']['price'] . $currency . "</span>"; ?></td>

                                        <td class="textright">
                                            <?php echo $val['Order']['created'] . "<span class='blok'>" . $val['Address']['street'] . " " . $val['Address']['apartment'] . ", " . $val['Address']['city'] . ", " . $val['Address']['country'] . "</span>"; ?>
                                            <div style="padding: 11px 0px;"><span
                                                        style="color:#be2c2c; font-weight:400;">Lý Do Từ Chối:</span><?php echo $val['Order']['rejected_reason']; ?>
                                            </div>
                                        </td>

                                        <td align="center">
                                            <a href="dashboard.php?p=hotel_order&detail=<?php echo $val['Order']['id']; ?>">
                                                <button>Xem chi tiết</button>
                                            </a>

                                        </td>

                                    </tr>

                                    <?php

                                }

                            }


                        }

                    } else {
                        echo "<div class=\"textcenter nothingelse\">

                            <img src=\"img/noorder.png\" alt=\"\"/>

                            <h3>Rất tiếc!</h3>

                        </div>";
                    }

                    echo "</tbody></table> <nav><ul class='pagination pagination-sm' id='myPager'></ul></nav>";

                    ///
                    curl_close($ch);
                }


    }

    /*if( isset($_GET['filter']) && !empty($_GET['start_date']) && !empty($_GET['end_date']) ) {



        $user_id = $_SESSION['id'];

        $starting_date = $_GET['start_date'];

        $ending_date = $_GET['end_date'];



        $data = array(

            "user_id" => $user_id,

            "starting_date" => $starting_date,

            "ending_date" => $ending_date

        );



    } //filter = end*/


    ?>

    <script>
        function showDetails(orderID) {
            //alert(orderID);
            document.getElementById("Order_details").innerHTML = 'Loading...';

            var xmlhttp;
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //alert(xmlhttp.responseText);
                    document.getElementById("Order_details").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "hotel_order_details_ajax.php?orderID=" + orderID + "&uid=" +<?php echo $_SESSION['id'];?>, true);
            xmlhttp.send();
            //alert(str1);
        }


    </script>
    <?php


} else {


    @header("Location: index.php");

    echo "<script>window.location='index.php'</script>";

    die;


} ?>
