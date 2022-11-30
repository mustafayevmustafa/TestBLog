
<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <?php
                $id = $_GET['id'];
                $query = mysqli_query($db, "SELECT blog.title,blog.description,blog.created_at,blog.image,categories.title as name FROM  blog LEFT JOIN categories ON blog.cat_id = categories.id WHERE blog.id=$id");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date"><?=$row['name']?></span> <span class="mx-1">&bullet;</span> <span><?=date("Y-m-d",strtotime($row['created_at'])) ?></span></div>
                        <h1 class="mb-5"><?=$row['title']?></h1>
                        <!--                        <p><span class="firstcharacter">L</span>orem ipsum dolor sit, amet consectetur adipisicing elit. Ratione officia sed, suscipit distinctio, numquam omnis quo fuga ipsam quis inventore voluptatum recusandae culpa, unde doloribus saepe labore alias voluptate expedita? Dicta delectus beatae explicabo odio voluptatibus quas, saepe qui aperiam autem obcaecati, illo et! Incidunt voluptas culpa neque repellat sint, accusamus beatae, cumque autem tempore quisquam quam eligendi harum debitis.</p>-->

                        <figure class="my-4">
                            <!--                            <img src="https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" class="img-fluid">-->
                            <img src="<?=$row['image']?>" alt="" class="img-fluid">
                            <figcaption><?=$row['description']?> </figcaption>
                        </figure>
                        <p><?=$row['description']?></p>
                    </div><!-- End Single Post Content -->

                    <?php } ?>
                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">


                        <div class="tab-content" id="pills-tabContent">

                            <?php
                            $query = mysqli_query($db, "SELECT blog.id, blog.title,blog.description,blog.created_at,blog.image,blog.is_monset,blog.status,categories.title as name FROM  blog LEFT JOIN categories ON blog.cat_id = categories.id  WHERE blog.is_monset=0 and blog.status=1 ORDER BY created_at DESC limit 5  ");
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>

                                <!-- Popular -->
                                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date"><?=$row['name']?></span> <span class="mx-1">&bullet;</span> <span><?=date("Y-m-d",strtotime($row['created_at'])) ?></span></div>
                                        <h2 class="mb-2"><a href="index.php?route=single&id=<?= $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
                                    </div>
                                </div> <!-- End Popular -->

                            <?php   } ?>
                        </div>
                    </div>
                    <div class="aside-block">

                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">
                            <?php
                            $query = mysqli_query($db, "SELECT * FROM  categories  WHERE  status=1   ");
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <li><a href="category.html"><i class="bi bi-chevron-right"></i> <?=$row['title']?></a></li>
                            <?php }?>
                        </ul>
                    </div><!-- End Categories -->
                </div>
            </div>
        </div>
    </section>
</main>
