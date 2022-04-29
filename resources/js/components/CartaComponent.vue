<template>
    <form @submit="submit">
        <div class="container cartesTrucades">
            <!-- Data -->
            <div class="input-group mt-3 mb-3 d-flex">
                <div class="col-3">
                    <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" v-model="cartes_trucades.data_hora">
                </div>
                <!-- Timer -->
                <div class="bg-gradient-4 text-dark shadow p-1 text-center ms-auto col-1">
                    <div class="" id="contador" v-model="cartes_trucades.provincies_id">
                        {{ minutes + ":" + seconds}}
                    </div>
                </div>
            </div>
            <!-- Dades Trucada -->
            <div class="input-group mb-2">
                <div class="col-4">
                    <label class="form-check-label" for="nom_trucada">Nom trucant:</label>
                    <input type="text" class="form-control" id="nom_trucada" name="nom_trucada" placeholder="Nom trucada" v-model="cartes_trucades.nom_trucada">
                </div>
                <div class="col-4">
                    <label class="form-check-label" for="telefon">Telefon:</label>
                    <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="Telefon" v-model="cartes_trucades.telefon">
                </div>
                <div class="col-4">
                    <label class="form-select-label" for="municipis_id_trucada">Municipi trucant:</label>
                    <select class="form-select" id="municipis_id_trucada" name="municipis_id_trucada" aria-label="municipis_id_trucada" v-model="cartes_trucades.municipis_id_trucada">
                        <option v-for="municipi in municipis" :value="municipi.id" :data-comarca="municipi.comarques_id">{{ municipi.nom }}</option>
                    </select>
                </div>
            </div>
            <div class="input-group mb-2">
                <div class="col-6">
                    <label class="form-select-label" for="procedencia_trucada">Procedencia trucada:</label>
                    <input type="text" class="form-control me-1 col-6" id="procedencia_trucada" name="procedencia_trucada" placeholder="Procedencia trucada" v-model="cartes_trucades.procedencia_trucada">
                </div>
                <div class="col-6">
                    <label class="form-select-label" for="origen_trucada">Origen trucada:</label>
                    <input type="text" class="form-control col-6" id="origen_trucada" name="origen_trucada" placeholder="Origen trucada" v-model="cartes_trucades.origen_trucada">
                </div>
            </div>
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" role="switch" name="fora_catalunya" value="1" id="fora_catalunya" v-model="cartes_trucades.fora_catalunya">
                <label class="form-check-label" for="fora_catalunya">Fora de Catalunya?</label>
            </div>
            <!-- Ubicació -->
            <!-- onSelect, llamar a funcion que calcule que mostrar -->
            <div class="input-group mb-3">
                <div class="col-4">
                    <label class="form-select-label" for="provincies_id">Provincia emergencia:</label>
                    <select class="form-select me-1" id="provincies_id" name="provincies_id" aria-label="provincies_id" v-model="cartes_trucades.provincies_id">
                        <option v-for="provincia in provincies" :value="provincia.id">{{ provincia.nom }}</option>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-select-label" for="comarques_id">Comarca emergencia:</label>
                        <select class="form-select me-1" id="comarques_id" name="comarques_id" aria-label="comarques_id" v-model="cartes_trucades.comarques_id">
                            <option v-for="comarca in comarques" :value="comarca.id" :data-provincia="comarca.provincies_id">{{ comarca.nom }}</option>
                        </select>
                </div>
                <div class="col-4">
                        <label class="form-select-label" for="municipis_id">Municipi emergencia:</label>
                        <select class="form-select" id="municipis_id" name="municipis_id" aria-label="municipis_id" v-model="cartes_trucades.municipis_id">
                            <option v-for="municipi in municipis" :value="municipi.id" :data-comarca="municipi.comarques_id">{{ municipi.nom }}</option>
                        </select>
                    </div>
            </div>
            <div class="input-group mb-3">
                <!-- Localització -->
                <div class="col-6">
                        <label class="form-select-label" for="tipus_localitzacions">Tipus emergencia:</label>
                        <select class="form-select" id="tipus_localitzacions" name="tipus_localitzacions" aria-label="tipus_localitzacions" v-model="cartes_trucades.tipus_localitzacions_id">
                            <option v-for="tipus_localitzacio in tipus_localitzacions" :value="tipus_localitzacio.id">{{ tipus_localitzacio.tipus }}</option>
                        </select>
                    </div>
                <!-- Incidents -->
                <div class="col-6">
                        <label class="form-select-label" for="incidents_id">Tipus incident:</label>
                        <select class="form-select ms-1" id="incidents_id" name="incidents_id" aria-label="incidents_id" v-model="cartes_trucades.incidents_id">
                            <option v-for="incident in incidents" :value="incident.id">{{ incident.descripcio }}</option>
                        </select>
                    </div>
            </div>
            <!-- Localització -->
                <div class="input-group mb-2">
                    <label class="form-select-label" for="descripcio_localitzacio">Descripció localizació incident:</label>
                    <textarea form="carta_trucada" name="descripcio_localitzacio" id="descripcio_localitzacio" cols="200" rows="4" placeholder="Descripcio localització" v-model="cartes_trucades.descripcio_localitzacio"></textarea>
                </div>
                <div class="input-group mb-2">
                    <label class="form-select-label" for="detall_localitzacio">Detalls localizació incident:</label>
                    <textarea form="carta_trucada" name="detall_localitzacio" id="detall_localitzacio" cols="200" rows="4" placeholder="Detall localització" v-model="cartes_trucades.detall_localitzacio"></textarea>
                </div>
                <div class="input-group mb-2">
                    <label class="form-select-label" for="altres_ref_localitzacio">Altres referencies localizació incident:</label>
                    <textarea form="carta_trucada" name="altres_ref_localitzacio" id="altres_ref_localitzacio" cols="200" rows="4" placeholder="Altres referencies localització" v-model="cartes_trucades.altres_ref_localitzacio"></textarea>
                </div>
                <div class="input-group mb-2">
                    <label class="form-select-label" for="nota_comuna">Nota comuna:</label>
                    <textarea form="carta_trucada" name="nota_comuna" id="nota_comuna" cols="200" rows="4" placeholder="Nota Comuna" v-model="cartes_trucades.nota_comuna"></textarea>
                </div>
            <input type="hidden" name="userid" id="userid" :value="user_id">
            <button type="submit" id="enviar" class="btn btn-success btn-sm" @click="toggleTimer" v-on:click="createCartaTrucada">Enviar</button>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['date', 'provincies', 'comarques', 'municipis', 'tipus_localitzacions', 'incidents', 'user_id'],
        data() {
            return {
                cartes_trucades: {
                    temps_trucada: '',
                    data_hora : '',
                    telefon: '',
                    procedencia_trucada: '',
                    origen_trucada: '',
                    nom_trucada: '',
                    usuaris_id: '',
                    nota_comuna: '',
                    fora_catalunya: 'false',
                    provincies_id: '',
                    municipis_id: '',
                    municipis_id_trucada: '',
                    tipus_localitzacions_id: '',
                    descripcio_localitzacio: '',
                    detall_localitzacio: '',
                    altres_ref_localitzacio: '',
                    expedients_id: '',
                    incidents_id: '',
                    codi_trucada: 'codi_trucada'
                },

                seconds: '00',
                minutes: '00',
                time: 0,
                isRunning: false,
                interval: null,
               /*  provincies: [] */
            }
        },
        methods: {
            createCartaTrucada() {
                console.log("ToDo");
            },
            /* getProvincies() {
                let me = this;
                axios.get('/provincies')
                    .then((response) => {
                        me.provincies = response.data;
                    })
                    .catch((error) => {
                        console.log("Ha habido un error");
                    })
            }, */
            toggleTimer() {
                if (this.isRunning) {
                    clearInterval(this.interval);
                    console.log('timer stops');
                } else {
                    this.interval = setInterval(this.incrementTime, 1000);
                }
                this.isRunning = !this.isRunning
            },
            incrementTime() {
                this.time = parseInt(this.time) + 1;
                this.minutes = Math.floor((this.time)/60);
                this.seconds = this.time - this.minutes * 60;
                if(this.minutes < 10){
                    this.minutes = "0" + parseInt(this.minutes);
                }
                if(this.seconds < 10){
                    this.seconds = "0" + parseInt(this.seconds);
                }
            },
            clearTime() {
                this.isRunning = !this.isRunning
            },
            submit() {
                let me = this;
                cartes_trucades.usuaris_id = user_id;
                cartes_trucades.temps_trucada = time;
                axios
                    .post('/cartaTrucada/create', me.cartes_trucades)
                    .then(function(response){

                })
            }
            // setContador() {
            //     if (this.seconds) {
            //         console.log("pasa por here");
            //         setInterval(() => {
            //             this.seconds++;

            //             if (this.seconds > 59) {
            //                 this.minutes++;
            //                 this.seconds = 0;
            //             }
            //         }, 1000);
            //     }
            // },
        },
        created() {
            // this.setContador();
            this.toggleTimer();
            /*
            this.getProvincies();
            this.date = new Date().toISOString();
            */
        }
    }
</script>
