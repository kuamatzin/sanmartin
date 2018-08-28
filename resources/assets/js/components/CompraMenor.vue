<template>
    <div class="card card-default">
            <div class="card-header">
            <h1>Compra menor - Folio {{compra.folio}}</h1>
        </div>
        <div class="card-body">
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
                    <tr v-if="partidas" is="partida-compra-menor" v-for="(partida, index) in partidas" :index="index" :partida="partida" @editar_partida="editarPartida"></tr>
                    <tr v-show="agregar_partida_compra_menor" is="agregar-partida-compra-menor" @cerrar="cerrar" @nueva_partida="nuevaPartida" :dependenciaId="dependencia_id"></tr>
                </tbody>
            </table>

            <button class="btn btn-primary float-right mt-4" @click="confirmarEnviarCompraMenor">Enviar compra menor</button>
        </div>
    </div>
</template>


<script>
    import swal from 'sweetalert2'
    import PartidaCompraMenor from './PartidaCompraMenor.vue'
    import AgregarPartidaCompraMenor from './AgregarPartidaCompraMenor.vue'

    export default {
        components: {
            PartidaCompraMenor, AgregarPartidaCompraMenor
        },

        props: ['compra_id', 'compra_partidas', 'compra'],

        data() {
            return {
                dependencia_id: '',
                agregar_partida_compra_menor: false,
                partidas: this.compra_partidas
            }
        },

        methods: {
            cerrar(){
                this.agregar_partida_compra_menor = false
            },

            addPartidaToUI(){
                this.agregar_partida_compra_menor = true
            },

            nuevaPartida(partida){
                this.partidas.push(partida)
            },

            editarPartida(data){
                this.partidas[data[1]] = data[0]
            },

            confirmarEnviarCompraMenor(){
                if (this.partidas.length) {
                    swal({
                      title: '¿Estás seguro de enviar la compra?',
                      text: "Una vez enviada no se podrán modificar las partidas",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Estoy seguro',
                      cancelButtonText: 'Cancelar'
                    }).then((result) => {
                      if (result.value) {
                        this.enviarCompraMenor()
                      }
                    })
                }
            },

            enviarCompraMenor(){
                axios.post('/compras_menores/enviar/' + this.compra_id).then((data) => {
                    window.location.replace("/compras_menores/");
                })
            }
        }
    }
</script>