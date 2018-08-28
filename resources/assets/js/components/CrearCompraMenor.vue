<template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                <h1>Registrar compra menor</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Seleccionar área</label>
                    <select class="form-control" id="exampleFormControlSelect1" v-model="dependencia_id">
                        <option v-for="dependencia in dependencias" :value="dependencia.id">{{dependencia.nombre}}</option>
                    </select>
                </div>
                <hr>
                <h3>Partidas</h3>
    
                <button class="mt-2 btn btn-success" @click="addPartidaToUI">Agregar partida</button>
    
                <table class="mt-4 table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-show="agregar_partida_compra_menor" is="agregar-partida-compra-menor" @cerrar="cerrar" @nueva_partida="nuevaPartida" :dependenciaId="dependencia_id"></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>


<script>
    import AgregarPartidaCompraMenor from './AgregarPartidaCompraMenor.vue'

    export default {
        components: {
            AgregarPartidaCompraMenor
        },

        props: ['dependencias'],

        data() {
            return {
                dependencia_id: 1,
                agregar_partida_compra_menor: false,
                partidas: []
            }
        },
    
        methods: {
            addPartidaToUI(){
                this.agregar_partida_compra_menor = true
            },

            cerrar(){
                this.agregar_partida_compra_menor = false
            },

            nuevaPartida(compra_menor){
                window.location.replace("/compras_menores/show/" + compra_menor.id);
            }
        }
    }
</script>