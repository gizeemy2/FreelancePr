<?php
require_once __DIR__ . '/header.php';
require_once  __DIR__ .'/left_menu.php';

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
                                        <input type="text" name="content_order" class="form-control" placeholder="İçerik sıra giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Başlık</label>
                                        <input type="text" name="content_title" class="form-control" placeholder="İçerik başlık giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Resim</label>
                                        <input type="file" name="content_image" class="form-control" placeholder="İçerik Resim giriniz">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Açıklama</label>
                                        <!-- <textarea id="editor1" name="content_description" class="ckeditor"></textarea> -->
                                        <textarea name="content_description" id="editor"></textarea>

                                    </div>
                                    
                                    <input type="hidden" name="category_id" value="<?= $_GET['category_id'] ?>">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İçerik Anahtar Kelimeler</label>
                                        <input name="content_keyword" class="form-control" placeholder="İçerik Anahtar Kelimeler giriniz"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Eklenme Tarihi</label>
                                        <input name="created_date" type="date" class="form-control" placeholder="Tarih seçiniz">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="save_content" class="btn btn-primary " style="float:right;">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>








<?php require_once 'footer.php'; ?>


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