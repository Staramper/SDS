<template>

    <button  type="button" class="btn btn-danger mb-2" @click="regresar()">
             <i class="fa-solid fa-reply"></i> Regresar
    </button>

    <h1>{{ name }}'s entries</h1>
        <div class="card">
                <div class="card-body">
            <canvas id="visitaD" ref="visitaD"></canvas>
        </div>
    </div>


</template>


<script>
    export default{
        props: {
            name: {
                type: String,
                default: '',
                required: false
            },
        },
        mounted() {
            this.grafico();
        },
        data() {
            return {
                datos: [],
            }
        },
        methods: {
            grafico(){

                axios.get('/datos').then(res => {
                    this.datos = res.data;

                    const ctx = this.$refs.visitaD;
                    let labels = this.datos;
                    // console.log(labels);
                    let fechas = [];
                    let total = [];
                    
                    labels.forEach(function(objeto) {
                        let valor1 = Object.values(objeto)[0]; 
                        fechas.push(valor1);

                        let valor2 = Object.values(objeto)[1]; 
                        total.push(valor2);
                    });
                    // console.log(fechas);
    
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                        labels: fechas,
                        datasets: [{
                            label: 'Entries of the week',
                            data: total,
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                            y: {
                            beginAtZero: true
                            }
                        }
                        }
                    });
                });
                },
            regresar(){
                this.emitter.emit('clicker', 'close');
            },
            }

    }
</script>

