<?php require_once __DIR__ . '/header.php';
require_once __DIR__ . '/left_menu.php';
require_once __DIR__ . '/db_connection.php';



$team_members_sql = $pdo->prepare("SELECT * FROM team_members ");
$team_members_sql->execute(array());

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
                            <h3 class="card-title">Ekip Üyeleri</h3>
                            <a href="add.php?page=team_members">
                            <button type="submit" class="btn btn-info" style="float:right;">Yeni Ekip Üyesi Ekle</button></a>
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
                                        <th>Ekip Sıra</th>
                                        <th>Ekip Resim</th>
                                        <th>Ekip Ad Soyad</th>
                                        <th>Ekip Açıklama</th>
                                        <th>Ekip Konum</th>
                                        <th>Ekip Facebook</th>
                                        <th>Ekip İnstagram</th>
                                        <th>Ekip Youtube</th>
                                        <th>Ekip Üyesi Düzenle</th>
                                        <th>Ekip Üyesi Sil</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($team_members_get = $team_members_sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><?= $team_members_get['team_order'] ?></td>
                                            <td><img style="max-height:150px;max-width:150px;" src="images/team_members/<?=$team_members_get['image']?>" ></td>
                                            <td><?= $team_members_get['fullname'] ?></td>
                                            <td><?= $team_members_get['description'] ?></td>
                                            <td><?= $team_members_get['location'] ?></td>
                                            <td><?= $team_members_get['facebook_username'] ?></td>
                                            <td><?= $team_members_get['instagram_username'] ?></td>
                                            <td><?= $team_members_get['youtube_username'] ?></td>
                                            <td><a href="edit.php?page=team_members&id=<?=$team_members_get['id']?>"><button type="submit" class="btn btn-success" style="float:right;">Ekip Üyesi Düzenle</button>
                                            </td>
                                            <td>
                                                <form action="process.php" method="post">

                                                    <button name="team_member_delete" type="submit" class="btn btn-danger" style="float:right;">Ekip Üyesi Sil</button>
                                                    <input name="id" value="<?=$team_members_get['id']?>" type="hidden">
                                                    <input name="old_image"  value="<?=$team_members_get['image']?>"  type="hidden">
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