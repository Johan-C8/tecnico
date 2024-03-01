<?php
    require "config/app.php";
    require "config/database.php";

    $user = getUser($conx, $_SESSION["uid"]);

    if(!isset($_SESSION['uid'])) {
        $_SESSION['error'] = "Please login first to access dashboard.";
        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN USERS</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
    <style>
        div.menu {
            background-color: var(--color-pri);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            position: absolute;
            top: -2000px;

            left: 0;
            z-index: 9999;
            justify-content: center;
            min-height: 100vh;
            width: 100%;

            a:is(:link, :visited) {
                border: 1px solid #fff;
                border-radius: 50px;
                color: #fff;
                font-size: 2rem;
                padding: 10px 20px;
                text-decoration: none;
            }
        }
        div.menu.open {
            animation: openMenu 0.5s ease-in 1 forwards;
        }
        
        div.menu.close {
            animation: closeMenu 0.5s ease-in 1 forwards;
        }


        @keyframes openMenu{
            0%{
                top: -1000px;
                opacity: 0;
            }100%{
                top: 0;
                opacity: 1;
            }
        }

        
        @keyframes closeMenu{
            0%{
                top: 0;
                opacity: 1;
            }100%{
                top: -1000px;
                opacity: 0;
            }
        }
        a.closem {
                position: absolute;
                top: 44px;
                right: 0px;
            }

            nav {
                color: #fff9;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;

                img {
                    border: 2px solid #fff;
                    border-radius: 60%;
                    object-fit: cover;
                    height: 200px;
                    width: 200px;
                }

                h4, h5 {
                    margin: 0;
                }

                a.closes {
                    border: 2px solid #fff;
                }
            }
        
        div.menu.open {
            top: 0;
            opacity: 1;
        }



    </style>
</head>
<body>
    <div class="menu">
        <a href="javascript:;" class="closem" >X</a>
        
        <nav>
            <img src="<?=URLIMGS ."/".$user['photo'] ?>" alt="photo">

            <h4> <?=$user['fullname']?> </h4>
            <h5> <?=$user['role']?> </h5>

            <a href="close.php">Close session</a>
        </nav>

    </div>
    <main>
    <header class="nav level-0">
            <a href="">
                <img src="<?php echo URLIMGS . "/ico-back.svg" ?>" alt="Back">
            </a>

            <img src="<?php echo URLIMGS . "/logo.svg" ?>" alt="Logo">

            <a href="javascript:;" class="mburger">
                <img src="<?php echo URLIMGS . "/mburger.svg" ?>" alt="Menu Burger">
            </a>

        </header>
        <?php if ($_SESSION['urole'] == 'Admin'): ?>
        <section class="dashboard">
            <h1>Dashboard</h1>
            <menu>
                <ul>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/ico-users.svg" ?>" alt="Users">
                            <span>Module User</span>    
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/ico-pets.svg" ?>" alt="Pets">
                            <span>Module Pets</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/ico-adoptions.svg" ?>" alt="Adoptions">
                            <span>Module Adoptions</span>
                        </a>
                    </li>
                </ul>
            </menu>
        </section>
        <?php elseif ($_SESSION['urole'] == 'Customer'): ?>
            <section class="dashboard">
                <h1>Dashboard</h1>
                <menu>
                    <ul>
                        <li>
                            <a href="#">
                                <img src="<?php echo URLIMGS . "/ico-adoptions.svg" ?>" alt="Adoptions">
                                <span>Module Adoptions</span>
                            </a>
                        </li>
                    </ul>
                </menu>
            </section>
        <?php endif ?>
    </main>
</body>
</html>
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"></script>
    <script src="<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"></script>
    <script>
            $(document).ready(function () {

            $('body').on('click', '.mburger', function () {
                $('.menu').addClass('open')
            })

            $('body').on('click', '.closem', function () {
                $('.menu').addClass('close')
                setTimeout(() => {

                    $('.menu').removeClass('open');
                    $('.menu').removeClass('close');
                }, 500)
            })



            <?php if(isset($_SESSION['msg'])): ?>
                Swal.fire({
                    position: "top-end",
                    title: "Congratulations!",
                    text: "<?php echo $_SESSION['msg'] ?>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                })
                <?php unset($_SESSION['msg']) ?>
            <?php endif ?>

           
        })
    </script>
</body>
</html>