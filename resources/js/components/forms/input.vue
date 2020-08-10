<template>
    <div class="flex -col -one -sm -child">
        <label v-if="label" :for="id" class="flex -row -child">{{ label }}</label>

        <div class="input-container -child">
            <input
                :id="id"
                v-model="mutableValue"
                :name="name"
                :placeholder="placeholder"
                :type="type"
                :disabled="disabled"
                :min="min"
                :step="step"
                :class="{
                    'input': true,
                    '-errors': (touched && errors && errors.length > 0),
                    '-valid': (errors && errors.length == 0 && String(mutableValue) != '' && mutableValue != null),
                    }"
                @blur="handleBlur"
                @change="handleChange"
                @focus="handleFocus"
            />

            <span v-if="type == 'number' && currency" class="input-currency">{{ currency }}</span>
        </div>

        <div v-if="tooltip || errors" class="flex -row -child">
            <div class="input-tooltip">{{ tooltip }}</div>

            <ul v-if="touched && errors && errors.length > 0" class="input-errors">
                <li v-for="error in errors">
                    {{ error }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mutableValue: this.value
            }
        },
        props: {
            value: [String, Object, Array, Number],
            placeholder: String,
            name: String,
            label: String,
            type: String,
            errors: Array,
            id: String,
            tooltip: String,
            disabled: Boolean,
            touched: Boolean,
            currency: String,
            min: String,
            step: String,
        },
        methods: {
            handleBlur(e) {
                this.$emit('blur', this.name);
            },
            handleChange(e) {
                this.$emit('input', e.target.value);
            },
            handleFocus(e) {
                this.$emit("focus", this.name);
            }
        }
    }
</script>
