<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honkai Star Rail | Personajes</title>
    <style>
        body {
            background-image: url("./img/universo.jpg");
            background-size: cover;
            height: 100vh;
            margin: 0;
        }
    </style>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/cards.js"></script>
    <script src="./js/trailer.js"></script>
    <link rel="stylesheet" href="./css/style-navbar.css">
    <link rel="stylesheet" href="./css/style-card.css">
    <link rel="stylesheet" href="./css/style-modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img class="image" src="./img/trail.png" alt="">
            <p class="title">Bienvenido(a) Trazacaminos</p>
            <!--Saludo (iba a ser un buscador)-->
            <div class="buscador">
                <form class="d-flex">
                    <p class="title">★★★★★★★★</p>
                </form>
            </div>
            <!--Collapse de las acciones-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <li class="nav-item position-relative">
                    <a class="titulo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones<i class="fa-solid fa-chevron-down" style="color: #e0c59a;"></i>
                    </a>
                     <!--Boton para modal de AGREGAR-->
                    <ul class="dropdown-menu">
                        <li><button type="button" class="opcion" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                            <a class="dropdown-item"><i class="fa-solid fa-circle-plus" style="color: #e0c59a;"></i>Agregar</a>
                        </button></li>
                        <!--Boton para modal de EDITAR-->
                        <li><button type="button" class="opcion" data-bs-toggle="modal" data-bs-target="#modalEditar">
                            <a class="dropdown-item"><i class="fa-solid fa-wand-magic-sparkles" style="color: #e0c59a;"></i>Editar</a>       
                        </button></li>
                        <!-- Boton para el modal de ELIMINAR -->
                        <li><button type="button" class="opcion" data-bs-toggle="modal" data-bs-target="#modalEliminar">
                            <a class="dropdown-item"><i class="fa-solid fa-trash" style="color: #e0c59a;"></i>Eliminar</a>
                        </button></li>
                    </ul>
                </li>           
            </div>
        </div>
    </nav>
    <br><br><br><br><br>

    <!--Carrusel y cards para los GET-->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" id="carousel-inner">
        <!--Con cards.js aqui se imprimen las cards-->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br><br><br><br><br><br><br><br><br><br>

    <!-- Modal de agregar/POST-->
    <div class="modal fade" id="modalAgregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregando...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Contenido del modal -->
                <div class="modal-body">
                    <form action="conn.php" method="post" enctype="multipart/form-data">
                        <label class="element">Nombre:</label>
                        <p><input class="caja" type="text" name="nombre" required></p>
                        <label class="element">Rareza:</label>
                        <p><select class="caja" name="rareza" id="rareza" required>
                            <option value="">Selecciona</option>
                            <option value="4 Estrellas">4 Estrellas</option>
                            <option value="5 Estrellas">5 Estrellas</option>
                        </select></p>
                        <label class="element">Via:</label>
                        <p><select class="caja" name="via" required>
                            <option value="">Selecciona</option>
                            <option value="Destrucción">Destrucción</option>
                            <option value="Cacería">Cacería</option>
                            <option value="Erudición">Erudición</option>
                            <option value="Nihilidad">Nihilidad</option>
                            <option value="Reminisciencia">Reminisciencia</option>
                            <option value="Armonía">Armonía</option>
                            <option value="Abundancia">Abundancia</option>
                            <option value="Conservación">Conservación</option>
                        </select></p>
                        <label class="element">Elemento:</label>
                        <p><select class="caja" name="elemento" required>
                            <option value="">Selecciona</option>
                            <option value="Físico">Físico</option>
                            <option value="Fuego">Fuego</option>
                            <option value="Imaginario">Imaginario</option>
                            <option value="Hielo">Hielo</option>
                            <option value="Viento">Viento</option>
                            <option value="Cuántico">Cuántico</option>
                            <option value="Rayo">Rayo</option>
                        </select></p>
                        <label class="element">Eidolons:</label>
                        <p><select class="caja" name="eidolons" required>
                            <option value="">Selecciona</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select></p>
                        <label class="element">Link del trailer:</label>
                        <p><input class="caja" type="text" name="link_trailer"></p>
                        <label class="element">Imagen:</label>
                        <p><input class="form-control" type="file" name="imagen"></p>
                        <!--Botones-->
                        <div class="modal-footer">
                            <button type="button" class="cerrar" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="confirmar">Agregar</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de editar/PUT-->
    <div class="modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editando...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Contenido del modal -->
                <div class="modal-body">
                    <form id="updateCharacter" action="conn.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <label class="element">Id:</label>
                        <p><input type="number" class="caja" name="id_personaje"></p>
                        <label class="element">Nombre:</label>
                        <p><input id="Unombre" class="caja" type="text" name="Unombre" required></p>
                        <label class="element">Rareza:</label>
                        <p><select id="Urareza" class="caja" name="Urareza" required>
                            <option value="">Selecciona</option>
                            <option value="4 Estrellas">4 Estrellas</option>
                            <option value="5 Estrellas">5 Estrellas</option>
                        </select></p>
                        <label class="element">Via:</label>
                        <p><select id="Uvia" class="caja" name="Uvia" required>
                        <option value="">Selecciona</option>
                            <option value="Destrucción">Destrucción</option>
                            <option value="Cacería">Cacería</option>
                            <option value="Erudición">Erudición</option>
                            <option value="Nihilidad">Nihilidad</option>
                            <option value="Reminisciencia">Reminisciencia</option>
                            <option value="Armonía">Armonía</option>
                            <option value="Abundancia">Abundancia</option>
                            <option value="Conservación">Conservación</option>
                        </select></p>
                        <label class="element">Elemento:</label>
                        <p><select id="Uelemento" class="caja" name="Uelemento" required>
                            <option value="">Selecciona</option>
                            <option value="Físico">Físico</option>
                            <option value="Fuego">Fuego</option>
                            <option value="Imaginario">Imaginario</option>
                            <option value="Hielo">Hielo</option>
                            <option value="Viento">Viento</option>
                            <option value="Cuántico">Cuántico</option>
                            <option value="Rayo">Rayo</option>
                        </select></p>
                        <label class="element">Eidolons:</label>
                        <p><select id="Ueidolons" class="caja" name="Ueidolons" required>
                            <option value="">Selecciona</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select></p>
                        <label class="element">Link del trailer:</label>
                        <p><input id="Ulink_trailer" class="caja" type="text" name="Ulink_trailer" required></p>
                        <label class="element">Imagen:</label>
                        <p><input id="Uimagen" class="form-control" type="file" name="Uimagen"></p>
                        <!--Botones-->
                        <div class="modal-footer">
                            <button type="button" class="cerrar" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="confirmar">Actualizar</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de eliminar/DELETE-->
    <div class="modal fade" id="modalEliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Contenido del modal -->
                <form action="conn.php" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-body">
                        <div style="text-align: center;"><img class="imagen" src="./img/pom-pom.png" alt="">
                            <p>Cuidado!!</p>
                            <p>Usted esta a punto de eliminar un personaje</p>
                            <label class="element">Id del personaje:</label>
                            <p><input class="caja" type="number" name="id_personaje" required></p>
                            <!--Botones-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cerrar" data-bs-dismiss="modal">Cancelar</button>
                            <button id="confirm" type="submit" class="confirmar">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    

    <!-- Modal de éxito-->
    <div class="modal fade" id="modalC" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Petición realizada con éxito</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                Contenido del modal
                <div class="modal-body">
                    <div style="text-align: center;"><img class="imagen" src="./img/Pom-Pom-like.png" alt=""></div>
                        Botones
                        <div class="modal-footer">
                            <button type="button" class="cerrar" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>

     <!--Modal de error
    <div class="modal fade" id="modalF" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Algo salio mal...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                 Contenido del modal
                <div class="modal-body">
                    <div style="text-align: center;"><img class="imagen" src="./img/error.png" alt=""></div>
                        Botones
                        <div class="modal-footer">
                            <button type="button" class="cerrar" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>-->

    <!--Footer-->
    <footer style="background-color: #000000; font-family: 'Neuropol', sans-serif; color:#FFFFFF; text-align:center; font-size:20px; padding: 50px 50px;">
        @HOYOVERSE      Derechos Reservados 2025
        <p>Sugerencias/Comentarios "No se encuentran disponibles"</p>
    </footer>
<script>
    $(document).ready(function() {
        $('.video').on('click', function() {
            const redir = $(this).data('href');
            if (redir == '') {
                $('#modalC').modal('show'); 
            }
        });
    });
</script> 
</body>
</html>