<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';

$id = $_GET['id'];

$team_members_sql = $pdo->prepare("SELECT * FROM team_members where id=$id ");
$team_members_sql->execute(array());
$team_members_get = $team_members_sql->fetch(PDO::FETCH_ASSOC);
?>


<?php if ($_GET['page'] == "team_members") {

    $teamsor = $pdo->prepare("SELECT * FROM team_members where id=:id");
    $teamsor->execute(array(
        'id' => $_GET['id']
    ));
    $team_get = $teamsor->fetch(PDO::FETCH_ASSOC);


?>
    <br>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> <?= $team_members_get['fullname'] ?> / Üyesini Düzenle </h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Sıra</label>
                                        <input value="<?= $team_get['team_order'] ?>" type="text" name="sira" class="form-control" placeholder="Ekip sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip İsim</label>
                                        <input value="<?= $team_get['fullname'] ?>" type="text" name="fullname" class="form-control" placeholder="Ekip başlık giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip Resim</label>
                                        <br>
                                        <img src="images/team_members/<?= $team_get['image'] ?>" style="width:150px;">
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip Resim</label>
                                        <input type="file" name="image" class="form-control" placeholder="Ekip Resim giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip Konum</label>
                                        <input value="<?= $team_get['location'] ?>" name="location" class="form-control" placeholder="Ekip konum giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip Açıklama</label>
                                        <textarea id="editor1" name="description" class="ckeditor"> <?= $team_get['description'] ?> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip Facebook Adı</label>
                                        <input value="<?= $team_get['facebook_username'] ?>" name="facebook_username" class="form-control" placeholder="Ekip Facebook adı giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip İnstagram Adı</label>
                                        <input value="<?= $team_get['instagram_username'] ?>" name="instagram_username" class="form-control" placeholder="Ekip İnstagram adı giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Ekip Youtube Adı</label>
                                        <input value="<?= $team_get['youtube_username'] ?>" name="youtube_username" class="form-control" placeholder="Ekip Youtube adı giriniz"></input>
                                    </div>
                                </div>
                                <input type="hidden" name="old_image" value="<?= $team_get['image'] ?>">
                                <input type="hidden" name="id" value="<?= $team_get['id'] ?>">
                                <div class="card-footer">
                                    <button type="submit" name="edit_team_members" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

<?php } elseif ($_GET['page'] == "gallery") {

    $gallery_sor = $pdo->prepare("SELECT * FROM gallery where id=:id");
    $gallery_sor->execute(array(
        'id' => $_GET['id']
    ));
    $gallery_get = $gallery_sor->fetch(PDO::FETCH_ASSOC);

?>
    <br>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Galeri Düzenle </h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Sıra</label>
                                        <input value="<?= $gallery_get['gallery_order'] ?>" type="text" name="sira" class="form-control" placeholder="Galeri sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Galeri Resim</label>
                                        <br>
                                        <img src="images/gallery/<?= $gallery_get['image'] ?>" style="width:150px;">
                                    </div>
                                    <div class="form-group">
                                        <label>Galeri Resim</label>
                                        <input type="file" name="image" class="form-control" placeholder="Galeri Resim giriniz">
                                    </div>
                                </div>
                                <input type="hidden" name="old_image" value="<?= $gallery_get['image'] ?>">
                                <input type="hidden" name="id" value="<?= $gallery_get['id'] ?>">

                                <div class="card-footer">
                                    <button type="submit" name="edit_gallery" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>


<?php } elseif ($_GET['page'] == "blogs") {

    $blog_sql = $pdo->prepare("SELECT * FROM blogs where id=:id");
    $blog_sql->execute(array(
        'id' => $_GET['id']
    ));
    $blog_get = $blog_sql->fetch(PDO::FETCH_ASSOC);

?>
    <br>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Blog Düzenle </h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Blog Sıra</label>
                                        <input value="<?= $blog_get['blogs_order'] ?>" type="text" name="sira" class="form-control" placeholder="Galeri sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Resim</label>
                                        <br>
                                        <img src="images/blog/<?= $blog_get['image'] ?>" style="width:150px;">
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Resim</label>
                                        <input type="file" name="image" class="form-control" placeholder="Blog Resim giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Başlık</label>
                                        <input type="text" name="title" class="form-control" value="<?= $blog_get['title'] ?>" placeholder="Blog Başlık giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Anahtar Kelime </label>
                                        <input type="text" name="keywords" class="form-control " value="<?= $blog_get['blog_keywords'] ?>" placeholder="Blog Anahtar kelime giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Açıklama</label>
                                        <textarea id="editor1" name="description" class="ckeditor"><?= $blog_get['description'] ?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="old_image" value="<?= $blog_get['image'] ?>">
                                <input type="hidden" name="id" value="<?= $blog_get['id'] ?>">
                                <div class="card-footer">
                                    <button type="submit" name="edit_blog" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php } elseif ($_GET['page'] == "category") {

    $category_sql = $pdo->prepare("SELECT * FROM category where id=:id");
    $category_sql->execute(array(
        'id' => $_GET['id']
    ));
    $category_get = $category_sql->fetch(PDO::FETCH_ASSOC);
?>
<br>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Kategori Düzenle</h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kategori Sıra</label>
                                        <input value="<?= $category_get['category_order'] ?>" type="text" name="category_order" class="form-control" placeholder="Kategori sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Başlık</label>
                                        <input value="<?= $category_get['title'] ?>" type="text" name="title" class="form-control" placeholder="Kategori sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Durum</label>
                                        <select name="status" class="form-control select2" style="width: 100%;">
                                            <option value="1" <?php if ($category_get['status'] == "1") {
                                                                    echo "selected";
                                                                } ?>>Aktif</option>
                                            <option <?php if ($category_get['status'] == "2") {
                                                        echo "selected";
                                                    } ?> value="2">Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= $category_get['id'] ?>">
                                <div class="card-footer">
                                    <button type="submit" name="edit_category" class="btn btn-primary " style="float:right;">Kaydet</button>
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