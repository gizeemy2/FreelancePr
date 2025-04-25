<?php
require_once __DIR__ . '/header.php';
require_once  __DIR__ .'/left_menu.php';
require_once __DIR__ . '/db_connection.php';




$content_sql = $pdo->prepare("SELECT * FROM content where id=:id");
$content_sql->execute(array(
        'id'=>$_GET['id']
));
$content_get = $content_sql->fetch(PDO::FETCH_ASSOC);

?>

<div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">İçerik</h3>
                            </div>
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Sıra</label>
                                        <input type="text" name="content_order" value="<?= $content_get['content_order'] ?>" class="form-control" placeholder="İçerik sıra giriniz">
                                    </div>
                                    <input type="hidden" name="category_id" value="<?php echo $content_get['category_id'] ?>">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Başlık</label>
                                        <input type="text" name="content_title" value="<?= $content_get['content_title'] ?>" class="form-control" placeholder="İçerik başlık giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label>İçerik Resim</label>
                                        <br>
                                        <img style="width:150px;" src="images/content/<?= $content_get['content_image'] ?>" style="width:150px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Resim</label>
                                        <input type="file" name="content_image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Açıklama</label>
                                        <!-- <textarea id="editor1" name="content_description" class="ckeditor"> <?= $content_get['content_description'] ?> </textarea> -->
                                        <textarea name="content_description" id="editor"><?= $content_get['content_description'] ?></textarea>

                                    </div>
                                    <input type="hidden" name="id" value="<?= $content_get['id'] ?>">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Anahtar Kelimeler</label>
                                        <input name="content_keyword" class="form-control" value="<?= $content_get['content_keyword'] ?>" placeholder="İçerik Anahtar Kelimeler giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Eklenme Tarihi</label>
                                        <input name="created_date" type="date"  value="<?= $content_get['created_date'] ?>" class="form-control" placeholder="Tarih seçiniz">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="edit_content" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>



    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script> -->
    <?php require_once 'footer.php'; ?>
    
    

<script>

        ClassicEditor
    .create( document.querySelector( '#editor' ), {
        ckfinder: {
            uploadUrl: '/kelly/admin_panel/upload.php'
        }
        // Diğer yapılandırma seçenekleri buraya eklenebilir.
    } )
    .catch( error => {
        console.error( error );
    } );
</script>