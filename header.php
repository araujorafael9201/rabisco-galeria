<ul class="header">
            <div class="header-content">
                <div class="links header-section">
                    <li><a href="/">Início</a></li>
                    <li><a href="">Sobre</a></li>
                    <?php
                        session_start();

                        if($_SESSION['logado'] == TRUE) {
                            echo '<li><a href="/addobra.php">Adicionar</a></li>';
                            echo '<li><a href="/php/logout.php">Logout</a></li>';
                        }

                        if($_SESSION['logado'] == FALSE) {
                            echo '<li><a href="/login.html">Login</a></li>';
                        }
                    ?>
                </div>
                <li class="logo header-section">
                    <a href="/">Rabisco</a>
                </li>
                <div class="search header-section">
                    <form action="">
                        <input type="text" placeholder="Pesquise Aqui...">
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </div>

            <div class="header-collapsed">
                <a class="logo-collapsed" href="/">Rabisco</a>
                <button onclick="toggleContent()" class="collapsable-control">
                    <img src="static/img/collapse.svg" alt="">
                </button>
            </div>

        </ul>