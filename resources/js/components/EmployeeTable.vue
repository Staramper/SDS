<template>
    <!-- TABLA PARA MOSTRAR LOS empleados -->
    <div v-if="Mgrafico" class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="d-flex align-items-center m-0 text-primary">Employees</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEmployee" @click="mCrear()">
                    <i class="fa-solid fa-user-plus"></i> Add Employee
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="employeeTable">
                    <thead>
                        <tr class="bg-dark">
                            <!-- <th width="5%">Id</th> -->
                            <th width="10%">Device</th>
                            <th width="25%">Name</th>
                            <th width="20%">Email</th>
                            <th width="10%">Nip</th>
                            <th width="10%">Card</th>
                            <th width="10%">FingerPrint</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="employee in empleados">
                            <!-- <td>{{ employee.id }}</td> -->
                            <td>{{ employee.id_disp }}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.email }}</td>
                            <td>{{ employee.nip }}</td>
                            <td v-if="employee.rfid !=''">Active</td>
                            <td v-else>Disabled</td>
                            <!-- <td>{{ employee.rfid }}</td> -->
                            <td v-if="employee.finger !='' ">Active</td>
                            <td v-else>Disabled</td>
                            <td class="d-flex justify-content-around">
                                <button class="btn btn-outline-dark" @click="info(employee)" title="Information"><i class="fa fa-info"></i></button>
                                <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalEmployee" @click="mEditar(employee)" title="Edit the employee">
                                <i class="fa-regular fa-pen-to-square"></i></button>
                                <button class="btn btn-outline-dark" @click="eliminar(employee)" title="Delete the employee"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div v-else>
        <estadistica-component :name="this.nameEmployee"></estadistica-component>
    </div>

    <!-- VENTANA MODAL PARA EL Empleado -->
    <div class="modal fade" id="modalEmployee" tabindex="-1" aria-labelledby="modalEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5" id="modalEmployeeLabel"> {{ titulo }}</h1>
                    <!-- <button type="button" id="close" class="btn-closex" data-bs-dismiss="modal" aria-label="Close">
                    </button> -->
                    <i class="fa-solid fa-xmark" id="close" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="disp" class="form-label">Device</label>
                            <input type="text" class="form-control" id="disp" aria-describedby="dispHelp" placeholder="Employee device"
                            v-model="datosEmpleado.id_disp">
                            <div id="nipHelp" class="form-text">You should only use numbers in this field.</div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name of the employee"
                            v-model="datosEmpleado.name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Employee email"
                            v-model="datosEmpleado.email">
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">Nip</label>
                            <input type="string" class="form-control" id="nip" aria-describedby="nipHelp" placeholder="Employee nip"
                            v-model="datosEmpleado.nip">
                            <div id="nipHelp" class="form-text">You should only use numbers in this field.</div>
                        </div>
                        <div class="mb-3">
                            <p class="text-danger">Alert*:</p>
                            <p>To change the RFID/CARD, use the device interface</p>
                            <p>To change the FingerPrint, use the device interface</p>
                        </div>
                        <!-- <div v-if="modoEditar" class="mb-3">
                            <label for="rfid" class="form-label">rfid</label>
                            <input type="text" class="form-control" id="rfid" aria-describedby="rfidHelp" placeholder="Employee rfid"
                            v-model="datosEmpleado.rfid">
                        </div> -->
                        <!-- <div class="mb-3" v-if="modoCrear">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Employee password"
                            v-model="datosEmpleado.password"> -->
                            <!-- <div id="passwordHelp" class="form-text">You should never share your password with third parties</div> -->
                        <!-- </div> -->
                        <!-- <div class="" v-if="modoEditar">
                            <label for="role" class="form-label">Rol del Empleado</label>
                            <select class="form-select" aria-label="role" v-model="datosEmpleado.role">
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                                <option value="socio">socio</option>
                            </select>
                        </div> -->
                    </div>
                    <div v-if="modoCrear" class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-success" @click.prevent="crear()" 
                        v-if="modoCrear && datosEmpleado.id_disp != '' && datosEmpleado.name != '' && datosEmpleado.email != '' && datosEmpleado.nip != ''">
                        Create Employee</button>
                        
                        <button type="submit" class="btn btn-success disabled" @click.prevent="crear()" 
                        v-if="modoCrear && datosEmpleado.id_disp == '' || datosEmpleado.name == '' || datosEmpleado.email == '' || datosEmpleado.nip == ''">
                        Create Employee</button>

                    </div>
                    <div v-if="modoEditar" class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                        <!-- <button type="submit" class="btn btn-info" @click.prevent="probar()">Probar</button> -->

                        <button type="submit" class="btn btn-success" @click.prevent="editar()" 
                        v-if="modoEditar && datosEmpleado.id_disp != '' && datosEmpleado.name != '' && datosEmpleado.email != '' && datosEmpleado.nip != ''">
                        Save Changes</button>
                    
                        <button type="submit" class="btn btn-success disabled" @click.prevent="editar()" 
                        v-if="modoEditar && datosEmpleado.id_disp == '' || datosEmpleado.name == '' || datosEmpleado.email == '' || datosEmpleado.nip == ''">
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
        },
        created: function () {
                let self = this;
                this.emitter.on('clicker', function (rComand) {
                    self.get_click(rComand);
                });
            },
        mounted() {
            this.getEmployee();
        },
        data() {
            return {
                empleados: [],
                datosEmpleado: {id_disp:'', name:'',email:'', nip:'',rfid:'', finger:'', password:''},
                titulo: '',
                modoCrear: false,
                modoEditar: false,
                idEmployee: '',
                nameEmployee: '',
                Mgrafico: true,
            }
        },
        methods: {
            tabla(){
                this.$nextTick(() => {
                    $('#employeeTable').DataTable({
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
            getEmployee(){
                    axios.get('listar_empleados').then(res => {
                        this.empleados = res.data;
                        $('#employeeTable').DataTable().destroy();
                        this.tabla();
                    });
            },
            mCrear(){
                this.datosEmpleado = {id_disp:'', name:'',email:'', nip:'',rfid:'', finger:'', password:''};
                this.titulo = 'Create New Employee';
                this.modoCrear = true;
                this.modoEditar = false;
                // console.log(this.modoEditar);
            },
            crear(){
                axios.post('crear_empleados',this.datosEmpleado).then(res => {
                    this.datosEmpleado = {id_disp:'', name:'',email:'', nip:'',rfid:'', finger:'', password:''};
                    this.getEmployee();
                    $('#close').click();
                    alertas.correcto();
                }).catch(function (error){
                    var array = Object.values(error.response.data.errors);
                    array.forEach(element => Swal.fire(String(element)));
                });
            },
            mEditar(datos){
                this.datosEmpleado = {id_disp: datos.id_disp, name: datos.name , email: datos.email, nip: datos.nip, rfid: datos.rfid, finger: datos.finger};
                this.titulo = 'Edit Employee';
                this.modoEditar = true;
                this.modoCrear = false;
                this.idEmployee = datos.id;
                this.nipEmployee = datos.nip;
            },
            editar(){                
                axios.put('editar_empleados/' + this.idEmployee, this.datosEmpleado).then(res => {
                    // console.log(res);
                    this.idEmployee = '',
                    this.getEmployee();
                    $('#close').click();
                    alertas.correcto();
                }).catch(function (error){
                    var array = Object.values(error.response.data.errors);
                    array.forEach(element => Swal.fire(String(element)));
                });
            },
            probar(){
                console.log('editar_emp/' + this.nipEmployee, this.datosEmpleado = { rfid : 'datos.rfid'});

                axios.put('editar_emp/' + this.nipEmployee, this.datosEmpleado = { rfid : 'datos.rfid'}).then(res => {
                    console.log(res);
                    this.getEmployee();
                    $('#close').click();
                    alertas.correcto();
                }).catch(function (error){
                    var array = Object.values(error.response.data.errors);
                    array.forEach(element => Swal.fire(String(element)));
                });  
            },
            info(datos){
                this.Mgrafico = false;
                this.nameEmployee = datos.name; 
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
                    axios.delete('eliminar_empleados/' + datos.id).then(res => {
                    this.getEmployee();
                    Swal.fire('Deleted!','The record has been successfully deleted','success');
                })
            }
                })
            },
            get_click(click) {
                switch (click) {
                    case 'close':
                        this.Mgrafico = true;
                        $('#employeeTable').DataTable().destroy();
                        this.tabla();
                        break;
                    default:
                        break;
                }
            },
        }
    }

</script>
