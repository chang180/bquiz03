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

    .mb {
        width: 45%;
        height: 160px;
        display: inline-block;
        margin: 3px;

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
            case 4: //縮放 使用 animate自己寫的時候，需要把各種前後關係都考慮到，不像直接使用既有函式這麼直覺
                $(dom).animate({
                    width: 0,
                    height: 0,
                    left: 100,
                    top: 130
                }, function() {
                    $(next).css({
                        width: 0,
                        height: 0,
                        left: 100,
                        top: 130
                    });
                    $(next).show();
                    $(next).animate({
                        width: 200,
                        height: 260,
                        left: 0,
                        top: 0
                    });
                    $(dom).hide();
                    $(dom).css({
                        width: 200,
                        height: 260,
                        left: 0,
                        top: 0
                    });
                })
                break;
        }
    }
</script>

<!-- 院線片區 -->
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <?php
        $today = date("Y-m-d");
        $ondate = date("Y-m-d", strtotime("-2 days"));
        $div = 4;
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $Movie->all(['sh' => 1], " && ondate >= '$ondate' && ondate <= '$today' ORDER BY rank limit $start,$div");
        $total = $Movie->count(['sh' => 1], " && ondate >= '$ondate' && ondate <= '$today' ");
        $pages = ceil($total / $div);

        foreach ($rows as $row) {
        ?>
            <div class="mb">
                <table>
                    <tr>
                        <td rowspan="3"><img src="./img/<?= $row['poster']; ?>" style="width:80px;height:100px"></td>
                        <td><?= $row['name']; ?></td>
                    </tr>
                    <tr>
                        <td><img src="./icon/<?= $row['level']; ?>.png" style="width:15px"><?= $level[$row['level']]; ?></td>
                    </tr>
                    <tr>
                        <td><?= $row['ondate']; ?></td>
                    </tr>
                </table>

                <div class="ct">
                    <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button><button onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
                </div>
            </div>
        <?php } ?>
        <div class="ct">
            <?php
            for ($i = 1; $i <= $pages; $i++) {
                $font = ($i == $now) ? "30px" : "20px";
                echo "<a href='?p=$i' style='font-size:$font;text-decoration:none'>$i</a>";
            }
            ?>
        </div>
    </div>
</div>