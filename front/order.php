<div class="order-form">
    <form>
        <h3 class="ct">線上訂票</h3>
        <table style="width:70%;margin:auto">
            <tr>
                <td width="10%">電影：</td>
                <td><select name="movie" id="movie">
                        <?php
                        $db = new DB("movie");
                        $today = date("Y-m-d");
                        $ondate = date("Y-m-d", strtotime("-2 days"));

                        $rows = $Movie->all(['sh' => 1], " && ondate >= '$ondate' && ondate <= '$today' ");
                        $total = $Movie->count(['sh' => 1], " && ondate >= '$ondate' && ondate <= '$today' ");
                        foreach ($rows as $row) {
                            if (!empty($_GET['id'])) {
                                $selected = ($_GET['id'] == $row['id']) ? "selected" : "";
                                echo "<option value='" . $row['id'] . "' data-name=".$row['name']." $selected>" . $row['name'] . "</option>";
                            } else {
                                echo "<option value='" . $row['id'] . "' data-name=".$row['name'].">" . $row['name'] . "</option>";
                            }
                        }
                        ?>
                    </select> </td>
            </tr>
            <tr>
                <td>日期：</td>
                <td><select name="date" id="date">

                    </select> </td>
            </tr>
            <tr>
                <td>場次：</td>
                <td><select name="section" id="session">

                    </select> </td>
            </tr>
        </table>
        <div class="ct"><input onclick="booking()" type="button" value="確定"><input type="reset" value="重置"></div>
    </form>
</div>

<style>
    .room {
        width: 320px;
        height: 320px;
        display: flex;
        flex-wrap: wrap;
        margin: auto;
    }

    .room>div {
        width: 64px;
        height: 80px;
        position: relative;
        /* background: green; */
    }

    /* .room>div:nth-child(odd) {
        background: blue;
    } */

    .null{
        background:url("icon/03D02.png");
        background-repeat:no-repeat;
        background-position: center;;
    }
    .booked{
        background:url("icon/03D03.png");
        background-repeat:no-repeat;
        background-position: center;;
    }
    .chkbox{
        position:absolute;bottom:5px;right:5px;
    }
</style>

<div class="booking-form" style="display:none">
    <div class="room">
       
    </div>
    <div class="info-block">
        <div class="info">
            <p id="infoMovie">您選擇的電影是：<span id="movie-name"></span></p>
            <p id="infoDate">您選擇的時刻是：<span id="movie-date"></span> <span id="movie-session"></span></p>
            <p id="infoSession">您已經勾選<span id='ticket'></span>張票：最多可以購買四張票</p>
        </div>
        <button onclick="prev()">上一步</button>
        <button onclick="order()">訂購</button>
    </div>
</div>

<script>
    getDuration();
    $("#movie").on("change", function() {
        getDuration();
    })

    $("#date").on("change", function() {
        getSession();
    })

  

    

    function getDuration() {
        let id = $("#movie").val();
        $.get("api/get_duration.php", {
            id
        }, function(duration) {
            $("#date").html(duration);
            getSession();
        })
    }

    function getSession() {
        let date = $("#date").val();
        let id = $("#movie").val();
        $.get("api/get_session.php", {
            date,
            id
        }, function(session) {
            $("#session").html(session);
        })
    }
    // 挑選座位函式
    function booking() {
        // $(".order-form").hide();
        // $(".booking-form").show();
        let movie=$("#movie").val();
        let movieName=$("#movie option:selected").data("name");
        let date=$("#date").val();
        let session=$("#session").val();
        let sessionName=$("#session option:selected").data("session");
        $("#movie-name").html(movieName);
        $("#movie-date").html(date);
        $("#movie-session").html(sessionName);
$.get("api/get_seats.php",function(seats){
    $(".room").html(seats);

    let ticket=0;
    $(".chkbox").on("change",function(){
        ticket++;
        $("#ticket").html(ticket);
    })
})

        $(".order-form,.booking-form").toggle();

    }

    function prev() {
        // $(".order-form").show();
        // $(".booking-form").hide();
        $(".order-form,.booking-form").toggle();
        $(".room").html("");
    }
</script>