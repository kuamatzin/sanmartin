<template>
    <tr>
        <th scope="row">{{index + 1}}</th>
        <td v-if="edit == false">
            {{partida.descripcion}}
        </td>
        <td v-else>
            <input type="text" class="form-control" v-model="partida_actualizar.descripcion">
        </td>
        <td v-if="edit == false">
            {{partida.cantidad_solicitada}}
        </td>
        <td v-else>
            <input type="text" class="form-control" v-model="partida_actualizar.cantidad_solicitada">
        </td>
        <td v-if="edit == false">
            <button class="btn btn-warning" @click="edit = true">
                Editar
            </button>
        </td>
        <td v-else>
            <button class="btn btn-success" @click="actualizarPartida">
                Guardar
            </button>
        </td>
        <td v-if="edit == false">
            <button class="btn btn-danger" @click="borrarPartida">
                Eliminar
            </button>
        </td>
        <td v-else>
            <button class="btn btn-secondary" @click="edit = false">
                Cancelar Edición
            </button>
        </td>
        
    </tr>
</template>


<script>
    export default {
        components: {
        },

        props: ['partida', 'index'],

        data() {
            return {
                edit: false,
                partida_actualizar: this.partida
            }
        },

        methods: {
            actualizarPartida(){
                axios.put('/partidas_compras_menores/' + this.partida_actualizar.id , this.partida_actualizar).then(({data}) => {
                    this.$emit('editar_partida', [data, this.index])
                    this.edit = false
                })
            },

            borrarPartida(){
                axios.delete('/partidas_compras_menores/' + this.partida_actualizar.id)
                .then(({data}) => {
                    toastr.success('Partida borrada correctamente')
                    this.$emit('borrar_partida', this.index)
                })
            }
        }
    }
</script>