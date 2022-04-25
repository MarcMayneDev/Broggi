<template>
    <div class="container cartesTrucades">
        <!-- Data -->
        <div class="input-group mt-3 mb-3 d-flex">
            <div class="col-3">
                <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" :value="date">
            </div>
            <!-- Timer -->
            <div class="bg-gradient-4 text-dark shadow p-1 text-center ms-auto col-1">
                <div class="" id="contador">
                    {{ String(minutes).padStart(2, '0') }}:{{ String(seconds).padStart(2, '0') }}
                </div>
            </div>
        </div>
        <!-- Dades Trucada -->
        <div class="input-group mb-3">
            <input type="text" class="form-control me-1 col-6" id="nom_trucada" name="nom_trucada" placeholder="Nom trucada">
            <input type="tel" class="form-control col-6" id="telefon" name="telefon" placeholder="Telefon">
        </div>
        <div class="input-group mb-2">
            <input type="text" class="form-control me-1 col-6" id="procedencia_trucada" name="procedencia_trucada" placeholder="Procedencia trucada">
            <input type="text" class="form-control col-6" id="origen_trucada" name="origen_trucada" placeholder="Origen trucada">
        </div>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" name="fora_catalunya" value="1" id="fora_catalunya">
            <label class="form-check-label" for="fora_catalunya">Fora de Catalunya?</label>
        </div>
        <!-- Ubicació -->
        <!-- onSelect, llamar a funcion que calcule que mostrar -->
        <div class="input-group mb-3">
            <select class="form-select me-1" id="provincies_id" name="provincies_id" aria-label="provincies_id">
                <option v-for="provincia in provincies" :value="provincia.id">{{ provincia.nom }}</option>
            </select>

            <select class="form-select me-1" id="comarques_id" name="comarques_id" aria-label="comarques_id">
                <option v-for="comarca in comarques" :value="comarca.id" :data-provincia="comarca.provincies_id">{{ comarca.nom }}</option>
            </select>
            <select class="form-select" id="municipis_id" name="municipis_id" aria-label="municipis_id">
                <option v-for="municipi in municipis" :value="municipi.id" :data-comarca="municipi.comarques_id">{{ municipi.nom }}</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <!-- Localització -->
            <select class="form-select" id="tipus_localitzacions" name="tipus_localitzacions" aria-label="tipus_localitzacions">
                <option v-for="tipus_localitzacio in tipus_localitzacions" :value="tipus_localitzacio.id">{{ tipus_localitzacio.tipus }}</option>
            </select>
            <!-- Incidents -->
            <select class="form-select ms-1" id="incidents_id" name="incidents_id" aria-label="incidents_id">
                <option v-for="incident in incidents" :value="incident.id">{{ incident.descripcio }}</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <textarea form="carta_trucada" name="descripcio_localitzacio" id="descripcio_localitzacio" cols="200" rows="4" placeholder="Descripcio localització"></textarea>
        </div>
        <div class="input-group mb-3">
            <textarea form="carta_trucada" name="detall_localitzacio" id="detall_localitzacio" cols="200" rows="4" placeholder="Detall localització"></textarea>
        </div>
        <div class="input-group mb-3">
            <textarea form="carta_trucada" name="altres_ref_localitzacio" id="altres_ref_localitzacio" cols="200" rows="4" placeholder="Altres referencies localització"></textarea>
        </div>
        <div class="input-group mb-3">
            <textarea form="carta_trucada" name="nota_comuna" id="nota_comuna" cols="200" rows="4" placeholder="Nota Comuna"></textarea>
        </div>
        <input type="hidden" name="userid" id="userid" :value="user_id">
        <button type="submit" id="enviar" class="btn btn-success btn-sm" v-on:click="createCartaTrucada">Enviar</button>
    </div>
</template>

<script>
    export default {
        props: ['date', 'provincies', 'comarques', 'municipis', 'tipus_localitzacions', 'incidents', 'user_id'],
        data() {
            return {
                seconds: 0,
                minutes: 0,
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
            setContador() {
                if (this.seconds) {
                    console.log("pasa por here");
                    setInterval(() => {
                        this.seconds++;

                        if (this.seconds > 59) {
                            this.minutes++;
                            this.seconds = 0;
                        }
                    }, 1000);
                }
            },
        },
        created() {
            this.setContador();
            /*
            this.getProvincies();
            this.date = new Date().toISOString();
            */
        }
    }
</script>
