<template>
    <div class="flex -col -one -sm -child">
        <label for="" class="flex -row -child">{{ label }}</label>
        <div class="flex -row -child">
            <multiselect
                v-model="mutableValue"
                :placeholder="placeholder"
                :options="options"
                :searchable="searchable"
                :multiple="multiple"
                :show-labels="false"
                label="label"
                track-by="value"
                @input="handleInput"
                @select="handleSelect"
                @close="handleClose"
                @open="handleOpen"
            >
            </multiselect>
        </div>

        <p v-if="errors && errors.length" class="form-errors -child">
            <ul>
                <li v-for="error in errors">
                    {{ error }}
                </li>
            </ul>
        </p>

        <input v-if="Array.isArray(mutableValue)" type="hidden" :value="mutableValue.map( item => item.value )" :name="name"/>
        <input v-else type="hidden" :value="mutableValue ? mutableValue.value : null" :name="name"/>
    </div>
</template>
<script>
    import Multiselect from 'vue-multiselect'

    export default {
        props: {
            value: [Object, Array],
            placeholder: String,
            name: String,
            label: String,
            options: Array,
            multiple: Boolean,
            max: Number,
            closeOnSelect: Boolean,
            openDirection: String,
            id: String,
            searchable: Boolean,
            errors: Array,
            touched: Boolean,
        },
        data() {
            return {
                mutableValue: this.value
            }
        },
        components: {
            Multiselect,
        },
        methods: {
            handleInput(value, id) {
                return this.$emit("input", value);
            },
            handleSelect(selectedOption, id) {
                this.$emit("input", selectedOption[this.option_value]);
            },
            handleClose() {
                this.$emit("blur", this.name);
            },
            handleOpen() {
                this.$emit("focus", this.name);
            }
        },
    }
</script>
