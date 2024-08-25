<template>
    <!-- TABLA PARA MOSTRAR LOS USUARIOS -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="d-flex align-items-center m-0 text-primary">Users</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUser" @click="mCrear()">
                    <i class="fa-solid fa-user-plus"></i> Add User
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="userTable">
                    <thead>
                        <tr class="bg-dark">
                            <th width="5%">Id</th>
                            <th width="20%">Name</th>
                            <th width="20%">Email</th>
                            <th width="20%">Role</th>
                            <th width="20%">Key Device</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in usuarios">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.role }}</td>
                            <td>{{ user.key }}</td>
                            <td class="d-flex justify-content-around">
                                <!-- <button class="btn btn-outline-dark" @click="info(user)" title="Information"><i class="fa fa-info"></i></button> -->
                                <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalUser" @click="mEditar(user)" title="Edit the user">
                                <i class="fa-regular fa-pen-to-square"></i></button>
                                <button class="btn btn-outline-dark" @click="eliminar(user)" title="Delete the user"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- VENTANA MODAL PARA EL USUARIO -->
    <div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5" id="modalUserLabel"> {{ titulo }}</h1>
                    <!-- <button type="button" id="close" class="btn-closex" data-bs-dismiss="modal" aria-label="Close">
                    </button> -->
                    <i class="fa-solid fa-xmark" id="close" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name of the User"
                            v-model="datosUsuario.name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="User email"
                            v-model="datosUsuario.email">
                        </div>
                        <div class="mb-3">
                            <label for="key" class="form-label">Key Device</label>
                            <input type="text" class="form-control" id="key" aria-describedby="keyHelp" placeholder="Key Device"
                            v-model="datosUsuario.key">
                        </div>
                        <div class="mb-3" v-if="modoCrear">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="User password"
                            v-model="datosUsuario.password">
                            <!-- <div id="passwordHelp" class="form-text">You should never share your password with third parties</div> -->
                        </div>
                        <!-- <div class="" v-if="modoEditar">
                            <label for="role" class="form-label">Rol del Empleado</label>
                            <select class="form-select" aria-label="role" v-model="datosUsuario.role">
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                                <option value="socio">socio</option>
                            </select>
                        </div> -->
                    </div>
                    <div v-if="modoCrear" class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-success" @click.prevent="crear()" 
                        v-if="modoCrear && datosUsuario.name != '' && datosUsuario.email != '' && datosUsuario.key != '' && datosUsuario.password != ''">
                        Create User</button>
                        
                        <button type="submit" class="btn btn-success disabled" @click.prevent="crear()" 
                        v-if="modoCrear && datosUsuario.name == '' || datosUsuario.email == '' || datosUsuario.key == '' || datosUsuario.password == ''">
                        Create User</button>

                    </div>
                    <div v-if="modoEditar" class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        <!-- <button type="submit" class="btn btn-info" @click.prevent="probar()">Probar</button> -->

                        <button type="submit" class="btn btn-success" @click.prevent="editar()" 
                        v-if="modoEditar && datosUsuario.name != '' && datosUsuario.email != '' && datosUsuario.key != '' && datosUsuario.password != ''">
                        Save Changes</button>
                    
                        <button type="submit" class="btn btn-success disabled" @click.prevent="editar()" 
                        v-if="modoEditar && datosUsuario.name == '' || datosUsuario.email == '' || datosUsuario.key == '' || datosUsuario.password == ''">
                        Save Changes</button>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
import * as alertas from '../alertas';

    export default {
        props: {
            name: {
                type: String,
                default: '',
                required: false
            },
            rol: {
                type: String,
                default: 'admin',
                required: true
            },
        },
        created: function () {
                let self = this;
                this.emitter.on('clicker', function (rComand) {
                    self.get_click(rComand);
                });
            },
        mounted() {
            this.getUser();
        },
        data() {
            return {
                usuarios: [],
                datosUsuario: {name:'', email:'', key:'', password:''},
                titulo: '',
                modoCrear: false,
                modoEditar: false,
                idUser: '',
                Mgrafico: true,
            }
        },
        methods: {
            tabla(){
                this.$nextTick(() => {
                    $('#userTable').DataTable({
                        "order": [[ 0, 'desc']],
                        dom:"<'row'<'col-sm-12 mb-2'B>>" +
                            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [
                            {
                                "extend": "copyHtml5",
                                "text": "<i class='fa-regular fa-copy'></i>",
                                "titleAttr": "Copiar",
                                "className": "bg-dark"
                            },
                            {
                                "extend": "pdfHtml5",
                                "text": "<i class='fa-regular fa-file-lines'></i>",
                                "titleAttr": "Exportar a PDF",
                                "className": "bg-danger"
                            },
                            {
                                "extend": "excelHtml5",
                                "text": "<i class='fa-regular fa-file-excel'></i>",
                                "titleAttr": "Exportar a Excel",
                                "className": "bg-success"
                            },
                            {
                                "extend": "csvHtml5",
                                "text": "<i class='fa-solid fa-file-csv'></i>",
                                "titleAttr": "Exportar a CSV",
                                "className": "bg-secondary"
                            },
                            {
                                "extend": "print",
                                "text": "<i class='fa-solid fa-print'></i>",
                                "titleAttr": "Imprimir",
                                "className": "bg-light"
                            },
                            // 'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            },
            getUser(){
                    axios.get('listar_usuarios').then(res => {
                        this.usuarios = res.data;
                        $('#userTable').DataTable().destroy();
                        this.tabla();
                    });
            },
            mCrear(){
                this.datosUsuario = {name:'',email:'', key:'', password:''};
                this.titulo = 'Create New User';
                this.modoCrear = true;
                this.modoEditar = false;
            },
            crear(){
                axios.post('crear_usuarios',this.datosUsuario).then(res => {
                    this.datosUsuario = {name:'',email:'', key:'', password:''};
                    this.getUser();
                    $('#close').click();
                    alertas.correcto();
                }).catch(function (error){
                    var array = Object.values(error.response.data.errors);
                    array.forEach(element => Swal.fire(String(element)));
                });
            },
            mEditar(datos){
                this.datosUsuario = {name: datos.name , email: datos.email , key: datos.key};
                this.titulo = 'Edit User';
                this.modoEditar = true;
                this.modoCrear = false;
                this.idUser = datos.id;
            },
            editar(){
                axios.put('editar_usuarios/' + this.idUser, this.datosUsuario).then(res => {
                    this.idUser = '',
                    this.getUser();
                    $('#close').click();
                    alertas.correcto();
                }).catch(function (error){
                    var array = Object.values(error.response.data.errors);
                    array.forEach(element => Swal.fire(String(element)));
                });
            },
            eliminar(datos){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to reverse this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                }).then((result) => {
                if (result.value) {
                    axios.delete('eliminar_usuarios/' + datos.id).then(res => {
                    this.getUser();
                    Swal.fire('Deleted!','The record has been successfully deleted','success');
                })
            }
                })
            },
            get_click(click) {
                switch (click) {
                    case 'close':
                        this.Mgrafico = true;
                        $('#userTable').DataTable().destroy();
                        this.tabla();
                        break;
                    default:
                        break;
                }
            },
        }
    }

</script>
