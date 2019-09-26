<div class="content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
</div>
        @empty ($projects)
            <p>Sin usuarios</p>
        @else
        <div style="overflow-x: scroll;">
            
            <table class="table table-condensed table-bordered table-hover" border="1" style="width:auto; height:20px;" cellspacing="0" id="tablaj">
                <br>
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Proyecto</th>
                    <th scope="col">H.cubrir</th>
                    <th scope="col">H.cubiertas</th>
                    <th scope="col">Auxiliar</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Control</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($projects as $project)
                @if ($project->responsableProyecto->nombre == Auth::user()->nombre)
                    <tr id="trProyecto{{ $project->id }}">
                        <td scope="col">
                            <?= isset(      
                                $project->titulo) 
                                ? 
                                $project->titulo
                                : "---" 
                            ?>
                        </td>
                        <td scope="col" align="center">
                            <?= isset(      
                                $project->horas_cubrir) 
                                ? 
                                $project->horas_cubrir
                                : "---"  
                            ?>
                        </td>
                        <td scope="col" align="center">
                            {{$project->horas_cubirtas()}} 
                        </td>
                        <td scope="col">
                            {{$project->responsableProyecto->nombre}} 
                        </td>
                        <td scope="col" align="center"> 
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccionar
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalCalendario"  href="#">Calendario</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalHorarioResponsable" href="#">Horario</a>
                                </div>
                            </div>

                        </td> 
                        <td scope="col">{{  $project->prestadorProyecto->nombre }}</td>
                        <td scope="col">{{  $project->prestadorProyecto->apellido }}</td>
                        <td scope="col">{{  $project->prestadorProyecto->email }}</td>
                        <td scope="col">{{  $project->prestadorProyecto->telefono }}</td>
                        <td scope="col">    
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccionar
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalAsistencias" href="#">Asistencias</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalFaltas" href="#">Faltas</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"  data-proyectoId="{{ $project->id }}" name="btnMostrarModalPermisos" href="#">Permisos</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" name="avancePdf" href="{!! route('avanceToPDF', ['proyecto' => $project->id]) !!}">Avance</a>
                                </div>
                            </div>
                    </td>
                    </tr>
                @endif
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
        @endempty