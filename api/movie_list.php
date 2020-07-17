<?php
include_once "../base.php";
    $rows = $Movie->all([], " ORDER BY rank");
    foreach ($rows as $k => $row) {
        // 找出排序後的上一筆和下一筆的資料id
        $prev=($k!=0)?$rows[$k-1]['id']:$row['id'];
        $next=($k!=count($rows)-1)?$rows[$k+1]['id']:$row['id'];


    ?>
        <div class="movie-item">
            <div><img src="./img/<?= $row['poster']; ?>" style="width:80px;height:100px"></div>
            <div>分級：<img src="icon/<?= $row['level']; ?>.png"></div>
            <div>
                <span>片名：<?= $row['name']; ?></span>
                <span>片長：<?= $row['length']; ?></span>
                <span>上映時間：<?= $row['ondate']; ?></span>
                <div>
                    <button onclick="sh('movie',<?= $row['id']; ?>)"><?=($row['sh']==1)?"顯示":"隱藏";?></button>
                    <button class="shift" data-rank="<?= $row['id'] . "-" . $prev; ?>">往上</button>
                    <button class="shift" data-rank="<?= $row['id'] . "-" . $next; ?>">往下</button>
                    <button onclick="location.href='?do=edit_movie&id=<?=$row['id'];?>'">編輯電影</button>
                    <button onclick="del('movie',<?= $row['id']; ?>)">刪除電影</button>
                    </div>
                    <div>劇情簡介：<?= $row['intro']; ?></div>
            </div>
        </div>
    <?php } ?>