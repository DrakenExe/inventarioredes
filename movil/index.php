<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenidos</title>
        <meta name="viewport" content="width=device-width,user-scalable=no" />  

        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


    </head>

    <body>
        <div data-role="page" id="page1" style="background:#fff;">
       

            <center><img src="images/ucv.png" width="300"  alt="" style="margin-top:20px;" /></center>

            <div class="content" data-role="content">  
                <form action="validar.php" method="post">

                    <div data-role="fieldcontain">  
                        <label for="nombre">Usuario</label>  
                        <input type="text" id="usuariomovil" name="usuariomovil"  placeholder=""/>  
                        <label for="nombre">Clave</label>  
                        <input type="password" id="password" name="password"/>  

                    </div>  


                    <button type="submit" data-icon="bullets" style="background:#F97813; color:#fff;"   >INGRESAR</button>

          

                </form>  
            </div>   
            <footer data-role="footer" style="background:#000;color:#fff" data-position="fixed">  
                <h5>Derechos Reservados</h5>  
            </footer> 
        </div>




    </body>
</html>
