<template>
    <tr>
        <th scope="row">{{index + 1}}</th>
        <td>{{partida.descripcion}}</td>
        <td>{{partida.cantidad_solicitada}}</td>
        <td>
            <input :id="index + '_precioUnitario'" type="text" class="form-control" placeholder="Precio Unitario" :value="getPrecioUnitario">
        </td>
        <td>
            <input :id="index + '_total'" type="text" class="form-control" placeholder="Total" :value="getTotal">
        </td>
        <td>
            <button class="btn btn-primary" @click="guardarOfertaPartidaProveedor">
                Guardar
            </button>
        </td>
    </tr>
</template>


<script>
    export default {
        components: {},
    
        computed: {
            getPrecioUnitario: function() {
                return this.oferta ? this.oferta.precio_unitario : 0
            },

            getTotal: function() {
                return this.oferta ? this.oferta.total : 0
            }
        },
    
        props: ['index', 'partida', 'proveedor_id', 'oferta'],
    
        data() {
            return {
            }
        },
    
        methods: {
            guardarOfertaPartidaProveedor() {
                let partida_form = {
                    proveedor_id: this.proveedor_id,
                    precio_unitario: $('#' + this.index + '_precioUnitario').val(),
                    total: $('#' + this.index + '_total').val()
                }
                axios.post('/compra_menor/oferta/' + this.partida.id, partida_form).then(({
                    data
                }) => {
                    toastr.success('Cotización de partida guardada correctamente')
                });
            },
        }
    }
</script>