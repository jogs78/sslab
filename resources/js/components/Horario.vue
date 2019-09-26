<template>
    <div class="container">
        <div v-for="(dia, iDia) in dias" :key="iDia">
            <label>{{ dia.nombre }}</label>
            <rango-horario 
                v-for="(horario, iHorario) in dia.horario" 
                :key="iHorario" 
                :nombre="'horario['+ dia.clave +']['+ iHorario +']'"
                :entrada="horario.entrada" 
                :salida="horario.salida"
                :id="horario.id"
                :dia="horario.claveDia">
            </rango-horario>
            <button type="button" class="btn btn-success" @click="agregarRango(iDia)">Nuevo</button>
            <hr>
        </div>
    </div>
</template>

<script>
    import RangoHorario from './RangoHorario'
    export default {
        data() {
            return {
                dias: [
                    {'nombre': 'Lunes', 'clave': 'lunes', 'horario': []},
                    {'nombre': 'Martes', 'clave': 'martes', 'horario': []},
                    {'nombre': 'Miércoles', 'clave': 'miercoles', 'horario': []},
                    {'nombre': 'Jueves', 'clave': 'jueves', 'horario': []},
                    {'nombre': 'Viernes', 'clave': 'viernes', 'horario': []}
                ]
            }
        },
        methods: {
            agregarRango: function (dia) {
                this.dias[dia]['horario'].push({entrada: null, salida: null, claveDia: this.dias[dia].clave, id: null })
            },
            eliminarCampos: function() {
                for (const dia of this.dias){
                    dia.horario = [];
                }
            },
            cargarHorario: function(horario) {
                for (const [claveDia, horas] of Object.entries(horario)){
                    this.dias
                        .find(dia => dia.clave == claveDia).horario = horas
                }
            }
        },
        components: {
            RangoHorario
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>