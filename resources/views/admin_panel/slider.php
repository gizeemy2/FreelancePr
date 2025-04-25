<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';


$slider_sql = $pdo->prepare("SELECT * FROM sliders where id=?");
$slider_sql->execute(array(1));
$slider_get = $slider_sql->fetch(PDO::FETCH_ASSOC);



?>
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
                            <h3 class="card-title">Slider</h3>
                        </div>
                        <form action="process.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Resim</label>
                                    <br>
                                    <img style="width: 100px;" src="images/sliders/<?=$slider_get['image']?>">
                                </div>
                                <input type="hidden" name="old_image" value="<?=$slider_get['image'] ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Resim</label>
                                    <input type="file" name="image" class="form-control" placeholder="Slider Resim giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Başlık</label>
                                    <input type="text" name="title" value="<?= $slider_get['title'] ?>" class="form-control" placeholder="Slider başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Buton İsmi</label>
                                    <input type="text" name="button_name" value="<?= $slider_get['button_name'] ?>" class="form-control" placeholder="Slider başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Buton Linki</label>
                                    <input type="text" name="button_link" value="<?= $slider_get['button_link'] ?>" class="form-control" placeholder="Slider başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Açıklama</label>
                                    <!-- <textarea id="editor1" name="description" class="ckeditor"><?=$slider_get['description'] ?></textarea> -->
                                    <textarea name="description" id="editor"><?=$slider_get['description'] ?></textarea>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="save_sliders" class="btn btn-primary " style="float:right;">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>




<?php require_once __DIR__ . '/footer.php'; ?>



<script>
        ClassicEditor
    .create( document.querySelector( '#editor' ), {
        ckfinder: {
            uploadUrl: '/admin_panel/upload.php'
        }
        // Diğer yapılandırma seçenekleri buraya eklenebilir.
    } )
    .catch( error => {
        console.error( error );
    } );
</script>