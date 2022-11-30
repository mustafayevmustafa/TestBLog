<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$id = $_GET['id'];

$showData = 2;
$limit = ($page - 1) * $showData;//0
$query = mysqli_query($db, "SELECT * FROM  blog  WHERE cat_id=$id");
$cat = mysqli_fetch_assoc($query);
$countData = mysqli_num_rows($query);
$query = mysqli_query($db, "SELECT *FROM blog LIMIT " . $limit . ',' . $showData);
$monsets = mysqli_fetch_all($query, MYSQLI_ASSOC);

$total_pages = ceil($countData / $showData);
$pagLink = "";
?>
<main class="container">

    <div class="p-4 p-md-5 mb-4 rounded text-bg-primary">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic"><?= $cat['title'] ?></h1>
        </div>
    </div>
    <div class="row mb-2">
        <?php
        foreach ($monsets as $monset) {

            ?>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary"><?= $monset['title'] ?></strong>
                        <div class="mb-1 text-muted"><?= date("Y-m-d", strtotime($monset['created_at'])) ?></div>
                        <p class="card-text mb-auto"><?= $monset['description'] ?></p>
                        <a href="index.php?route=single&id=<?= $monset['id'] ?>" class="stretched-link">Continue
                            reading</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    </div>
