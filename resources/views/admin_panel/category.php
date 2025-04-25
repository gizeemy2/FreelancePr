<?php require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';

?>


<div class="content-wrapper">

    <section class="content">
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kategoriler</h3><br>
                <?php if (@$_GET['status'] == "ok") { ?>
                    <p style="color:green ; ">İşlem başarılı</p>
                <?php } elseif (@$_GET['status'] == "no") { ?>
                    <p style="color:red ; ">İşlem başarısız</p>

                <?php }  ?>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                Sıra
                            </th>
                            <th>
                                Başlık
                            </th>
                            <th>
                                Durum
                            </th>
                            <th></th>
                            <a href="add.php?page=category"> <button style="float:right; margin-top:15px ; margin-right:15px;" class="btn btn-info">Yeni ekle</button></a>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $category_sql = $pdo->prepare("SELECT * FROM category order by category_order ASC");
                        $category_sql->execute(array());
                        while ($category_get = $category_sql->fetch(PDO::FETCH_ASSOC)) {
                            
                        ?>
                            <tr>
                                <td>
                                    <?php echo $category_get['category_order'] ?>
                                </td>
                                <td>
                                    <a>
                                        <?php echo $category_get['title'] ?>
                                    </a>
                                    <br />
                                    <small>
                                        <?php echo $category_get['created_date'] ?>
                                    </small>
                                </td>
                                <td>
                                    <?php if ($category_get['status'] == "1") { ?>
                                        <span class="badge badge-success">Aktif</span>

                                    <?php  } else {  ?>
                                        <span class="badge badge-danger">Pasif</span>
                                    <?php } ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="content.php?category_id=<?php echo $category_get['id'] ?>">
                                        <i class="fas fa-folder">
                                        </i>
                                        Görüntüle
                                    </a>
                                    <a class="btn btn-success btn-sm" href="edit.php?page=category&id=<?php echo $category_get['id'] ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Düzenle
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="process.php?category_delete&id=<?php echo $category_get['id'] ?>">
                                        <i class="fas fa-trash">
                                        </i>
                                        Sil
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>