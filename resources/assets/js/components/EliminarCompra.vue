<template>
    <div>
        <button class="btn btn-danger" @click="confirmarEliminarCompra">
            Eliminar
        </button>
    </div>
</template>


<script>
    import swal from 'sweetalert2'

    export default {
        props: ['compra_id'],

        data() {
            return {
            }
        },

        methods: {
            confirmarEliminarCompra(){
                swal({
                    title: '¿Estás seguro de eliminar la compra?',
                    text: "Se borraran los datos de la compra",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Estoy seguro',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        this.eliminarCompra()
                    }
                })
            },

            eliminarCompra(){
                axios.delete('/compras_menores/' + this.compra_id).then(() => {
                    location.reload()
                })
            }
        }
    }
</script>