<?php
$sno = $_GET['ord'];
$ord = $Ord->find(['no' => $sno]);
?>

<table>
    <tr>
        <td colspan="2">
            感謝您的訂購，您的訂單編號是：<?= $ord['no']; ?>
        </td>
    </tr>
    <tr>
        <td>電影名稱：</td>
        <td><?= $ord['movie'] ?></td>
    </tr>
    <tr>
        <td>日期：</td>
        <td><?= $ord['date'] ?></td>
    </tr>
    <tr>
        <td>場次時間：</td>
        <td><?= $ord['session'] ?></td>
    </tr>
    <tr>
        <td colspan="2">
            座位：<br>
            <?php
        $seat = unserialize($ord['seat']);
        // var_dump($seat);
        foreach ($seat as $s) {
            echo (floor($s/5)+1)."排",($s%5+1) ,"號","<br>";
        }
        echo "共". count($seat)."張電影票";
        ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">

            <button onclick="location.href='index.php'">確認</button>
        </td>
    </tr>
</table>