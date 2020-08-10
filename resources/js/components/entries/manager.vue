<template>
    <div>
        <section class="flex -one -col -md">
            <h2 class="flex -one -row -md entries-month -child">{{ date }}</h2>
            <p class="flex -one -row -md entries-balance -child"><strong>{{ monthlyTotal }} €</strong></p>

            <div class="flex -one -row -md -child">
                <article v-for="(entriesByType, type) in mutableGroupedEntries" class="flex -one -col -md -child">
                    <div class="flex -row -vcenter -md -spacebetween -child">
                        <h3 class="entries-type">{{ type }} <span v-if="isStoreEntryPending">Pending...</span></h3>
                        <button v-if="type === 'Entrée'" type="button" class="btn -primary" @click="handleCreateEntry(true)">Ajouter un revenu</button>
                        <button v-else type="button" class="btn -primary" @click="handleCreateEntry(false)">Ajouter une dépense</button>
                    </div>

                    <div v-for="(entries, category_name) in entriesByType" :class="'flex -col -child entries-category -'+(categories.find( category => category.name === category_name) && categories.find( category => category.name === category_name).color)">
                        <h4 class="category-title -child">{{ category_name == "" ? "Sans catégorie" : category_name }} ({{ entries.map( entry => Number(entry.amount)).reduce( (acc, val) => acc + val).toFixed(2)}}€)</h4>
                        <ul class="entries-list flex -one -col -sm -child">
                            <li v-for="entry in entries" class="flex -col -one -sm -child">
                                <div class="entry flex -one -row -sm -spacebetween -vcenter -child">
                                    <span v-if="isEntryPending == entry.id">Pending</span>
                                    <div :class="'entry-priority -level -col -child -level'+ entry.priority" @click="handleEditPriority(entry, $event)">
                                        <div class="priority-label">{{ entry.humanized_priority }}</div>
                                    </div>
                                    <a :href="base_url+'/entries/'+entry.id+'/edit'" class="link flex -two -col -child">{{ entry.label }}</a>
                                    <span class="flex -one -col -child -hright"><strong>{{ Number.parseFloat(entry.amount).toFixed(2) }} €</strong></span>
                                    <button type="button" class="btn -primary -sm -col -child" @click="handleEditEntry(entry)">Edit</button>
                                </div>
                                <!-- <ul class="entry-detail flex -one -row -sm -child">
                                    <li>Détail</li>
                                </ul> -->
                            </li>
                        </ul>
                    </div>

                    <p class="entries-subtotal flex -row -md -alignright -child">
                        {{ type == "Entrée" ? "+" : "-"}}
                        {{ Object.values(entriesByType).length > 0 ? Object.values(entriesByType).flat(1).map( entry => Number(entry.amount)).reduce( (acc, val) => acc + val).toFixed(2) : 0 }}€
                    </p>
                </article>
            </div>
        </section>

        <!-- could be a modal type "positionned" -->
        <div v-if="isModalOpen == 'edit-priority'" class="priority-selector" @click.self="handleClosePriority">
            <div class="selector-content" :style="'top:'+selector_content_top+';left:'+selector_content_left">
                <a href="#" class="flex -row -one -md -vcenter selector-priority -level0" @click.prevent="handleUpdatePriority(0)"><span class="entry-priority -level0"></span>Faible</a>
                <a href="#" class="flex -row -one -md -vcenter selector-priority -level1" @click.prevent="handleUpdatePriority(1)"><span class="entry-priority -level1"></span>Moyenne</a>
                <a href="#" class="flex -row -one -md -vcenter selector-priority -level2" @click.prevent="handleUpdatePriority(2)"><span class="entry-priority -level2"></span>Forte</a>
            </div>
        </div>

        <Modal v-if="isModalOpen == 'create-entry'" @close="handleCloseModal" size="-sm">
            <h3 slot="header" class="modal-title">{{ newEntry.is_in ? "Ajouter un revenu" : "Ajouter une dépense" }}</h3>

            <form slot="body" class="flex -one -col -md" @submit.prevent="handleStoreEntry">
                <Input
                    :placeholder="newEntry.is_in ? 'Ex.: Dépôt mensuel' : 'Ex.: Primeur'"
                    type="text"
                    name="label"
                    v-model="newEntry.label"
                />

                <Input
                    :placeholder="newEntry.is_in ? '14.5' : '5'"
                    type="number"
                    name="amount"
                    v-model="newEntry.amount"
                    currency="€"
                    step="0.01"
                    min="0"
                />

                <div class="flex -row -one -md -child">
                    <button class="btn -primary flex -one -vcenter -hcenter" type="submit">Valider</button>
                </div>
            </form>
        </Modal>

        <Modal v-if="isModalOpen == 'edit-entry'" @close="handleCloseModal" size="-sm">
            <h3 slot="header" class="modal-title">Modifier</h3>

            <form slot="body" class="flex -one -col -md" @submit.prevent="handleUpdateEntry">
                <Input
                    placeholder="Ex.: Primeur"
                    label="Intitulé"
                    type="text"
                    name="label"
                    v-model="editedEntry.label"
                />

                <Input
                    placeholder="14.5"
                    label="Montant"
                    type="number"
                    name="amount"
                    v-model="editedEntry.amount"
                    currency="€"
                    step="0.01"
                    min="0"
                />

                <Select
                    id="category"
                    name="category"
                    v-model="editedEntry.category"
                    placeholder="Selectionnez une catégorie"
                    label="Catégorie"
                    :options="categoriesOptions"
                />

                <div class="flex -row -one -md -child">
                    <button class="btn -primary flex -one -vcenter -hcenter" type="submit">Valider</button>
                </div>
            </form>
        </Modal>
    </div>
