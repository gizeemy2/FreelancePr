<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';


$setting_sql = $pdo->prepare("SELECT * FROM settings where id=?");
$setting_sql->execute(array(1));
$setting_get = $setting_sql->fetch(PDO::FETCH_ASSOC);


?>


<?php if ($_GET['page'] == "settings") { ?>

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
                                <h3 class="card-title">Ayarlar</h3>
                            </div>
                            <form action="process.php" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Site Başlığı</label>
                                        <input type="text" name="title" value="<?= $setting_get['title'] ?>" class="form-control" placeholder="Site başlığı giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Site Açıklaması</label>
                                        <input type="text" name="description" value="<?= $setting_get['description'] ?>" class="form-control" placeholder="Site açıklaması giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Site Anahtar Kelime</label>
                                        <input type="text" name="keyword" value="<?= $setting_get['keyword'] ?>" class="form-control" placeholder="Site anahtar kelime giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Site Adres</label>
                                        <input type="text" name="adress" class="form-control" value="<?= $setting_get['adress'] ?>" placeholder="Site anahtar kelime giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Site Telefon Numarası</label>
                                        <input type="text" name="phone" class="form-control" value="<?= $setting_get['phone'] ?>" placeholder="Site telefon numarası giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Site email adresi </label>
                                        <input type="text" name="email" class="form-control" value="<?= $setting_get['email'] ?>" placeholder="Site email adresi giriniz">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="save_setting" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

<?php }  elseif ($_GET['page'] == "social") {  ?>
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
                                <h3 class="card-title">Sosyal Medya Ayarları</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="process.php" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input type="text" name="facebook" value="<?= $setting_get['social_facebook'] ?>" class="form-control" placeholder="Facebook kullanıcı adı giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İnstagram</label>
                                        <input type="text" name="instagram" value="<?= $setting_get['social_instagram'] ?>" class="form-control" placeholder="İnstagram kullanıcı adı giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Youtube</label>
                                        <input type="text" name="youtube" value="<?= $setting_get['social_youtube'] ?>" class="form-control" placeholder="Youtube kullanıcı adı giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="<?= $setting_get['social_twitter'] ?>" placeholder="Twitter kullanıcı adı giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" value="<?= $setting_get['social_linkedin'] ?>" placeholder="Linkedin kullanıcı adı giriniz">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="save_social" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>



<?php require_once __DIR__ . '/footer.php'; ?>