<?php

$rows = $Poster->all(['sh' => 1], " ORDER BY `rank`");

?>

<style>
    .btns {
        display: flex;
    }

    .nav {
        display: flex;
        width: 320px;
        overflow: hidden;
    }

    .icon {
        width: 80px;
        flex-shrink: 0;
        text-align: center;
        position: relative;
    }

    .icon img {
        width: 50px;
        cursor: pointer;
    }

    .control {
        width: 45px;
        font-size: 45px;
        text-align: center;
        cursor: pointer;
    }

    .poster {
        border: 1px solid;
        width: 200px;
        height: 250px;
        margin: 0 auto 20px auto;
        position: relative;
    }

    .po {
        width: 100%;
        height: 100%;
        background: white;
        color: black;
        position: absolute;
        display: none;
    }

    .po img {
        width: 100%;
    }
</style>
<!-- 預告片區 -->
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <!-- 海報區 -->
        <div class="poster">
            <?php
            foreach ($rows as $k => $row) {
                echo "<div class='po' data-ani='" . $row['ani'] . "'>";
                echo "<img src='img/" . $row['path'] . "'>";
                echo "<div class='ct'>" . $row['name'] . "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <!-- 按鈕區 -->
        <div class="btns">
            <div class="control" onclick="shift('left')">&#9664;</div>
            <div class="nav">
                <?php
                foreach ($rows as $k => $row) {
                    echo "<div class='icon'>";
                    echo "<img src='img/" . $row['path'] . "'>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="control" onclick="shift('right')">&#9654;</div>

        </div>
    </div>
</div>

<script>
    $(".po").eq(0).show();
    let p = 0;
    let total = $(".icon").length; // 用.length計算icon陣列長度以得到數量，也可以用PHP的count函數去計算rows陣列的總數

    function shift(direct) {
        switch (direct) {
            case 'right':
                if (p < (total - 4)) {
                    p = p + 1;
                    $(".icon").animate({
                        right: 80 * p
                    });
                }
                break;
            case 'left':
                if (p > 0) {
                    p = p - 1;
                    $(".icon").animate({
                        right: 80 * p
                    });
                }
                break;
        }

    }
    let auto = setInterval(() => {
        slider();
    }, 3000);

    $(".icon").on("click", function() {
        let index = $(".icon").index($(this));
        clearInterval(auto);
        $(".po").hide();
        $(".po").eq(index).fadeIn(2000);
        auto = setInterval(() => {
            slider();
        }, 3000);

    })


    function slider() {
        let dom = $(".po:visible");
        let ani = $(dom).data('ani');
        let next = $(dom).next();
        if (next.length <= 0) {
            next = $(".po").eq(0);
        }
        // console.log(dom,ani,next);
        switch (ani) { //需注意參數的資料形態
            case 1: //淡入淡出
                $(dom).fadeOut(1000, function() {
                    $(next).fadeIn(1000);
                });
                break;
            case 2: //放大縮小
                $(dom).hide(1000, function() {
                    $(next).show(1000);
                });
                break;
            case 3: //滑入滑出
                $(dom).slideUp(1000, function() {
                    $(next).slideDown(1000);
                });
                break;
        }
    }
</script>

<!-- 院線片區 -->
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>