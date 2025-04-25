<?php require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';



$content_sql = $pdo->prepare("SELECT * FROM content where category_id=:category_id order by content_order asc  ");
$content_sql->execute(array(
    'category_id' => $_GET['category_id']
));




// print_r($team_members_get['image']);
?>
<br>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <?php
        if (@$_GET['status'] == "ok") { ?>
          <p style="color:green ; ">İşlem başarılı</p>
        <?php } elseif (@$_GET['status'] == "no") { ?>
          <p style="color:red ; ">İşlem başarısız</p>

        <?php }  ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori</h3>
                            <a href="add_content.php?category_id=<?php echo $_GET['category_id'] ?>">
                                <button type="submit" class="btn btn-info" style="float:right;">Yeni İçerik Ekle</button></a>
                            <!-- <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Kategori Sıra</th>
                                        <th>Kategori Resim</th>
                                        <th>Kategori Başlık</th>
                                        <th> Düzenle</th>
                                        <th> Sil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($content_get = $content_sql->fetch(PDO::FETCH_ASSOC)) {
                                        /* print_r($content_get['image']);   */ ?>
                                        <tr>
                                            <td><?= $content_get['content_order'] ?></td>
                                            <td><img style="max-height:150px;max-width:150px;" src="images/content/<?php echo $content_get['content_image'] ?>"></td>
                                            <td><?= $content_get['content_title'] ?></td>
                                            <td><a href="edit_content.php?id=<?= $content_get['id'] ?>"><button type="submit" class="btn btn-success">İçerik Düzenle</button>
                                            </td>
                                            <td>
                                                <form action="process.php" method="post" enctype="multipart/form-data">
                                                    <button name="content_delete" type="submit" class="btn btn-danger"> Sil</button>
                                                    <input name="id" value="<?= $content_get['id'] ?>" type="hidden">
                                                    <input name="old_image" value="<?= $content_get['content_image'] ?>" type="hidden">
                                                    <input name="category_id" value="<?= $content_get['category_id'] ?>" type="hidden">
                                                </form>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>