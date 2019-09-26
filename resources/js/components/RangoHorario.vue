<template>
    <div class="container" ref="rangoHora">
        <div class="row">
            <div class="col-md-5">
                <input :name="nombre+'[entrada]'" type="time" class="form-control" step="1" :value="entrada">
                <small class="form-text text-muted">Hora de entrada.</small>
            </div>
            <div class="col-md-5">
                <input :name="nombre+'[salida]'" type="time" class="form-control" step="1" :value="salida">
                <small class="form-text text-muted">Hora de salida.</small>
            </div>
            <div class="col-md-2">
                <button type="button" class="close float-left" aria-label="Close" title="Quitar" @click="eliminarRango">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <input type="hidden" :name="nombre+'[id]'" :value="id" />
        <input type="hidden" :name="nombre+'[dia]'" :value="dia" />
    </div>
</template>

<script>
    export default {
        props: {
            nombre: {
                type: String,
                default: 'hora[]'
            },
            entrada: {default: '16:00:00'},
            salida: {default: '17:00:00'},
            id: {default: null},
            dia: {default: null}
        },
        mounted() {
            
        },
        methods: {
            eliminarRango: function(e){
                $(this.$refs.rangoHora).remove();
            }
        }
    }
</script>