</template>

<script>
    import Input from "../forms/input";
    import Select from "../forms/select";
    import Modal from "../modal";
    import Axios from "axios";

    export default {
        props: {
            base_url: String,
            token: String,
            account: Object,
            auth_user: Object,
            grouped_entries: [Object, Array],
            categories: [Object, Array],
            date: String,
        },
        data() {
            return {
                isStoreEntryPending: false,
                isModalOpen: false,
                isEntryPending: false,
                selector_content_top: 0,
                selector_content_left: 0,
                editedEntry: null,
                categoriesOptions: this.categories.map( category => { return { label: category.name, value: category.id }}),
                newEntry: {
                    label: null,
                    amount: null,
                    is_in: null,
                },
                mutableGroupedEntries: this.grouped_entries,
                error: {
                    status: null,
                    data: null
                }
            }
        },
        computed: {
            monthlyTotal() {

                var entries_amounts = Object.values(this.mutableGroupedEntries)
                        .map( category => Object.values(category).flat(1) )
                        .flat(1)
                        .map( entry => Number(entry.amount)*(entry.is_in ? 1 : -1) );

                if(entries_amounts.length > 0) {
                    return entries_amounts
                            .reduce( (acc, val) => acc + val )
                            .toFixed(2);
                }else {
                    return 0
                }
            }
        },
        methods: {
            apiRequest(method, route, data, finallyFunction) {
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
                    })
                    .finally( finallyFunction() );
            },
            handleOpenModal(name) {
                this.isModalOpen = name;
            },
            handleCloseModal() {
                this.isModalOpen = false;
            },
            handleEditPriority(entry, e) {
                this.selector_content_top = e.target.getBoundingClientRect().top + 35 + 'px';
                this.selector_content_left = e.target.getBoundingClientRect().left + 7 + 'px';
                this.editedEntry = entry;

                document.querySelector('html').classList.add("-withmodal");

                this.isModalOpen = "edit-priority";
            },
            handleClosePriority() {
                this.isModalOpen = null;
                this.editedEntry = null;
                document.querySelector('html').classList.remove("-withmodal");
            },
            handleUpdatePriority(priority) {
                this.isEntryPending = this.editedEntry.id;
                document.querySelector('html').classList.remove("-withmodal");

                this.apiRequest(
                    "PUT",
                    "/entries/"+this.editedEntry.id+"/update",
                    {
                        priority: priority
                    },
                    () => { this.isEntryPending = false; this.isModalOpen = null; this.editedEntry = null; }
                );
            },
            handleCreateEntry(is_in) {
                this.newEntry.is_in = is_in;
                this.handleOpenModal("create-entry");
            },
            handleStoreEntry(is_in) {
                this.isStoreEntryPending = true;

                this.apiRequest(
                    "POST",
                    "/entries/store",
                    {
                        account_id: this.account.id,
                        label: this.newEntry.label,
                        amount: this.newEntry.amount,
                        is_in: this.newEntry.is_in,
                        date: this.date.split("/").join("-"),
                    },
                    () => {
                        this.isStoreEntryPending = false;
                        this.handleCloseModal();
                        this.newEntry = {
                            label: null,
                            amount: null,
                            is_in: null,
                        }
                    }
                );
            },
            handleEditEntry(entry) {
                this.editedEntry = {
                    ...entry,
                    category: entry.category ? this.categoriesOptions.find( category => category.value == entry.category.id) : null,
                };

                this.isModalOpen = "edit-entry";
            },
            handleUpdateEntry() {
                this.isEntryPending = this.editedEntry.id;

                this.apiRequest(
                    "PUT",
                    "/entries/"+this.editedEntry.id+"/update",
                    {
                        priority: this.editedEntry.priority,
                        amount: this.editedEntry.amount,
                        label: this.editedEntry.label,
                        category_id: this.editedEntry.category ? this.editedEntry.category.value : -1,
                        date: this.date.split("/").join("-"),
                    },
                    () => { this.isEntryPending = false; this.isModalOpen = null; }
                );
            }
        },
        components: {
            Input,
            Modal,
            Select,
        },
    }
</script>
