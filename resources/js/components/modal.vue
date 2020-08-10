<template>
    <transition name="fade">
        <div class="modal" @click.self="$emit('close')">
            <div :class="'modal-container '+ size">
                <div class="modal-header flex -row -hcenter -spacebetween">
                    <slot name="header">
                    </slot>
                    <button class="btn -small -alert" title="Fermer cette fenêtre" @click.prevent="$emit('close')"><i class="icon-container" />X</button>
                </div>

                <div class="modal-body">
                    <slot name="body">
                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                    </slot>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            size: String,
        },
        mounted() {
            document.querySelector('html').classList.add("-withmodal");
        },
        destroyed() {
            document.querySelector('html').classList.remove("-withmodal");
        }
    }
</script>
