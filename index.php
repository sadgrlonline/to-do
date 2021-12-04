<?php include 'config.php'?>
<link rel="stylesheet" href="style.css" media="all">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
<div class="container">
    <div class="title-bar">
        <h1>Projects</h1>
    </div>

    <div class="section-container">
        <div class="c-wrapper">
            <div class="d-wrapper">
                <div class="item">
                    <div class="wrapper">
                        <a style="display:block;" href="#" id="newCategory">newcat</a><br>
                        <div class="section">






                            <?php // here i goooo
$stmt = $con->prepare("SELECT DISTINCT category FROM todo");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $category = $row['category'];
    ?>
                            <details open>
                                <summary><strong><?php echo $category; ?></strong></summary>
                                <a href="#" class="addItem">+</a>
                                <ul>
                                    <?php
// query for category: sadgrl.online
    $stmt2 = $con->prepare("SELECT * FROM todo WHERE category=?");
    $stmt2->bind_param("s", $category);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    while ($row2 = $result2->fetch_assoc()) {
        $id = $row2['id'];
        $item = $row2['item'];
        $details = $row2['details'];
        //echo $category;
        //echo $item;
        ?>

                                    <?php if ($item !== "null") {?>
                                    <li class="<?php echo $id; ?>">
                                        <?php echo $item; ?>
                                    </li>
                                    <div id="description">
                                        <div class="title-bar">Details.exe</div>
                                        <div class="close"><a href="#" id="closeDesc">x</a></div>
                                        <div style="color:white;" id="id<?php echo $id; ?>">

                                            <?php echo $details; ?>
                                        </div>
                                    </div>
                                    <?php
}
        ?>


                                    <?php
}?>

                                </ul>

                                <?php
}
$stmt->close();
$stmt2->close();
?>
                                <?php

// end
?>

                                </ul>
                            </details>
                            <?php
// query for category: sadgrl.online
$stmt3 = $con->prepare("SELECT * FROM todo WHERE category='completed'");
$stmt3->execute();
$result3 = $stmt3->get_result();
while ($row3 = $result2->fetch_assoc()) {
    $id = $row3['id'];
    $item = $row3['item'];
    $details = $row3['details'];
    //echo $category;
    //echo $item;

    if ($item !== "null") {

        ?>

                            <li class="<?php echo $id; ?>"><?php echo $item; ?></li>

                        </div>
                        <?php
}
    ?>
                        <?php
}
$stmt3->close();
?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>