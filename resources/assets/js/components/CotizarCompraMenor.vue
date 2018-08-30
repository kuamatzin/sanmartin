<template>
    <div>
        <div class="card card-default">
            <div class="card-header">
                <h1>Cotizar Compra Menor - Folio {{compra.id}}</h1>
            </div>
            <div class="card-body">
                <!-- Agregar Proveedor -->
                <select name="" id="" class="form-control" v-model="proveedor_agregar">
                    <option v-if="proveedores" v-for="proveedor in proveedores" :value="proveedor.id">
                        {{proveedor.nombre}}
                    </option>
                </select>
                <button class="btn btn-success mt-2" @click="agregarProveedorCompraMenor">Agregar Proveedor</button>
                <!-- Fin Agregar Proveedor -->

                <!-- Proveedores Seleccionados -->
                <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Ver Cotización</th>
                            <th scope="col">Eliminar proveedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(proveedor, index) in proveedores_cotizando">
                            <th scope="row">{{index + 1}}</th>
                            <td>{{proveedor.proveedor.nombre}}</td>
                            <td>
                                <button class="btn btn-primary" @click="verCotizacionProveedor(proveedor.proveedor)">
                                    Ver cotización
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger" @click="confirmarEliminarProveedor(proveedor.proveedor.id, index)">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Fin Proveedores Seleccionados -->

                <agregar-cotizacion-proveedor v-if="agregar_cotizacion" :proveedor="proveedor" :partidas="compra_partidas"></agregar-cotizacion-proveedor>
            </div>
        </div>
    </div>
</template>


<script>
    import swal from 'sweetalert2'
    import AgregarCotizacionProveedor from './AgregarCotizacionProveedor.vue'
    
    export default {
        components: {
            AgregarCotizacionProveedor
        },
    
        props: ['compra_id', 'compra', 'compra_partidas'],
    
        mounted() {
            this.obtenerProveedores()
            this.obtenerProveedoresCotizando()
        },
    
        data() {
            return {
                proveedor_agregar: 122,
                agregar_cotizacion: false,
                proveedores: [],
                proveedores_cotizando: [],
                proveedor: 1,
            }
        },
    
        methods: {
            obtenerProveedores() {
                axios.get('/proveedores/compra_menor').then(({
                    data
                }) => {
                    this.proveedores = data
                })
            },
    
            obtenerProveedoresCotizando() {
                console.log("EUEU")
                axios.get('/compra_menor/proveedores_cotizando/' + this.compra_id).then(({
                    data
                }) => {
                    this.proveedores_cotizando = data
                })
            },
    
            agregarProveedorCompraMenor() {
                axios.post('/compras_menores/' + this.compra_id + '/agregar_proveedor/' + this.proveedor_agregar)
                    .then(({
                        data
                    }) => {
                        this.obtenerProveedoresCotizando()
                        toastr.success('Proveedor agregado correctamente')
                    })
            },
    
            verCotizacionProveedor(proveedor) {
                this.proveedor = proveedor
                this.agregar_cotizacion = true
            },
    
            confirmarEliminarProveedor(proveedor_id, index){
                swal({
                    title: '¿Estás seguro de eliminar al proveedor?',
                    text: "Se borraran los datos de cotización",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Estoy seguro',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        this.eliminarProveedor(proveedor_id, index)
                    }
                })
            },

            eliminarProveedor(proveedor_id, index){
                let that = this
                axios.post('/compras_menores/eliminar_proveedor/' + this.compra_id + '/' + proveedor_id).then((data) => {
                    toastr.success('Proveedor eliminado correctamente')
                    that.proveedores_cotizando.splice(index, 1)
                })
            }
        }
    }
</script>