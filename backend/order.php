<h3 class="ct">訂單管理</h3>
<?php
$orders = $Ord->all([]," ORDER BY no DESC");
?>
<form action="api/fastdel.php" method="post" onsubmit="return confirm('殺很大你確定？')">
快速刪除：
<input type="radio" name="mode" value="1">依日期
<input type="text" name="date">
<input type="radio" name="mode" value="2">依電影
<select name="movie">
<?php
$rows=$Ord->all([]," GROUP BY movie");
foreach ($rows as $row){
echo "<option>".$row['movie']."</option>";
}
?>
</select>
    <input type="submit" value="刪除">
</form>

<style>
</style>

<table rules=rows>
    <tr>
        <td>訂單編號</td>
        <td>電影名稱</td>
        <td>日期</td>
        <td>場次時間</td>
        <td>訂購數量</td>
        <td>訂購位置</td>
        <td>操作</td>
    </tr>
    <?php
    foreach ($orders as $o) {
    ?>
        <form action="api/del_order.php" method="post" onsubmit="return confirm('確定？')">
            <tr>
                <td><?= $o['no']; ?></td>
                <td><?= $o['movie']; ?></td>
                <td><?= $o['date']; ?></td>
                <td><?= $o['session']; ?></td>
                <td><?= $o['qt']; ?></td>
                <td>
                    <?php
                    $seat = unserialize($o['seat']);
                    // var_dump($seat);
                    foreach ($seat as $s) {
                        echo (floor($s / 5) + 1) , "排", ($s % 5 + 1), "號", "<br>";
                    }
                    ?></td>
                <input type="hidden" name="id" value="<?= $o['id']; ?>">
                <td><button>刪除</button></td>
            </tr>
        </form>
    <?php
    }
    ?>
</table>