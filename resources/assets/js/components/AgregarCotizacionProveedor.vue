<template>
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <h3>Cotización de proveedor: {{proveedor.nombre}}</h3>
            <table class="table table-primary">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Guardar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(partida, index) in partidas" :key="partida.id" :index="index" :partida="partida" :proveedor_id="proveedor.id" :oferta="oferta(partida.id)" is="agregar-cotizacion-partida"></tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<script>
    import AgregarCotizacionPartida from './AgregarCotizacionPartida.vue'

    export default {
        components: {
            AgregarCotizacionPartida
        },

        watch: {
            proveedor: function(){
                this.obtenerOfertasProveedor()
            }
        },

        mounted() {
            this.obtenerOfertasProveedor()
        },
    
        props: ['partidas', 'proveedor'],
    
        data() {
            return {
                ofertas_proveedor: []
            }
        },
    
        methods: {
            obtenerOfertasProveedor(){
                axios.get('/compra_menor/ofertas_proveedor/' + this.partidas[0].compra_menor_id +'/' + this.proveedor.id)
                .then(({data}) => {
                    this.ofertas_proveedor = data
                })
            },

            oferta(partida_id){
                return _.find(this.ofertas_proveedor, ['partida_id', partida_id])
            }
        }
    }
</script>