<template>
    <tr>
        <th scope="row"></th>
        <td>
            <input type="text" class="form-control" placeholder="Descripción" v-model="partida.descripcion">
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Cantidad" v-model="partida.cantidad_solicitada">
        </td>
        <td>
            <button class="btn btn-success" @click="guardarPartida">
                Guardar
            </button>
        </td>
        <td>
            <button type="button" class="btn btn-secondary" aria-label="Close" @click="cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </td>
    </tr>
</template>


<script>
    export default {
        components: {
        },

        props: ['dependenciaId'],

        data() {
            return {
                partida: {
                    dependencia_id: this.dependenciaId,
                    descripcion: '',
                    cantidad_solicitada: ''
                }
            }
        },

        methods: {
            cerrar(){
                this.partida.descripcion = ''
                this.partida.cantidad = ''
                this.$emit('cerrar')
            },

            guardarPartida(){
                axios.post('/compras_menores', this.partida).then(({data}) => {
                    //toastr.success('Partida agregada correctamente')
                    //this.$emit('nueva_partida', data)
                    //this.cerrar()
                })
            }
        }
    }
</script>