<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';

?>


<?php if ($_GET['page'] == "team_members") { ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ekip</h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sıra</label>
                                        <input type="text" name="sira" class="form-control" placeholder="Ekip sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip İsim</label>
                                        <input type="text" name="fullname" class="form-control" placeholder="Ekip başlık giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip Resim</label>
                                        <input type="file" name="image" class="form-control" placeholder="Ekip Resim giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip Konum</label>
                                        <input name="location" class="form-control" placeholder="Ekip konum giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip Açıklama</label>
                                        <textarea id="editor1" name="description" class="ckeditor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip Facebook Adı</label>
                                        <input name="facebook_username" class="form-control" placeholder="Ekip Facebook adı giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip İnstagram Adı</label>
                                        <input name="instagram_username" class="form-control" placeholder="Ekip İnstagram adı giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ekip Youtube Adı</label>
                                        <input name="youtube_username" class="form-control" placeholder="Ekip Youtube adı giriniz"></input>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="save_team_members" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['page'] == "gallery") { ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Galeri</h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri Resim</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri sıra</label>
                                        <input name="gallery_order" type="text" class="form-control" placeholder="Lütfen sıra giriniz.">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="gallery_save" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['page'] == "blogs") { ?>
    <br>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Blog</h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sıra</label>
                                        <input type="text" name="sira" class="form-control" placeholder="Blog sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Başlık</label>
                                        <input type="text" name="title" class="form-control" placeholder="Blog başlık giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Açıklama</label>
                                        <input type="editor1" name="description" class="form-control" placeholder="Blog açıklama giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Resim</label>
                                        <input type="file" name="image" class="form-control" placeholder="Blog Resim giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Anahtar Kelime</label>
                                        <input name="keywords" class="form-control" placeholder="Blog Anahtar Kelime giriniz"></input>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="save_blog" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['page'] == "category") {   ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <br>
                            <div class="card-header">
                                <h3 class="card-title">Kategori</h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Başlık</label>
                                        <input name="title" type="text" class="form-control" placeholder="Lütfen başlık giriniz.">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori sıra</label>
                                        <input name="category_order" type="text" class="form-control" placeholder="Lütfen sıra giriniz.">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori durum</label>
                                        <div class="form-group">
                                            <select class="form-control select2" style="width: 100%;" name="status">
                                                <option value="1" selected="selected">Aktif</option>
                                                <option value="2">Pasif</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="category_save" class="btn btn-primary " style="float:right;">Kaydet</button>
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