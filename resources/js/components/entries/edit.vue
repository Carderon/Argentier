<template>
    <form class="flex -col -md" @submit.prevent="handleUpdate">
        <div class="flex -row -md -child">
            <Input
                :placeholder="mutableEntry.is_in ? 'Ex.: Dépôt mensuel' : 'Ex.: Primeur'"
                label="Nom"
                type="text"
                name="label"
                v-model="mutableEntry.label"
            />

            <Input
                :placeholder="mutableEntry.is_in ? '14.5' : '5'"
                label="Montant"
                type="number"
                name="amount"
                v-model="mutableEntry.amount"
                currency="€"
                step="0.01"
                min="0"
            />
        </div>

        <div class="flex -row -md -child">
            <Select
                id="category"
                name="category"
                v-model="mutableEntry.category"
                placeholder="Selectionnez une catégorie"
                label="Catégorie"
                :options="categoriesOptions"
            />

            <Select
                id="category"
                name="category"
                v-model="mutableEntry.priority"
                placeholder="Selectionnez une priorité"
                label="Priorité"
                :options="prioritiesOptions"
            />
        </div>

        <h3 class="-child">Détails</h3>

        <ul class="flex -col -md -child">
            <li class="-child" v-for="detail in mutableEntry.details">
                <span>{{ detail.label }}</span>
                <span><strong>{{ Number.parseFloat(detail.amount).toFixed(2) }} €</strong></span>
            </li>
            <li class="flex -row -md -child" :key="key">
                <Input
                    placeholder="Ex.: Jambon"
                    type="text"
                    name="label"
                    v-model="newDetail.label"
                />

                <Input
                    placeholder="1.1"
                    type="number"
                    name="amount"
                    v-model="newDetail.amount"
                    currency="€"
                    step="0.01"
                    min="0"
                />

                <button type="button" name="button" class="btn -primary" @click="handleAddDetail">
                    Ajouter
                </button>
            </li>
        </ul>

        <p class="-child"><strong>Total: {{ this.detailsTotal }}€</strong></p>
        <p class="-child">
            <span v-if="this.detailsTotal > this.mutableEntry.amount">/!\ Détails plus grand que la facture ({{ this.mutableEntry.amount }}€)</span>
            <span v-else-if="this.detailsTotal < this.mutableEntry.amount">/!\ Détails plus petit que la facture ({{ this.mutableEntry.amount }}€)</span>
        </p>

        <div v-if="isPending" class="flex -row -hcenter -vcenter">
            <div class="loader"></div>
        </div>

        <button v-else type="submit" name="button" class="btn -primary -child">Valider</button>
    </form>
</template>
<script>
    import Input from "../forms/input";
    import Select from "../forms/select";
    import Axios from "axios";

    export default {
        props: {
            entry: Object,
            categories: [Object, Array],
            base_url: String,
            token: String,
        },
        data(){
            let categoriesOptions = this.categories.map( category => { return { label: category.name, value: category.id } } );

            let prioritiesOptions = [
                {label: "Faible", value: 0},
                {label: "Moyenne", value: 1},
                {label: "Forte", value: 2}
            ];

            return {
                key: 0,
                isPending: false,
                prioritiesOptions: prioritiesOptions,
                categoriesOptions: categoriesOptions,
                mutableEntry: {
                    ...this.entry,
                    category: this.entry.category_id ? categoriesOptions.find( category => category.value == this.entry.category_id) : null,
                    priority: { label: this.entry.humanized_priority, value: this.entry.priority },
                    details: this.entry.details || [],
                },
                newDetail: {
                    label: null,
                    amount: null,
                }
            }
        },
        computed: {
            detailsTotal() {
                return this.entry.details ?
                            Object.values(this.entry.details)
                                .map( entry => Number(entry.amount) )
                                .reduce( (acc, val) => acc + val )
                                .toFixed(2) :
                            0;
            }
        },
        methods: {
            apiRequest(method, route, data, finallyFunction) {
                this.isPending = true;

                Axios({
                        method: method,
                        url: this.base_url + route,
                        data: {...data},
                        headers: { 'X-CSRF-TOKEN': this.token }
                    })
                    .then(response => { this.mutableGroupedEntries = response.data.groupedEntries; })
                    .catch(error => {
                        this.error.status = error.response.status;
                        this.error.data = error.response.data.errors;
                        this.isPending = false;
                    })
                    .finally( () => {
                        finallyFunction();
                        this.isPending = false;
                    });
            },
            handleAddDetail() {
                var newDetail = {...this.newDetail};
                this.mutableEntry.details.push(newDetail);
                this.newDetail = {label: null, amount: null};
                this.key++;
            },
            handleUpdate() {
                this.apiRequest(
                    "PUT",
                    "/entries/"+this.entry.id+"/update",
                    {
                        priority: this.mutableEntry.priority.value,
                        label: this.mutableEntry.label,
                        category_id: this.mutableEntry.category ? this.mutableEntry.category.value : null,
                        details: this.mutableEntry.details,
                    },
                    () => {}
                );
            }
        },
        components: {
            Input,
            Select,
        }
    }
</script>
