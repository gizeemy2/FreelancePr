<?php require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';



$blog_sql = $pdo->prepare("SELECT * FROM blogs order by blogs_order asc ");
$blog_sql->execute(array());




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
                            <h3 class="card-title">Blog Galerisi</h3>
                            <a href="add.php?page=blogs">
                            <button type="submit" class="btn btn-info" style="float:right;">Yeni Blog Ekle</button></a>
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
                                        <th>Blog Sıra</th>
                                        <th>Blog Resim</th>            
                                        <th>Blog Başlık</th>            
                                        <th> Düzenle</th>
                                        <th> Sil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($blog_get= $blog_sql->fetch(PDO::FETCH_ASSOC)) {  ?>
                                        <tr>
                                            <td><?=$blog_get['blogs_order']?></td>                                         
                                            <td><img style="max-height:150px;max-width:150px;" src="images/blog/<?=$blog_get['image'] ?>" ></td>                                         
                                            <td> <?=$blog_get['title'] ?></td>     
                                            <td><a href="edit.php?page=blogs&id=<?=$blog_get['id']?>"><button type="submit" class="btn btn-success" >Blog Düzenle</button></td>
                                            <td>
                                                <form action="process.php" method="post" >
                                                    <button name="blog_delete" type="submit" class="btn btn-danger" > Sil</button>
                                                    <input name="id" value="<?=$blog_get['id']?>" type="hidden">
                                                    <input name="old_image"  value="<?=$blog_get['image']?>"  type="hidden">
                                                </form>
                                            </td>
                                        <tr>
                                        <?php } ?>
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