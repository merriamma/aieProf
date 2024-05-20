<?php
include 'connexion.php';
session_start();

if (isset($_SESSION['nom'])) {

    $nom = $_SESSION['nom'];


?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="assests/css/dispo.css">
        <title>Mon Profil</title>
        <style>
            .profile-menu {
                position: absolute;
                top: 60px;
                right: 10px;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 15px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                display: none;
                z-index: 9999;
                padding: 10px 0;
                max-height: 0;
                overflow: hidden;
                margin-right: 5px;
                transition: max-height 0.3s ease, padding 0.3s ease;
            }

            .msg-menu {
                width: 450px;
                position: absolute;
                top: 60px;
                right: 100px;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 15px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                display: none;
                z-index: 9999;
                padding: 10px 0;
                max-height: 0;
                overflow: hidden;
                margin-right: 5px;
                transition: max-height 0.3s ease, padding 0.3s ease;
            }

            @media screen and (max-width: 768px) {
                .container {
                    flex-direction: column;
                }
            }

            .profile-menu ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .msg-menu ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .profile-menu ul li {
                padding: 10px 20px;
                display: flex;
                align-items: center;
                /* Centrer verticalement */
                margin-right: 10px;
            }

            .msg-menu ul li {
                padding: 10px 20px;
                display: flex;
                align-items: center;
                /* Centrer verticalement */
                margin-right: 10px;
            }


            .profile-menu ul li i {
                margin-right: 20px;
                /* Espace entre l'icône et le texte */
            }

            .msg-menu ul li i {
                margin-right: 20px;
                /* Espace entre l'icône et le texte */
            }



            .profile-menu ul li:hover {
                background-color: #f0f0f0;
                cursor: pointer;
            }

            .msg-menu ul li:hover {
                background-color: #f0f0f0;
                cursor: pointer;
            }


            .profile-menu.active {
                display: block;
                max-height: 300px;
                padding: 10px 0;
                /* Ajustement du padding */
            }

            .msg-menu.active {
                display: block;
                max-height: 300px;
                padding: 10px 0;
                /* Ajustement du padding */
            }




            /* .container {
			display: flex;
			justify-content: space-between;
		} */

            @media screen and (max-width: 576px) {
                .container {
                    flex-direction: column;
                }
            }

            @media screen and (max-width: 1085px) {
                .container {
                    display: flex;
                    flex-direction: column;
                }
            }
        </style>
    </head>

    <body>

        <!-- Sidebar -->
        <div class="sidebar">
            <a href="#" class="logo">
                <img src="img/Logo.png" alt="logo">
                <div class="logo-name"><span>Exam</span>Plan</div>
            </a>
            <ul class="side-menu">
                <li><a href="dispo.php"><i class='bx bxs-calendar'></i>Disponibilités</a></li>
                <li><a href="planning.php"><i class="bx bxs-calendar-event"></i>
                        Planning</a></li>
                <li class="active"><a href="profil.php"><i class='bx bx-cog'></i>Paramétres</a></li>
                <li><a href="#"><i class='bx bx-message'></i>Messages</a></li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="login.php" class="logout" onclick="return logoutConfirmation()">
                        <i class='bx bx-log-out-circle'></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- End of Sidebar -->

        <!-- Main Content -->
        <div class="content">
            <!-- Navbar -->
            <nav>


                <form action="#">
                    <div class="form-input">
                        <button class="search-btn" type="submit" hidden><i class='bx bx-search'></i></button>
                    </div>
                </form>
                <input type="checkbox" id="theme-toggle" hidden>
                <label for="theme-toggle" class="theme-toggle"></label>
                <a href="#" class=notif onclick="toggleNotif()"><span class="material-symbols-outlined">
                        notifications
                    </span>
                </a>
                <div class="msg-menu" id="notifMsg">
                    <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <div class="ml-2">
                                    <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                    <div class="text-[11px] text-gray-400">from a user</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <a href="#" class="profile" onclick="toggleProfileMenu()">
                    <span class="material-symbols-outlined">
                        account_circle
                    </span> </a>
                <div class="profile-menu" id="profileMenu">
                    <ul>
                        <li>
                            <?php echo "$nom"; ?>
                        </li>
                        <li>
                            <i class='bx bx-user'></i>
                            <a href="profil.php"> Mon Profil</a>
                        </li>
                        <li>
                            <i class='bx bx-edit'></i>
                            <a href="profil.php"> Modifer Profile</a>
                        </li>
                        <li>
                            <i class='bx bx-log-out'></i>
                            <a href="#" onclick="logoutConfirmation()"> Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End of Navbar -->

            <main>





                <div class="bottom-data">
                    <div class="orders">
                        <div class="header">

                            <!-- <div class="container d-flex justify-content-center align-items-center  vh-100 "> -->

                            <div class="col-md-6 ">

                                <div class="form-container">
                                    <!-- <a href="dispo.php" class="arrow"><span class="material-symbols-outlined">
                                            arrow_back
                                        </span></a> -->
                                    <style>
                                        .arrow {
                                            color: black;
                                        }
                                    </style>


                                    <h2 class="text-center mb-4">Mon profil</h2>
                                    <?php // Requête SQL pour sélectionner les informations de l'enseignant
                                    $sql = "SELECT * FROM enseignant WHERE nom = ?";
                                    $stmt = mysqli_prepare($con, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $nom);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    if (!$result) {
                                        die("Erreur lors de l'exécution de la requête SQL: " . mysqli_error($con));
                                    }

                                    $row = mysqli_fetch_assoc($result);

                                    if (!$row) {
                                        echo "<p>Aucune information trouvée pour cet enseignant.</p>";
                                    } else {
                                    ?>
                                        <form method="post">
                                            <div class="mb-3">
                                                <label class="col-sm-4 col-form-label"><b>Votre Nom :</b> </label>
                                                <p><?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?></p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="col-sm-4 col-form-label">
                                                    <b> Votre code :</b>
                                                </label>
                                                <p><?php echo $row['code']; ?></p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="col-sm-4 col-form-label"><b>Votre email :</b> </label>
                                                <p><?php echo $row['email']; ?></p>

                                            </div>

                                            <div class="mb-3">
                                                <label class="col-sm-4 col-form-label"><b>Votre grade :</b></label>
                                                <p><?php echo $row['grade']; ?></p>
                                            </div>
                                    <?php
                                    }

                                    mysqli_stmt_close($stmt);
                                } else {
                                    echo "<p>Vous n'êtes pas connecté.</p>";
                                }
                                    ?>



                                    <!-- <div class="col-sm-6">
                                            <a class="btn btn-outline-secondary w-100" href="dispo.php" role="button">Annuler</a>
                                        </div> -->
                                </div>
                                </form>
                                <div class="col-12">
                                    <a href="editProfil.php?id='.$nom.'"><button class="btn btn-primary w-50">Modifer
                                        </button></a>
                                </div>

                            </div>
                        </div>

                        <!-- </div> -->



                    </div>
                </div>

            </main>

        </div>



        <!-- Debut du Modal de modefication -->
        <div class="modal fade" id="modEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier votre profil</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulaire de modification -->
                        <form method="post" ation="saveEdit.php">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control" id="code" name="code" value="<?php echo $row['code']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="grade" aria-label="Default select example">
                                    <option selected>Choisissez votre grade</option>
                                    <option value="1">MCA</option>
                                    <option value="2">MAA</option>
                                    <option value="3">MCB</option>
                                    <option value="4">Pr</option>
                                    <option value="5">Vacataire</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script>
            function deleteUser(id) {
                if (confirm("Êtes-vous sûr de vouloir supprimer cette dispo ?")) {
                    window.location.href = "delete.php?id=" + id;
                }
            }

            //LIGHT & DARK MODE//
            const toggler = document.getElementById('theme-toggle');
            toggler.addEventListener('change', function() {
                if (this.checked) {
                    document.body.classList.add('dark');
                } else {
                    document.body.classList.remove('dark');
                }
            });
            //DROPDOWNMENU//
            function toggleProfileMenu() {
                var profileMenu = document.getElementById('profileMenu');
                profileMenu.classList.toggle('active');
            }
            //DROPDOWN NOTIFICATION///
            function toggleNotif() {
                var notifMsg = document.getElementById('notifMsg');
                notifMsg.classList.toggle('active');

            }
            //LOGPUT CONFIRMATION//
            function logoutConfirmation() {
                if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                    return true; // le user confirme et se deconnecte
                } else {
                    return false; // le user refuse
                }
            }
        </script>

        <script src="assests/js/dispo.js"></script>
    </body>

    </html>