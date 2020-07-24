<h3 class="ct">訂單管理</h3>
<?php
$orders = $Ord->all();
?>
<form action="api/fastdel.php" method="post">
    <!-- 快速刪除： 回家再想 0.0 -->
    <select name="movie">
        <option value="1">普遍級</option>
        <option value="2">輔導級</option>
        <option value="3">保護級</option>
        <option value="4">限制級</option>
    </select>
    <input type="submit" value="刪除">
</form>



<table>
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
        <form action="api/del_order.php" method="post">
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
                        echo (floor($s / 5) + 1) . "排", ($s % 5 + 1), "號", "<br>";
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