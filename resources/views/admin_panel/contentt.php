<?php require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';



$gallery_sql = $pdo->prepare("SELECT * FROM gallery ");
$gallery_sql->execute(array());




// print_r($team_members_get['image']);
?>
<br>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Fotoğraf Galerisi</h3>
                            <a href="add.php?page=gallery">
                            <button type="submit" class="btn btn-info" style="float:right;">Yeni Fotoğraf Galerisi Ekle</button></a>
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
                                        <th>Galeri Sıra</th>
                                        <th>Galeri Resim</th>            
                                        <th> Düzenle</th>
                                        <th> Sil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($gallery_get= $gallery_sql->fetch(PDO::FETCH_ASSOC)) {                                          
                                     /* print_r($gallery_get['image']);   */?>
                                        <tr>
                                            <td><?=$gallery_get['gallery_order']?></td>                                         
                                            <td><img style="max-height:150px;max-width:150px;" src="images/gallery/<?=$gallery_get['image'] ?>" ></td>                                         
                                            <td><a href="edit.php?page=gallery&id=<?=$gallery_get['id']?>"><button type="submit" class="btn btn-success" >Galeri Düzenle</button>
                                            </td>
                                            <td>
                                                <form action="process.php" method="post" enctype="multipart/form-data">
                                                    <button name="gallery_delete" type="submit" class="btn btn-danger" > Sil</button>
                                                    <input name="id" value="<?=$gallery_get['id']?>" type="hidden">
                                                    <input name="old_image"  value="<?=$gallery_get['image']?>"  type="hidden">
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