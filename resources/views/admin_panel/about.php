<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';


ini_set('display_errors', '1');
ERROR_REPORTING(E_ALL);

$about_sql = $pdo->prepare("SELECT * FROM about where id=?");
$about_sql->execute(array(1));
$about_get = $about_sql->fetch(PDO::FETCH_ASSOC);


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
                            <h3 class="card-title">Hakkımızda</h3>
                        </div>
                        <form action="process.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hakkımızda Resim</label>
                                    <br>
                                    <img style="width: 100px;" src="admin_panel/images/about/<?=$about_get['image']?>">
                                </div>
                                <input type="hidden" name="old_image" value="<?=$about_get['image'] ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hakkımızda Resim</label>
                                    <input type="file" name="image" class="form-control" placeholder="Hakkımızda Resim giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hakkımızda Başlık</label>
                                    <input type="text" name="title" value="<?= $about_get['title'] ?>" class="form-control" placeholder="Hakkımızda başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hakkımızda Açıklama</label>
                                    <!-- <textarea id="editor1" name="description" class="ckeditor"><?=$about_get['description'] ?></textarea> -->
                                    <textarea name="description" id="editor"><?=$about_get['description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefon</label>
                                    <input type="text" name="phone" value="<?= $about_get['phone'] ?>" class="form-control" placeholder="Hakkımızda başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail</label>
                                    <input type="text" name="email" value="<?= $about_get['email'] ?>" class="form-control" placeholder="Hakkımızda başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Doğum Tarihi</label>
                                    <input type="text" name="birthday_date" value="<?= $about_get['birthday_date'] ?>" class="form-control" placeholder="Hakkımızda başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Yaş</label>
                                    <input type="text" name="age" value="<?= $about_get['age'] ?>" class="form-control" placeholder="Hakkımızda başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lisans Durumu</label>
                                    <input type="text" name="degree" value="<?= $about_get['degree'] ?>" class="form-control" placeholder="Hakkımızda başlık giriniz">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Şehir</label>
                                    <input type="text" name="city" value="<?= $about_get['city'] ?>" class="form-control" placeholder="Hakkımızda başlık giriniz">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="save_about" class="btn btn-primary " style="float:right;">Kaydet</button>
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