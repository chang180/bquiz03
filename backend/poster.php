<style>
    h4 {
        margin: 5px;
        background: #eee;
        padding: 5px;
    }

    .header {
        display: flex;

    }

    .header div {
        width: 25%;
        background: #ccc;
        margin: 2px;
        text-align: center;
    }

    .row {
        display: flex;
        align-items: center;
    }

    .row div {
        width: 25%;
        text-align: center;
    }
</style>

<div style="width:98%;margin:auto;height:350px">

    <h4 class="ct">新增片清單</h4>
    <div class="header">
        <div>預告片海報</div>
        <div>預告片片名</div>
        <div>預告片排序</div>
        <div>操作</div>
    </div>

    <div style="overflow:auto;height:280px">
        <form action="api/edit_poster.php" method="post">
            <div class="p-list">
                <?php

                $rows = $Poster->all([], " ORDER BY `rank` ");

                foreach ($rows as $k => $row) {
                    $isChecked = ($row['sh'] == 1) ? "checked" : "";

                    // 以下排序做法，完全可以使用直接讓用戶輸入排序值就好，不要浪費太多時間理解它
                    $prev = (($k) != 0) ? $rows[$k - 1]['id'] : $row['id'];
                    $next = (($k) != (count($rows) - 1)) ? $rows[$k + 1]['id'] : $row['id'];
                ?>
                    <div class="row">
                        <div><img src="img/<?= $row['path']; ?>" style="width:90px"></div>
                        <div><input type="text" name="name[]" value="<?= $row['name']; ?>"></div>
                        <div>
                            <!--
上一筆$k-1 +  是否第一筆 $k == 0
下一筆$k+1 =  是否最後一筆  $k == count($rows)-1
                            -->
                            <!-- button雖然自帶submit，但設定type="button"後即可取消submit效果 -->
                            <button type="button" data-rank="<?= $row['id'] . "-" . $prev; ?>">往上</button>
                            <button type="button" data-rank="<?= $row['id'] . "-" . $next; ?>">往下</button>
                        </div>
                        <div>
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $isChecked; ?>>顯示
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">刪除
                            <select name="ani[]">
                                <option value="1" <?= ($row['ani'] == 1) ? "selected" : ""; ?>>淡入淡出</option>
                                <option value="2" <?= ($row['ani'] == 2) ? "selected" : ""; ?>>放大縮小</option>
                                <option value="3" <?= ($row['ani'] == 3) ? "selected" : ""; ?>>滑入滑出</option>
                                <option value="4" <?= ($row['ani'] == 4) ? "selected" : ""; ?>>縮放</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                <?php
                }
                ?>

            </div>
            <div class="ct">
                <input type="submit" value="編輯確定">
                <input type="reset" value="重置">
            </div>
        </form>
    </div>

</div>
<hr>
<div style="width:98%;margin:auto;height:150px">

    <h4 class="ct">新增預告片海報</h4>
    <form action="api/add_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td width="50%">
                    <input type="file" name="poster">
                </td>
                <td width="50%">
                    <input type="text" name="name">
                </td>
            </tr>
        </table>
        <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
    </form>

</div>

<script>
    $("button").on("click", function() {
        let id = $(this).data("rank").split("-");
        $.post("api/rank.php", {
            id
        }, function() {
            location = location;
        })
    })
</script>