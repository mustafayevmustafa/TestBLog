<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-bg-primary">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Head Line</h1>
        </div>
    </div>
    <div class="row mb-2">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $showData = 2;
        $limit = ($page - 1) * $showData;//0
        $query = mysqli_query($db, "SELECT * FROM  blog  WHERE is_monset=1 and status=1 ORDER BY created_at DESC  ");
        $countData = mysqli_num_rows($query);
        $query = mysqli_query($db, "SELECT *FROM blog LIMIT " . $limit . ',' . $showData );
        $monsets = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $total_pages = ceil($countData / $showData);
        $pagLink = "";
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


    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <?php
            if ($page >= 2) {
                echo "<li class='page-item'>
      <a class='page-link' href='database.php?page=" . ($page - 1) . "' aria-label='Previous'>
        <span aria-hidden='true'>&laquo;</span>
        <span class='sr-only'>Previous</span>
      </a>
    </li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<li class='page-item'><a class=' active page-link' href='database.php?page="
                        . $i . "'>" . $i . " </a>";
                } else {
                    $pagLink .= "<li class='page-item'><a class='page-link' href='database.php?page=" . $i . "'>
      " . $i . " </a></li>";
                }
            };
            echo $pagLink;

            if ($page < $total_pages) {
                echo "<li class='page-item'>
      <a class='page-link' href='database.php?page=" . ($page + 1) . "' aria-label='Previous'>
        <span aria-hidden='true'>&laquo;</span>
        <span class='sr-only'>Next</span>
      </a>
    </li>";
            }
            ?>
        </ul>
    </nav>
    <hr>