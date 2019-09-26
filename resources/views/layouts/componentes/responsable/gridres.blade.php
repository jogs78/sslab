@csrf
        <hr size="5">
<div id="asistencias">
    <!-- Grid Asistencias -->   
    <h3>Asistencias</h3>
    <div class="centerblock" style="border-style:groove;">
        <br>
    <!-- 1 -->
        <div class="row justify-content-sm-center">
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Prestador:</label>
            </div>
            <div class="col col-sm-9">
                <input type="text" name="prestador" class="form-control input-sm">
            </div>
        </div>
        <br><!-- 2 -->
        <div class="row justify-content-md-center">
            <div class="col-sm-auto" style="border-style:outset;" >
                <label class="text-justify">Fecha:</label>
            </div>
            <div class="col col-sm-2">
                <input type="text" name="fecha" class="form-control input-sm">
            </div>
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Horario:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horarioi" class="form-control input-sm">
            </div>
            <div class="col-md-1" style="border-style:outset;" >
                <label class="text-justify">A:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horariof" class="form-control input-sm">
            </div>
            <div class="col-md-2" style="border-style:outset;" >
                <label class="text-justify">Duración:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="totalfaltas" class="form-control input-sm">
            </div>
        </div>    <!-- 4 -->
        <br>
        <div class="row justify-content-md-center">
            <div class="col-sm-2">       </div>
            <div class="col col-sm-1">
                <button type="button" class="btn btn-primary" id="guardarpermiso">Guardar</button>
            </div>
            <div class="col-sm-3">       </div>
        </div>
        <br>
    </div>
    <br>
</div>
<!-- Fin asistencias -->


        <hr size="5">
        <br> 
<div id="faltas">
<!-- Grid Faltas -->  
    <h3>Faltas</h3>
    <div class="centerblock" style="border-style:groove;">
        <br>
    <!-- 1 -->
        <div class="row justify-content-sm-center">
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Prestador:</label>
            </div>
            <div class="col col-sm-9">
                <input type="text" name="prestador" class="form-control input-sm">
            </div>
        </div>
        <br>
    <!-- 2 -->
        <div class="row justify-content-md-center">
            <div class="col-sm-auto" style="border-style:outset;" >
                <label class="text-justify">Fecha:</label>
            </div>
            <div class="col col-sm-2">
                <input type="text" name="fecha" class="form-control input-sm">
            </div>
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Horario:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horarioi" class="form-control input-sm">
            </div>
            <div class="col-md-1" style="border-style:outset;" >
                <label class="text-justify">A:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horariof" class="form-control input-sm">
            </div>
            <div class="col-md-2" style="border-style:outset;" >
                <label class="text-justify">Total:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="totalfaltas" class="form-control input-sm">
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-sm-2">       </div>
            <div class="col col-sm-1">
                <button type="button" class="btn btn-primary" id="guardarpermiso">Guardar</button>
            </div>
            <div class="col-sm-3">       </div>
        </div>
        <br>
    </div>
    <br>
        <div class="row justify-content-md-right">
            <div class="col-sm-10">       </div>
            <div class="col-sm-1">
                <a href="#inicio" id="subir4" style="padding: 10px 25px; border-style: solid;" >Subir</a>      
            </div>
        </div>
</div>   
<!-- Fin faltas -->


        <hr size="5">
        <br>    
<div id="hextras">
<!-- Grid Horas extras -->  
    <h3>Horas extras</h3>
    <div class="centerblock" style="border-style:groove;">
        <br>
    <!-- 1 -->
        <div class="row justify-content-sm-center">
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Prestador:</label>
            </div>
            <div class="col col-sm-9">
                <input type="text" name="prestador" class="form-control input-sm">
            </div>
        </div>
        <br><!-- 2 -->
        <div class="row justify-content-md-center">
            <div class="col-sm-auto" style="border-style:outset;" >
                <label class="text-justify">Fecha:</label>
            </div>
            <div class="col col-sm-2">
                <input type="text" name="fecha" class="form-control input-sm">
            </div>
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Horario:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horarioi" class="form-control input-sm">
            </div>
            <div class="col-md-1" style="border-style:outset;" >
                <label class="text-justify">A:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horariof" class="form-control input-sm">
            </div>
            <div class="col-md-2" style="border-style:outset;" >
                <label class="text-justify">Duración:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="duracion" class="form-control input-sm">
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-sm-2">       </div>
            <div class="col col-sm-1">
                <button type="button" class="btn btn-primary" id="guardarpermiso">Guardar</button>
            </div>
            <div class="col-sm-3">       </div>
        </div>
        <br>
    </div>
    <br>
        <div class="row justify-content-md-right">
            <div class="col-sm-10">       </div>
            <div class="col-sm-1">
                <a href="#inicio" id="subir4" style="padding: 10px 25px; border-style: solid;" >Subir</a>  
            </div>
        </div>
</div>
<!-- Fin horas extras-->

        <hr size="5">
        <br>
<div id="permisos">
<!-- Grid Permisos -->  
    <h3>Permisos</h3>
    <div class="centerblock" style="border-style:groove;">
        <br>
    <!-- 1 -->
        <div class="row justify-content-sm-center">
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Prestador:</label>
            </div>
            <div class="col col-sm-9">
                <input type="text" name="prestador" class="form-control input-sm">
            </div>
        </div>
        <br>
    <!-- 2 -->
        <div class="row justify-content-md-center">
            <div class="col-sm-auto" style="border-style:outset;" >
                <label class="text-justify">Fecha:</label>
            </div>
            <div class="col col-sm-2">
                <input type="text" name="fecha" class="form-control input-sm">
            </div>
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Horario:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horarioi" class="form-control input-sm">
            </div>
            <div class="col-md-1" style="border-style:outset;" >
                <label class="text-justify">A:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="horariof" class="form-control input-sm">
            </div>
            <div class="col-md-2" style="border-style:outset;" >
                <label class="text-justify">Duración:</label>
            </div>
            <div class="col col-sm-1">
                <input type="text" name="duracion" class="form-control input-sm">
            </div>
        </div>
        <br>
    <!-- 3 -->
        <div class="row justify-content-md-center">
            <div class="col-md-auto" style="border-style:outset;" >
                <label class="text-justify">Motivo:</label>
            </div>
            <div class="col col-sm-9">
                <input type="text" name="motivo" class="form-control input-sm">
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-sm-2">       </div>
            <div class="col col-sm-1">
                <button type="button" class="btn btn-primary" id="guardarpermiso">Guardar</button>
            </div>
            <div class="col-sm-3">       </div>
        </div>
        <br>
    </div>
    <br>
        <div class="row justify-content-md-right">
            <div class="col-sm-10">       </div>
            <div class="col-sm-1">
                <a href="#inicio" id="subir4" style="padding: 10px 25px; border-style: solid;" >Subir</a>
            </div>
        </div>
</div>



<script type="text/javascript">
    $('#subir4').on('click', function(e) {
        e.preventDefault();
        $("html, body").animate({scrollTop: $('#inicio').offset().top }, 1000);
    });
</script>
