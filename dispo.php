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
        <title>Disponibility</title>
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
                <li class="active"><a href="prof.php"><i class='bx bxs-calendar'></i>Disponibilités</a></li>
                <li><a href="planning.php"><i class="bx bxs-calendar-event"></i>
                        Planning</a></li>
                <li><a href="profil.php"><i class='bx bx-cog'></i>Paramétres</a></li>
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
                            <a href="editProfil.php"> Modifer Profile</a>
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

                            <h3>Mes Disponibilités</h3>
                            <a href="addDispo.php"><button class="btn btn-success">
                                    Ajouter une Disponibilité
                                </button></a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jour</th>
                                    <th scope="col">Heure Debut</th>
                                    <th scope="col">Heure Fin</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cpt = 1;
                                $sql = "SELECT * FROM enseignant_disponibilite WHERE nom_enseignant = '$nom'";
                                $result = mysqli_query($con, $sql);

                                if ($result === false) {
                                    die('Erreur de requête : ' . mysqli_error($con));
                                }

                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $jour = $row['jour'];
                                    $heureDebut = $row['heureDebut'];
                                    $heureFin = $row['heureFin'];



                                    echo '
                                <tr>
                        <td>' . $cpt . '</td>
                        <td>' . $jour . '</td>
                        <td> ' . $heureDebut . '</td>
                        <td> ' . $heureFin . '</td>

                        <td>
                            <div class="d-grid gap-2 d-md-block">
                                <button onclick="deleteUser(' . $id . ')"  class="btn btn-danger" >Supprimer</button>
                            </div>
                        </td>
                    </tr>';
                                    $cpt++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </main>

        </div>

        </main>

        </div>
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
<?php } else {
    header("location:loginForm.php?error");
    exit();
} ?>