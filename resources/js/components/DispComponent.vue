<template>

    <!-- DIV DEL TITULO DEL DISPOSITIVO -->
        <div class="container">

        <div class="text-center">
            <p class="display-4 text-primary shadow p-3">My Devices</p>
            <button type="button" class="btn btn-primary btn-lg my-2" data-bs-toggle="modal" data-bs-target="#modalKey">
                        <i class="fa-solid fa-user-plus"></i> Add device
                    </button>
        </div>


        <!-- TARJETA POR CADA DISPOSITIVO -->
        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto" v-for="device in devices">
                <div class="card">
                    <div class="card-header bg-dark ">
                        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalDisp" @click="mEditar(device)">Edit
                    </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h2 class="card-titlex">Nickname: {{ device.nick }}</h2>
                                <p class="card-text">Type of device: {{ device.model }}</p>
                                <p class="card-text">Key: {{ device.key }} </p>
                                <p class="card-text">ID: {{ device.id }}</p>
                                <a href="#" class="btn btn-outline-primary disabled">Active</a>
                                <!-- <a href="#" class="btn btn-primary">Entrar</a> -->
                            </div>
                            <div class="col-3 text-center">
                                <!-- <img :src="'storage/' + business.bsn_logo" class="img-fluid rounded" width="170"
                                    height="170"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- VENTANA MODAL PARA LA KEY -->
        <div class="modal fade" id="modalKey" tabindex="-1" aria-labelledby="modalKeyLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h1 class="modal-title fs-5" id="modalKeyLabel">Add Device</h1>
                        <!-- <button type="button" id="close" class="btn-closex" data-bs-dismiss="modal" aria-label="Close">
                        </button> -->
                        <i class="fa-solid fa-xmark" id="close" data-bs-dismiss="modal" aria-label="Close"></i>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Key</label>
                                <input type="text" class="form-control" id="name" placeholder="Device key" v-model="valor">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button v-if="valor != ''" type="button" class="btn btn-success" data-bs-dismiss="modal" @click.prevent="crear()">Add</button>
                            <button v-else type="button" class="btn btn-success disabled" data-bs-dismiss="modal">Add</button>
                            <!-- <button type="submit" class="btn btn-success" @click.prevent="crear()" v-if="modoCrear">Crear Usuario</button>
                            <button type="submit" class="btn btn-success" @click.prevent="editar()" v-if="modoEditar">Guardar Cambios</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- VENTANA MODAL PARA EL DISPOSITIVO -->
        <div class="modal fade" id="modalDisp" tabindex="-1" aria-labelledby="modalDispLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h1 class="modal-title fs-5" id="modalDispLabel">Edite Device</h1>
                        <!-- <button type="button" id="close" class="btn-closex" data-bs-dismiss="modal" aria-label="Close">
                        </button> -->
                        <i class="fa-solid fa-xmark" id="close" data-bs-dismiss="modal" aria-label="Close"></i>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nick" class="form-label">Nickname</label>
                                <input type="text" class="form-control" id="nick" placeholder="Devide nickname"
                                v-model="datosDevice.nick">
                                <p class="pt-3">For the changes to take effect, reload the page*</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" @click.prevent="editar()">Save changes</button>
                            <!-- <button type="submit" class="btn btn-success" @click.prevent="crear()" v-if="modoCrear">Crear Usuario</button>
                            <button type="submit" class="btn btn-success" @click.prevent="editar()" v-if="modoEditar">Guardar Cambios</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

    </div>
</template>

<script>
import * as alertas from '../alertas';

    export default {
        mounted() {
            this.getDevices();
        },
        data() {
            return {
                devices: [],
                datosDevice: {nick:''},
                valor: '',
            }
        },
        methods: {
            getDevices() {
                var url = '/listar_disps';
                axios.get(url).then(res => {
                    this.devices = res.data;
                });
            },
            alertaC(){
                this.valor = '';
                alertas.correcto();
            },
            agregar(){   
                this.valor = '';
            },
            crear(){
                axios.post('/disp_key',this.valor).then(res => {
                    this.valor = '';
                    alertas.correcto();
                }).catch(function (error){
                    var array = Object.values(error.response.data.errors);
                    array.forEach(element => Swal.fire(String(element)));
                });
            },
            mEditar(datos){
                this.datosDevice = {nick: datos.nick};
                this.idDevice = datos.id;
            },
            editar(){
                axios.put('editar_disp/' + this.idDevice, this.datosDevice).then(res => {
                    this.idDevice = '',
                    $('#close').click();
                    alertas.correcto();
                    // setInterval("location.reload()");
                }).catch(function (error){
                    var array = Object.values(error.response.data.errors);
                    array.forEach(element => Swal.fire(String(element)));
                });
            },
            
        },
        // watch: {
        //     valor: function(newValue){
        //         if( newValue == ''){
        //             this.valor = 'disabled';
        //         }
        //     }
        // }
    }

</script>
