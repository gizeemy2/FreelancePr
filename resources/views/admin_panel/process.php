<?php
session_start();
require_once __DIR__ . '/db_connection.php';

if (isset($_POST['save_setting'])) {

    $save = $pdo->prepare("UPDATE settings SET 
        title=:title,
        description=:description,
        keyword=:keyword,
        adress=:adress,
        phone=:phone,
        email=:email
    ");

    $update = $save->execute(array(
        'title' => htmlspecialchars($_POST['title']),
        'description' => htmlspecialchars($_POST['description']),
        'keyword' => htmlspecialchars($_POST['keyword']),
        'adress' => htmlspecialchars($_POST['adress']),
        'phone' => htmlspecialchars($_POST['phone']),
        'email' => htmlspecialchars($_POST['email']),

    ));
    if ($update) {
        header('Location: /Kelly/admin_panel/settings.php?page=settings&status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/settings.php?page=settings&status=no');
        exit();
    }
}



if (isset($_POST['save_social'])) {

    $save = $pdo->prepare("UPDATE settings SET 
    social_facebook=:social_facebook,
    social_instagram=:social_instagram,
    social_youtube=:social_youtube,
    social_twitter=:social_twitter,
    social_linkedin=:social_linkedin
");

    $update = $save->execute(array(
        'social_facebook' => htmlspecialchars($_POST['facebook']),
        'social_instagram' => htmlspecialchars($_POST['instagram']),
        'social_youtube' => htmlspecialchars($_POST['youtube']),
        'social_twitter' => htmlspecialchars($_POST['twitter']),
        'social_linkedin' => htmlspecialchars($_POST['linkedin'])
    ));
    if ($update) {
        header('Location: /Kelly/admin_panel/settings.php?page=social&status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/settings.php?page=social&status=no');
        exit();
    }
}


if (isset($_POST['save_about'])) {

    if ($_FILES['image']["size"] > 0) {
        $uploads_dir = 'images/about';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $sayi1 = rand(1, 100000);
        $sayi2 = rand(1, 100000);
        $sayi3 = rand(1, 100000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $image_name = $sayilar . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

        $save = $pdo->prepare("UPDATE about SET 
        title=:title,
        description=:description,
        image=:image,
        phone=:phone,
        email=:email,
        birthday_date=:birthday_date,
        degree=:degree,
        city=:city,
        age=:age

        ");
        $update = $save->execute(array(
            'title' => htmlspecialchars($_POST['title']),
            'description' => $_POST['description'],
            'image' => $image_name,
            'phone' => $_POST['phone'],
            'email' =>  $_POST['email'],
            'birthday_date' => $_POST['birthday_date'],
            'degree' => $_POST['degree'],
            'city' => $_POST['city'],
            'age' => $_POST['age']
        ));

        if ($update) {
            $oldimage = $_POST['old_image'];
            unlink("images/about/$oldimage");
            header('Location: /kelly/admin_panel/about.php?status=ok');
            exit();
        } else {
            header('Location: /kelly/admin_panel/about.php?status=no');
            exit();
        }
    } else {
        $save = $pdo->prepare("UPDATE about SET 
            title=:title,
            description=:description,
            phone=:phone,
            email=:email,
            birthday_date=:birthday_date,
            degree=:degree,
            city=:city,
            age=:age
            ");
        $update = $save->execute(array(
            'title' => htmlspecialchars($_POST['title']),
            'description' => $_POST['description'],
            'phone' => $_POST['phone'],
            'email' =>  $_POST['email'],
            'birthday_date' => $_POST['birthday_date'],
            'degree' => $_POST['degree'],
            'city' => $_POST['city'],
            'age' => $_POST['age']
        ));
        if ($update) {
            header('Location: /kelly/admin_panel/about.php?status=ok');
            exit();
        } else {
            header('Location: /kelly/admin_panel/about.php?status=no');
            exit();
        }
    }
}

if (isset($_POST['save_sliders'])) {

    if ($_FILES['image']["size"] > 0) {
        $uploads_dir = 'images/sliders';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $sayi1 = rand(1, 100000);
        $sayi2 = rand(1, 100000);
        $sayi3 = rand(1, 100000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $image_name = $sayilar . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

        $save = $pdo->prepare("UPDATE sliders SET 
        title=:title,
        description=:description,
        button_name=:button_name,
        button_link=:button_link,
        image=:image
        ");
        $update = $save->execute(array(
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'button_name' =>  $_POST['button_name'],
            'button_link' =>  $_POST['button_link'],
            'image' => $image_name
        ));

        if ($update) {
            $oldimage = $_POST['old_image'];
            unlink("images/sliders/$oldimage");
            header('Location: /Kelly/admin_panel/slider.php?status=ok');
            exit();
        } else {
            header('Location: /Kelly/admin_panel/slider.php?status=no');
            exit();
        }
    } else {
        $save = $pdo->prepare("UPDATE sliders SET 
            title=:title,
            description=:description,
            button_name=:button_name,
            button_link=:button_link
            ");
        $update = $save->execute(array(
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'button_name' =>  $_POST['button_name'],
            'button_link' =>  $_POST['button_link']
        ));
        if ($update) {
            header('Location: /kelly/admin_panel/slider.php?status=ok');
            exit();
        } else {
            header('Location: /kelly/admin_panel/slider.php?status=no');
            exit();
        }
    }
}





if (isset($_POST['save_services'])) {

    // $uploads_dir = 'images/team_members';
    // @$tmp_name = $_FILES['image']["tmp_name"];
    // @$name = $_FILES['image']["name"];
    // $sayi1 = rand(1, 100000);
    // $sayi2 = rand(1, 100000);
    // $sayi3 = rand(1, 100000);
    // $sayilar = $sayi1 . $sayi2 . $sayi3;
    // $image_name = $sayilar . $name;
    // move_uploaded_file($tmp_name, "$uploads_dir/$image_name");


    $save = $pdo->prepare("INSERT INTO services SET 
    services_name = :services_name, 
    services_description = :services_description,
    icon_class = :icon_class
    ");


    $insert = $save->execute(array(
        'services_name' => htmlspecialchars($_POST['services_name']),
        'services_description' => $_POST['services_description'],
        'icon_class' => $_POST['icon_class']
    ));
    if ($insert) {
        header('Location: /Kelly/admin_panel/services.php?page=services&status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/services.php?page=services&status=no');
        exit();
    }
}


if (isset($_POST['save_team_members'])) {

    $uploads_dir = 'images/team_members';
    @$tmp_name = $_FILES['image']["tmp_name"];
    @$name = $_FILES['image']["name"];
    $sayi1 = rand(1, 100000);
    $sayi2 = rand(1, 100000);
    $sayi3 = rand(1, 100000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $image_name = $sayilar . $name;
    move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

    $save = $pdo->prepare("INSERT INTO team_members SET 
        fullname=:fullname,
        location=:location,
        team_order=:team_order,
        description=:description,
        facebook_username=:facebook_username,
        instagram_username=:instagram_username,
        youtube_username=:youtube_username,
        image=:image
    ");

    $insert = $save->execute(array(
        'fullname' => htmlspecialchars($_POST['fullname']),
        'location' => htmlspecialchars($_POST['location']),
        'team_order' => htmlspecialchars($_POST['sira']),
        'description' => $_POST['description'],
        'facebook_username' => htmlspecialchars($_POST['facebook_username']),
        'instagram_username' => htmlspecialchars($_POST['instagram_username']),
        'youtube_username' => htmlspecialchars($_POST['youtube_username']),
        'image' => $image_name

    ));
    if ($insert) {
        header('Location: /Kelly/admin_panel/team_members.php?page=team_members&status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/team_members.php?page=team_members&status=no');
        exit();
    }
}


if (isset($_POST['edit_team_members'])) {

    if ($_FILES['image']["size"] > 0) {
        $uploads_dir = 'images/team_members';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $sayi1 = rand(1, 100000);
        $sayi2 = rand(1, 100000);
        $sayi3 = rand(1, 100000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $image_name = $sayilar . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

        $save = $pdo->prepare("UPDATE team_members SET 
        fullname=:fullname,
        location=:location,
        team_order=:team_order,
        description=:description,
        facebook_username=:facebook_username,
        instagram_username=:instagram_username,
        youtube_username=:youtube_username,
        image=:image
        where id={$_POST['id']}

        ");
        $update = $save->execute(array(
            'fullname' => htmlspecialchars($_POST['fullname']),
            'location' => htmlspecialchars($_POST['location']),
            'team_order' => htmlspecialchars($_POST['sira']),
            'description' => $_POST['description'],
            'facebook_username' => htmlspecialchars($_POST['facebook_username']),
            'instagram_username' => htmlspecialchars($_POST['instagram_username']),
            'youtube_username' => htmlspecialchars($_POST['youtube_username']),
            'image' => $image_name

        ));

        if ($update) {
            $oldimage = $_POST['old_image'];
            unlink("images/sliders/$oldimage");
            header('Location: /Kelly/admin_panel/team_members.php?status=ok');
            exit();
        } else {
            header('Location: /Kelly/admin_panel/team_members.php?status=no');
            exit();
        }
    } else {
        $save = $pdo->prepare("UPDATE team_members SET 
            fullname=:fullname,
            location=:location,
            team_order=:team_order,
            description=:description,
            facebook_username=:facebook_username,
            instagram_username=:instagram_username,
            youtube_username=:youtube_username
            where id={$_POST['id']}
            ");
        $update = $save->execute(array(
            'fullname' => htmlspecialchars($_POST['fullname']),
            'location' => htmlspecialchars($_POST['location']),
            'team_order' => htmlspecialchars($_POST['sira']),
            'description' => $_POST['description'],
            'facebook_username' => htmlspecialchars($_POST['facebook_username']),
            'instagram_username' => htmlspecialchars($_POST['instagram_username']),
            'youtube_username' => htmlspecialchars($_POST['youtube_username'])
        ));
        if ($update) {
            header('Location: /Kelly/admin_panel/team_members.php?status=ok');
            exit();
        } else {
            header('Location: /Kelly/admin_panel/team_members.php?status=no');
            exit();
        }
    }
}

if (isset($_POST['team_member_delete'])) {
    $oldimage = $_POST['old_image'];
    unlink("images/team_members/$oldimage");

    $delete = $pdo->prepare("DELETE  FROM team_members where id=:id");
    $delete->execute(array(
        'id' => $_POST['id']
    ));
    if ($delete) {
        header('Location: /Kelly/admin_panel/team_members.php?status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/team_members.php?status=no');
        exit();
    }
}


if (isset($_POST['gallery_save'])) {

    $uploads_dir = 'images/gallery';
    @$tmp_name = $_FILES['image']["tmp_name"];
    @$name = $_FILES['image']["name"];
    $sayi1 = rand(1, 100000);
    $sayi2 = rand(1, 100000);
    $sayilar = $sayi1 . $sayi2;
    $image_name = $sayilar . $name;
    move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

    $save = $pdo->prepare("INSERT INTO gallery SET 
        gallery_order=:gallery_order,
        image=:image
    ");

    $insert = $save->execute(array(
        'image' => $image_name,
        'gallery_order' => htmlspecialchars($_POST['gallery_order'])
    ));
    if ($insert) {
        header('Location: /Kelly/admin_panel/gallery.php?&status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/gallery.php?&status=no');
        exit();
    }
}



if (isset($_POST['edit_gallery'])) {

    if ($_FILES['image']["size"] > 0) {
        $uploads_dir = 'images/gallery';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $sayi1 = rand(1, 100000);
        $sayi2 = rand(1, 100000);
        $sayi3 = rand(1, 100000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $image_name = $sayilar . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$image_name");


        $save = $pdo->prepare("UPDATE gallery SET 
        gallery_order=:gallery_order,
        image=:image
        where id={$_POST['id']}
        ");
        $update = $save->execute(array(
            'image' => $image_name,
            'gallery_order' => htmlspecialchars($_POST['sira'])

        ));

        if ($update) {
            $oldimage = $_POST['old_image'];
            unlink("images/gallery/$oldimage");
            header('Location: /Kelly/admin_panel/gallery.php?status=ok');
            exit();
        } else {
            header('Location: /Kelly/admin_panel/gallery.php?status=no');
            exit();
        }
    } else {
        $save = $pdo->prepare("UPDATE gallery SET 
            gallery_order=:gallery_order
            where id={$_POST['id']}
            ");
        $update = $save->execute(array(
            'gallery_order' => htmlspecialchars($_POST['sira'])
        ));
        if ($update) {
            header('Location: /Kelly/admin_panel/gallery.php?status=ok');
            exit();
        } else {
            header('Location: /Kelly/admin_panel/gallery.php?status=no');
            exit();
        }
    }
}


if (isset($_POST['gallery_delete'])) {
    $oldimage = $_POST['old_image'];
    unlink("images/gallery/$oldimage");

    $delete = $pdo->prepare("DELETE  FROM gallery where id=:id");
    $delete->execute(array(
        'id' => $_POST['id']
    ));
    if ($delete) {
        header('Location: /Kelly/admin_panel/gallery.php?status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/gallery.php?status=no');
        exit();
    }
}



if (isset($_POST['save_blog'])) {

    $uploads_dir = 'images/blog';
    @$tmp_name = $_FILES['image']["tmp_name"];
    @$name = $_FILES['image']["name"];
    $sayi1 = rand(1, 100000);
    $sayi2 = rand(1, 100000);
    $sayi3 = rand(1, 100000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $image_name = $sayilar . $name;
    move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

    $save = $pdo->prepare("INSERT INTO blogs SET 
        title=:title,
        blog_keywords=:blog_keywords,
        blogs_order=:blogs_order,
        description=:description,
        image=:image
    ");

    $insert = $save->execute(array(
        'title' => htmlspecialchars($_POST['title']),
        'description' => $_POST['description'],
        'blogs_order' => htmlspecialchars($_POST['sira']),
        'blog_keywords' => htmlspecialchars($_POST['keywords']),
        'image' => $image_name

    ));
    if ($insert) {
        header('Location: /Kelly/admin_panel/blogs.php?page=blogs&status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/blogs.php?page=blogs&status=no');
        exit();
    }
}




if (isset($_POST['edit_blog'])) {

    if ($_FILES['image']["size"] > 0) {
        $uploads_dir = 'images/blog';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $sayi1 = rand(1, 100000);
        $sayi2 = rand(1, 100000);
        $sayi3 = rand(1, 100000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $image_name = $sayilar . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

        $save = $pdo->prepare("UPDATE blogs SET 
        title=:title,
        blog_keywords=:blog_keywords,
        blogs_order=:blogs_order,
        description=:description,
        image=:image
        where id={$_POST['id']}

        ");
        $update = $save->execute(array(
            'title' => htmlspecialchars($_POST['title']),
            'description' => $_POST['description'],
            'blogs_order' => htmlspecialchars($_POST['sira']),
            'blog_keywords' => htmlspecialchars($_POST['keywords']),
            'image' => $image_name
        ));

        if ($update) {
            $oldimage = $_POST['old_image'];
            unlink("images/blog/$oldimage");
            header('Location: /Kelly/admin_panel/blogs.php?status=ok');
            exit();
        } else {
            header('Location: /Kelly/admin_panel/blogs.php?status=no');
            exit();
        }
    } else {
        $save = $pdo->prepare("UPDATE blogs SET 
                title=:title,
                blog_keywords=:blog_keywords,
                blogs_order=:blogs_order,
                description=:description
                where id={$_POST['id']}
            ");
        $update = $save->execute(array(
            'title' => htmlspecialchars($_POST['title']),
            'description' => $_POST['description'],
            'blogs_order' => htmlspecialchars($_POST['sira']),
            'blog_keywords' => htmlspecialchars($_POST['keywords'])
        ));
        if ($update) {
            header('Location: /Kelly/admin_panel/blogs.php?status=ok');
            exit();
        } else {
            header('Location: /Kelly/admin_panel/blogs.php?status=no');
            exit();
        }
    }
}
if (isset($_POST['blog_delete'])) {
    $oldimage = $_POST['old_image'];
    unlink("images/blog/$oldimage");

    $delete = $pdo->prepare("DELETE  FROM blogs where id=:id");
    $delete->execute(array(
        'id' => $_POST['id']
    ));
    if ($delete) {
        header('Location: /Kelly/admin_panel/blogs.php?status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/blogs.php?status=no');
        exit();
    }
}


if (isset($_POST['category_save'])) {

    $save = $pdo->prepare("INSERT INTO category SET 
        title=:title,
        category_order=:category_order,
        status=:status
    ");

    $insert = $save->execute(array(
        'title' => htmlspecialchars($_POST['title']),
        'category_order' => htmlspecialchars($_POST['category_order']),
        'status' => htmlspecialchars($_POST['status'])
    ));
    if ($insert) {
        header('Location: /Kelly/admin_panel/category.php?&status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/category.php?&status=no');
        exit();
    }
}



if (isset($_POST['edit_category'])) {

    $save = $pdo->prepare("UPDATE category SET 
        title=:title,
        status=:status,
        category_order=:category_order
        where id={$_POST['id']}
        ");
    $update = $save->execute(array(
        'title' => htmlspecialchars($_POST['title']),
        'category_order' => htmlspecialchars($_POST['category_order']),
        'status' => htmlspecialchars($_POST['status'])
    ));

    if ($update) {
        header('Location: /Kelly/admin_panel/category.php?status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/category.php?status=no');
        exit();
    }
}



if (isset($_GET['category_delete'])) {
    $categoryId = $_GET['id'];

    $delete = $pdo->prepare("DELETE FROM category WHERE id=:id");
    $delete->execute(array('id' => $categoryId));

    if ($delete) {
        header('Location: /Kelly/admin_panel/category.php?status=ok');
        exit();
    } else {
        header('Location: /Kelly/admin_panel/category.php?status=no');
        exit();
    }
}



if (isset($_POST['save_content'])) {
    $category_id = $_POST['category_id'];

    $uploads_dir = 'images/content';
    @$tmp_name = $_FILES['content_image']["tmp_name"];
    @$name = $_FILES['content_image']["name"];
    $sayi1 = rand(1, 100000);
    $sayi2 = rand(1, 100000);
    $sayi3 = rand(1, 100000);
    $sayilar = $sayi1 . $sayi2 . $sayi3;
    $image_name = $sayilar . $name;
    move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

    $save = $pdo->prepare("INSERT INTO content SET 
        content_order=:content_order,
        content_title=:content_title,
        content_description=:content_description,
        content_image=:content_image,
        category_id=:category_id,
        content_keyword=:content_keyword,
        created_date=:created_date
    ");

    $insert = $save->execute(array(
        'content_order' => htmlspecialchars($_POST['content_order']),
        'content_title' => htmlspecialchars($_POST['content_title']),
        'content_description' => $_POST['content_description'],
        'content_keyword' => $_POST['content_keyword'],
        'category_id' => htmlspecialchars($_POST['category_id']),
        'content_image' => $image_name,
        'created_date' => $_POST['created_date']

    ));
    if ($insert) {
        header("Location: /Kelly/admin_panel/content.php?category_id=$category_id&status=ok");
        exit();
    } else {
        header("Location: /Kelly/admin_panel/content.php?category_id=$category_id&status=no");
        exit();
    }
}


if (isset($_POST['content_delete'])) {
    $cat_id = $_POST['category_id'];


    $oldimage = $_POST['old_image'];
    unlink("images/content/$oldimage");

    $delete = $pdo->prepare("DELETE  FROM content where id=:id");
    $delete->execute(array(
        'id' => $_POST['id']
    ));
    if ($delete) {
        header("Location: /Kelly/admin_panel/content.php?category_id=$cat_id&status=ok");
        exit();
    } else {
        header("Location: /Kelly/admin_panel/content.php?category_id=$cat_id&status=no");
        exit();
    }
}



if (isset($_POST['edit_content'])) {

    $category_id = $_POST['category_id'];


    if ($_FILES['content_image']["size"] > 0) {
        $uploads_dir = 'images/content';
        @$tmp_name = $_FILES['content_image']["tmp_name"];
        @$name = $_FILES['content_image']["name"];
        $sayi1 = rand(1, 100000);
        $sayi2 = rand(1, 100000);
        $sayi3 = rand(1, 100000);
        $sayilar = $sayi1 . $sayi2 . $sayi3;
        $image_name = $sayilar . $name;
        move_uploaded_file($tmp_name, "$uploads_dir/$image_name");

        $save = $pdo->prepare("UPDATE content SET 
         content_order=:content_order,
        content_title=:content_title,
        content_description=:content_description,
        content_image=:content_image,
        category_id=:category_id,
        content_keyword=:content_keyword,
        created_date=:created_date


        where id={$_POST['id']}

        ");
        $update = $save->execute(array(

            'content_title' => htmlspecialchars($_POST['content_title']),
            'content_order' => htmlspecialchars($_POST['content_order']),
            'content_description' => $_POST['content_description'],
            'category_id' => htmlspecialchars($_POST['category_id']),
            'content_keyword' => $_POST['content_keyword'],
            'content_image' => $image_name,
            'created_date' => $_POST['created_date']


        ));

        if ($update) {
            $oldimage = $_POST['old_image'];
            unlink("images/content/$oldimage");
            header("Location: /Kelly/admin_panel/content.php?category_id=$category_id&status=ok");
            exit();
        } else {
            header("Location: /Kelly/admin_panel/content.php?category_id=$category_id&status=no");
            exit();
        }
    } else {
        $save = $pdo->prepare("UPDATE content SET 
                    content_order=:content_order,
                    content_title=:content_title,
                    content_description=:content_description,
                    category_id=:category_id,
                    content_keyword=:content_keyword,
                    created_date=:created_date

        
                    where id={$_POST['id']}
                    ");
        $update = $save->execute(array(
            'content_order' => htmlspecialchars($_POST['content_order']),
            'content_title' => htmlspecialchars($_POST['content_title']),
            'content_description' => $_POST['content_description'],
            'content_keyword' => $_POST['content_keyword'],
            'category_id' => htmlspecialchars($_POST['category_id']),
            'created_date' => $_POST['created_date']

        ));
        if ($update) {
            header("Location: /Kelly/admin_panel/content.php?category_id=$category_id&status=ok");
            exit();
        } else {
            header("Location: /Kelly/admin_panel/content.php?category_id=$category_id&status=no");
            exit();
        }
    }
}



// if (isset($_POST['login'])) {

//     $email = htmlspecialchars($_POST['email']);
//     $sifre = htmlspecialchars($_POST['password']);
//     $md5 = md5($sifre);


//     $kullanicisor = $pdo->prepare("SELECT * FROM user  where user_email=:user_email and user_password=:user_password");
//     $kullanicisor->execute(array(
//         'user_email' => $email,
//         'user_password' => $md5
//     ));
//     $var = $kullanicisor->rowCount();

//     if ($var == "0") {
//         Header("Location:login.php?status=no");
//     } else {
//         $_SESSION['login'] = $email;
//         Header("Location:index.php?status=ok");
//     }
// }

if (isset($_POST['girisyap'])) {

    $email = htmlspecialchars($_POST['email']);
    $sifre = htmlspecialchars($_POST['sifre']);
    $md5 = md5($sifre);

    

    $kullanicisor = $pdo->prepare("SELECT * FROM user where user_email=:user_email and user_password=:user_password");
    $kullanicisor->execute(array(
        'user_email' => $email,
        'user_password' => $md5
    ));
    $var = $kullanicisor->rowCount();
    // print_r($var);
    // print_r($kullanicisor);
    // if ($kullanicisor->execute()) {
    //     $var = $kullanicisor->rowCount();
    //     if ($var > 0) {
    //         // Kullanıcı bulundu, giriş başarılı.
    //         $user = $kullanicisor->fetch(PDO::FETCH_ASSOC);
    //         // Kullanıcı bilgilerini işle.
    //     } else {
    //      echo "kullanıcı yok";
    //     }
    // } else {
    //     // Sorgu çalıştırılamadı, hata işleme.
    // }

    // die;

    if ($var == "0") {
        Header("Location:login.php?status=no");
    } else {
        $_SESSION['giris'] = $email;
        Header("Location:index.php?status=ok");
    }

    print_r($kullanicisor);

}
