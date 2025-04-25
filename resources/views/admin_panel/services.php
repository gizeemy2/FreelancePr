<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';


$services_sql = $pdo->prepare("SELECT * FROM services");
$services_sql->execute();
$services_get = $services_sql->fetchAll(PDO::FETCH_ASSOC);

// print_r( $services_sql);


?>
<style>
    .dashed-hr {
        border-top: 1px dashed #000;
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] == "ok") { ?>
                                <p style="color:green;">Ayarlar başarıyla güncellendi</p>
                            <?php } elseif ($_GET['status'] == "no") { ?>
                                <p style="color:red;">İşlem başarısız</p>
                        <?php }
                        }
                        ?>
                        <div class="card-header">
                            <h3 class="card-title">Servisler</h3>
                        </div>
                        <form action="process.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Servis Başlık</label>
                                    <input type="text" name="services_name" class="form-control" placeholder="Slider başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Servis Açıklama</label>
                                    <!-- <textarea id="editor1" name="services_description" class="ckeditor"></textarea> -->
                                    <textarea name="description" id="editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İkon</label>
                                    <input type="text" name="icon_class" class="form-control" placeholder="İkon sınıfını giriniz">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="save_services" class="btn btn-primary " style="float:right;">Kaydet</button>
                            </div>
                        </form>

                        <hr class="dashed-hr">
                        <div class="col-md-12">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Servis Adı</th>
                                        <th>Servis Açıklaması</th>
                                        <th>İkon Sınıfı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($services_get as $service) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($service['id']) ?></td>
                                            <td><?= htmlspecialchars($service['services_name']) ?></td>
                                            <td><?= htmlspecialchars($service['services_description']) ?></td>
                                            <td><?= htmlspecialchars($service['icon_class']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>




<?php require_once __DIR__ . '/footer.php'; ?>



<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '/admin_panel/upload.php'
            }
            // Diğer yapılandırma seçenekleri buraya eklenebilir.
        })
        .catch(error => {
            console.error(error);
        });
</script>