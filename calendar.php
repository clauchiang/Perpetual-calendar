<!-- 時區 -->
<?php
date_default_timezone_set("Asia/Taipei");
?>

<!-- 中間區域 -->
<div class="calendarMain">

    <!-- 月份數字 -->
    <div class="monthNum">

        <div id="time">
            <?php

            $time = date("A h:i:s");

            echo $time;
            ?>
        </div>

        <?php

        if (isset($_GET['month'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
        } else {
            $month = date('n');
            $year = date('Y');
        }

        //前後月份
        switch ($month) {
            case 1:
                $prevMonth = 12;
                $prevYear = $year - 1;
                $nextMonth = $month + 1;
                $nextYear = $year;
                break;
            case 12:
                $prevMonth = $month - 1;
                $prevYear = $year;
                $nextMonth = 1;
                $nextYear = $year + 1;
                break;
            default:
                $prevMonth = $month - 1;
                $prevYear = $year;
                $nextMonth = $month + 1;
                $nextYear = $year;
                break;
        }

        if ($month < 10) {
            echo "0" . "<span class='monthStyle'>$month</span>" . "<br>";
        } else {
            echo "<span class='monthStyle'>$month</span>" . "<br>";
        }

        echo "<span class='yearStyle'>$year</span>";

        ?>

    </div>
    <!-- 月份數字結束 -->


    <!-- 日期數字 -->
    <div class="dateNum">

        <?php

        //月曆變數
        $firstDay = $year . "-" . $month . "-1"; //當月第一天
        $firstWeekDay = date('w', strtotime($firstDay)); //當月第一天是星期幾
        $monthDays = date('t', strtotime($firstDay)); //當月總天數
        $lastDay = $year . "-" . $month . "-" . $monthDays; //當月最後一天
        $lastWeekDay = date('w', strtotime($lastDay)); //
        $today = date("Y-m-d");
        $dateArr = [];


        //當月1號之前的空格白
        for ($i = 0; $i < $firstWeekDay; $i++) {
            $dateArr[] = "";
        }
        //當月所有日期
        for ($i = 0; $i < $monthDays; $i++) {
            $date = date("Y-m-d", strtotime("+$i days", strtotime($firstDay)));
            $dateArr[] = $date;
        }
        //當月最後一天之後的空白
        for ($i = 0; $i < (6 - $lastWeekDay); $i++) {
            $dateArr[] = "";
        }

        ?>

        <!-- 表格 -->
        <div class="table">
            <div class="header">Sun</div>
            <div class="header">Mon</div>
            <div class="header">Tue</div>
            <div class="header">Wed</div>
            <div class="header">Thu</div>
            <div class="header">Fri</div>
            <div class="header">Sat</div>
            <?php

            foreach ($dateArr as $k => $day) {

                if ($day == $today) {
                    $hol = 'today';
                } else if ($k % 7 == 0 || $k % 7 == 6) {
                    $hol = 'weekend';
                } else if ($sday = date('md', strtotime($day))) {
                    $hol = 'sday';
                } else {
                    $hol = '';
                }

                if (!empty($day)) {
                    $sday = date('md', strtotime($day));
                    $dayFormat = date('j', strtotime($day));
                    echo "<div class='{$hol}'><div class='festivalDay{$sday}'>{$dayFormat}<br></div></div>";
                } else {
                    echo "<div class='space' onclick='spaceChangeFun()'><a href='#'><img src='./img/heart.png' alt='❤' width='30px'></a></div>";
                }
            }

            ?>

        </div>
        <!-- 表格結束 -->

    </div>
    <!-- 日期數字結束 -->

</div>
<!-- 中間區域結束 -->

<!-- 按鈕 -->
<nav class="nav">
    <div>
        <a href="./index.php?year=<?= $prevYear; ?>&month=<?= $prevMonth; ?>">
            << </a>
    </div>
    <div>
        <a href="./index.php">
            NOW
        </a>
    </div>
    <div>
        <a href="./index.php?year=<?= $nextYear; ?>&month=<?= $nextMonth; ?>">
            >>
        </a>
</nav>

<!-- 按鈕結束 -->

<script>
    function spaceChangeFun() {

        const spaceChange = document.querySelectorAll('.space');

        spaceChange.forEach(function(value, index) {
            value.innerHTML = "<img src='./img/fullheart.gif' alt='❤' width='30px'>";
        });
    };
</script>