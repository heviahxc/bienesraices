<?php

require '../../includes/functions.php';

$auth = autenticacion();


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}
//Obtener datos


 require '../../includes/config/database.php';
 $db = conectarDB();

 $consulta = "SELECT * FROM propiedad WHERE id_propiedad = ${id}";
 $result = mysqli_query($db, $consulta);
 $propiedad = mysqli_fetch_assoc($result);

//Obtener Vendedores
 $consulta = "SELECT * FROM VENDEDORES";
 $resultado = mysqli_query($db,$consulta);
 $errores = [];

 $title = $propiedad['titulo'];
 $precio = $propiedad['precio'];
 $descripcion = $propiedad['descripcion'];
 $habitaciones = $propiedad['habitaciones'];
 $wc = $propiedad['wc'];
 $estacionamientos = $propiedad['estacionamientos'];
 $vendedorId = $propiedad['id_vendedor'];
 $imagenPropiedad = $propiedad['imagen'];



 incluirTemplate('header');

 if($_SERVER ['REQUEST_METHOD'] === 'POST'){


    //echo "<pre>";
    //var_dump ($_POST);
    //echo "</prev>";
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $precio = mysqli_real_escape_string($db, $_POST['price']);
    $descripcion = mysqli_real_escape_string($db, $_POST['desc']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamientos = mysqli_real_escape_string($db, $_POST['estacionamientos']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');
    $imagen = $_FILES['imagen'];

    if(!$title){
        $errores[] = "Debes añadir un titulo";
    }

    if(!$precio){
        $errores[] = "Debes añadir un precio";
    }

    if(strlen($descripcion) < 50){
        $errores[] = "Debes añadir una descripcion de al menos 50 caracteres";
    }

    if(!$habitaciones){
        $errores[] = "Debes añadir numero de habitaciones";
    }

    if(!$wc){
        $errores[] = "Debes añadir numero de baños";
    }

    if(!$estacionamientos){
        $errores[] = "Debes añadir numero de estacionamientos";
    }

    if(!$vendedorId){
        $errores[] = "Debes elegir un vendedor";
    }
   /* if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "La imagen es obligatoria";
    }*/

    $medida = 1000 * 1000;

    if ($imagen['size']> $medida) {
        $errores[] = "La imagen es muy pesada";
    }

    
    
    if(empty($errores)){

       $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        $nombreImagen = '';
        if ($imagen['name']) {
            
            unlink($carpetaImagenes . $propiedad['imagen']);
            $nombreImagen = md5( uniqid(rand(), true)) . ".png";
        
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen); 
        } else{
            $nombreImagen = $propiedad['imagen'];
        }



     
       
        $query = "UPDATE propiedad SET titulo = '${title}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = '
${habitaciones}', wc = '${wc}', estacionamientos = '${estacionamientos}', id_vendedor ='${vendedorId}'
WHERE id_propiedad = ${id};";
    
       // echo $query;
    
       $result = mysqli_query($db, $query);

        if ($result) {
           
            header('Location: /admin?resultado=2');
        }

    }
 
 }

?>

<main class="container section">
    <h1>Actualizar propiedad</h1>

    <a href="/admin" class="button button-green">Volver</a>

    <?php foreach($errores as $error): ?>
    <div class="alert error">
        <?php echo $error ?>
    </div>
    <?php endforeach ?>
    <form class="form" method="POST" enctype="multipart/form-data">
        <fieldset>


            <legend>Información General</legend>
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" placeholder="Titulo Propiedad" value="<?php echo $title;?>">

            <label for="price">Precio:</label>
            <input type="numbrer" id="price" name="price" placeholder="Precio Propiedad" value="<?php echo $precio;?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="imagen propiedad" class="imagen-small">

            <label for="desc">Descripcion:</label>
            <textarea name="desc" id="desc"><?php echo $descripcion;?></textarea>

        </fieldset>
        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9"
                value="<?php echo $habitaciones;?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" max="9" value="<?php echo $wc;?>">

            <label for="estacionamientos">Estacionamientos:</label>
            <input type="number" id="estacionamientos" name="estacionamientos" placeholder="Ej: 1" min="1" max="9"
                value="<?php echo $estacionamientos;?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option value="">-- Seleccione --</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                <option <?php echo $vendedorId === $vendedor['id_vendedor'] ? 'selected' : ''; ?>
                    value="<?php echo $vendedor['id_vendedor'] ?>">
                    <?php echo $vendedor['NOMBRE']." ".$vendedor['APELLIDO']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="button button-green">
    </form>

</main>

<?php 
    incluirTemplate('footer');