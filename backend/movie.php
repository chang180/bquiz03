<style>
    .list {
        overflow: auto;
        width: 95%;
        height: 420px;
        background: #eee;
    }

    .movie-item {
        width: 100%;
        background: white;
        margin: 2px 0;
    }

    .movie-item>div {
        display: inline-block;
    }

    .movie-item>div:nth-child(1),
    .movie-item>div:nth-child(2) {
        width: 10%;
    }

    .movie-item>div:nth-child(3) {
        width: 75%;
    }

    .movie-item>div:nth-child(3)>span {
        display: inline-block;
        width: 30%;
    }
</style>

<button>新增電影</button>
<hr>
<div class="list">
    <?php
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
                    <button onclick="sh('movie',<?= $row['id']; ?>)">顯示</button>
                    <button class="shift" data-rank="<?= $row['id'] . "-" . $prev; ?>">往上</button>
                    <button class="shift" data-rank="<?= $row['id'] . "-" . $next; ?>">往下</button>
                    <button onclick="edit('movie',<?= $row['id']; ?>])">編輯電影</button>
                    <button onclick="del('movie',<?= $row['id']; ?>)">刪除電影</button>
                    </div>
                    <div>劇情簡介：<?= $row['intro']; ?></div>
            </div>
        </div>
    <?php } ?>

</div>
<script>
    // 使用jquery來對button的點擊做處理
    $(".shift").on("click", function() {

        // 取得data屬性的值，並拆成一個id陣列
        let id = $(this).data("rank").split("-");
        // console.log(id)
        // 將id陣列連同要修改的資料表名稱，一起用ajax的方式一直傳到後台
        $.post("api/rank.php", {
            id,
            "table": "movie"
        }, function() {
            // 後台api處理完畢後重新載入一次頁面
            location = location;
        })
    })



    function del(movie,id){
        $.post("api/del.php",{"table":movie,"id":id},function(){
            location.reload();
        }
        )}
</script>

